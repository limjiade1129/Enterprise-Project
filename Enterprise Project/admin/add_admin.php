<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("INSERT INTO admin(username,password) VALUES('$username', '$password')");

    if ($stmt->execute()) {
        echo '<script>alert("User successfully added to the database");</script>';
    } else {
        echo '<script>alert("Error: Unable to add user to the database");</script>';
    }
}

echo '<script>window.location.href = "admin_list.php";</script>';
?>