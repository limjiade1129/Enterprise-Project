    <?php
    @include 'config.php';

    $userid = $_SESSION['userid'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cardholder = $_POST['card_holder'];
        $cardnumber = $_POST['card_number'];

        $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE userid='$userid'");

        $product_names = [];
        $quantities = [];
        $prices = [];
        $total_price = 0; // Initialize total price

        while ($cart_row = mysqli_fetch_assoc($select_cart)) {
            $quantity = $cart_row['quantity'];
            $classID = $cart_row['classID'];
            $price = $cart_row['price'];
            $individual_total_price = $price * $quantity; // Calculate individual total price
            $total_price += $individual_total_price; // Accumulate individual total prices
            $username = $cart_row['username'];
            $productname = $cart_row['name'];

            $product_names[] = $productname;
            $quantities[] = $quantity;
            $prices[] = $price;

            // Update class quantity
            $query = "UPDATE class SET quantity = quantity - $quantity WHERE classID = $classID";
            $upload = mysqli_query($conn, $query);
        }

        // Combine arrays into strings
        $combined_product_names = implode(', ', $product_names);
        $combined_quantities = implode(', ', $quantities);
        $combined_prices = implode(', ', $prices);

        // Insert combined data into a single row in the sales table
        $insert_product = mysqli_query($conn, "INSERT INTO sales(productname, quantity, price, total, userid, username, card_holder_name, card_number) 
            VALUES('$combined_product_names', '$combined_quantities', '$combined_prices', '$total_price', '$userid', '$username', '$cardholder', '$cardnumber')");

        if ($insert_product) {
            // Clear the cart after successful payment
            $clear_cart = mysqli_query($conn, "DELETE FROM cart WHERE userid='$userid'");
            if (!$clear_cart) {
                echo "Error clearing cart: " . mysqli_error($conn);
            } else {
                // Show a JavaScript alert after successful payment
                echo '<script>alert("Payment successful! Thank you for your purchase.");</script>';
            }
        } else {
            echo '<script>alert("Error: Unable to make payment! Please try again.");</script>';
        }
    }
    
    echo '<script>window.location.href = "classlist.php";</script>';
    ?>
