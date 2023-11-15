<?php
@include 'config.php';

$userid = $_SESSION['userid'];

// Retrieve payment history for the user
$payment_query = mysqli_query($conn, "SELECT * FROM `sales` WHERE userid='$userid' ORDER BY time_created DESC");

?>


<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="CSS/style.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="loginhomepage.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="classlist.php">Classes</a>
            <a href="history.php" class="active">History</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
        </nav>
    </header>


    <div class="container mt-5">
    <h2 class="mb-4 text-center">Payment History</h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total</th>
            <th scope="col">Card Holder Name</th>
            <th scope="col">Card Number</th>
            <th scope="col">Time Created</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($payment = mysqli_fetch_assoc($payment_query)) {
            ?>
            <tr>
                <td><?php echo $payment['id']; ?></td>
                <td><?php echo $payment['productname']; ?></td>
                <td><?php echo $payment['quantity']; ?></td>
                <td><?php echo $payment['price']; ?></td>
                <td><?php echo 'RM ' . number_format($payment['total'], 2); ?></td>
                <td><?php echo $payment['card_holder_name']; ?></td>
                <td><?php echo $payment['card_number']; ?></td>
                <td><?php echo $payment['time_created']; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


    <?php include 'footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>



