<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have sanitized and validated the input data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telno = $_POST['telno'];

    // Update the user profile in the database
    $updateQuery = "UPDATE user SET username='$username', password='$password', telno='$telno' WHERE userid=$id";

    if (mysqli_query($conn, $updateQuery)) {
        // Update successful
        echo '<script>alert("Profile updated successfully");';
        echo 'window.location.href = "profile.php";</script>';
        exit();
    } else {
        // Handle the case where the update fails
        echo '<script>alert("Error updating profile. Please try again later.");';
        echo 'window.location.href = "profile.php";</script>';
        exit();
    }
} else {
    // Redirect to the update profile page if accessed directly without submitting the form
    header("Location: profile.php");
    exit();
}
?>