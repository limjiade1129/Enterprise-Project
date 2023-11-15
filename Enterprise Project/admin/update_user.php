<?php
include 'config.php'; // Assuming this file contains your database connection details

if (isset($_POST['submit'])) {
    $userId = $_GET['userid']; // Get the user ID from the URL parameter

    // Retrieve updated values from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telno = $_POST['telno'];

    // Update the user in the database
    $updateQuery = "UPDATE user SET username = '$username', email = '$email', password = '$password', telno = '$telno' WHERE userid = $userId";

    if ($conn->query($updateQuery)) {
        echo '<script>alert("User details updated succesfully");</script>';
    } else {
        echo '<script>alert("Error: Unable to update user details");</script>';
    }

}
echo '<script>window.location.href = "user_list.php";</script>';
?>
