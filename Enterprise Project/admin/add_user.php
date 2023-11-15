<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telno = $_POST['telno'];

    $stmt = $conn->prepare("INSERT INTO user(username, email, password, telno) VALUES('$username', '$email', '$password', '$telno')");

    if ($stmt->execute()) {
        echo '<script>alert("User successfully added to the database");</script>';
    } else {
        echo '<script>alert("Error: Unable to add user to the database");</script>';
    }
}

echo '<script>window.location.href = "user_list.php";</script>';
?>