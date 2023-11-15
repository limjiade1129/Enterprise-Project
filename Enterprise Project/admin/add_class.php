<?php 
    include 'config.php';
    if(isset($_POST['submit'])){
        
        $image = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];  
        $folder = "../image/".$image;
        
        if(move_uploaded_file($tempname,$folder)){
            echo 'images est uplade';
        }

        $classname = $_POST['classname'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $time = $_POST['time'];

        $stmt = $conn->prepare("INSERT INTO class(image,name,price,quantity,time) VALUES('$image','$classname','$price','$quantity','$time')");

        if ($stmt->execute()) {
            echo '<script>alert("Successfully added Class to the database");</script>';
        } else {
            echo '<script>alert("Error: Unable to add Class to the database");</script>';
        }
    }
    header('location:class_list.php')
    ?>
    