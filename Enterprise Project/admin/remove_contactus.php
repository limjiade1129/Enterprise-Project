<?php 
    include 'config.php';
    $id = $_GET['id'];

    if(isset($id)){
        $stmt = $conn ->prepare("DELETE FROM contact_us WHERE id=$id");

        if ($stmt->execute()) {
            echo '<script>alert("User has been deleted from database");</script>';
        } else {
            echo '<script>alert("Error: Unable to delete user");</script>';
        }

    }
echo '<script>window.location.href = "contactus_list.php";</script>';
?>