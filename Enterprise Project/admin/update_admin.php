<?php
include 'config.php'; // Assuming this file contains your database connection details

if (isset($_POST['submit'])) {
    $id = $_GET['id']; // Get the user ID from the URL parameter

    // Retrieve updated values from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update the user in the database
    $updateQuery = "UPDATE admin SET username = '$username', password = '$password'  WHERE id = $id";

    if ($conn->query($updateQuery)) {
        echo '<script>alert("Admin Details updated succesfully");</script>';
    } else {
        echo '<script>alert("Error: Unable to update Admin details");</script>';
    }

}
echo '<script>window.location.href = "admin_list.php";</script>';
?>
