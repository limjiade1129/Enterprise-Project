<?php 
    include 'config.php';
    $userid = $_GET['userid'];

    if(isset($userid)){
        $stmt = $conn ->prepare("DELETE FROM user WHERE userid=$userid");

        if ($stmt->execute()) {
            echo '<script>alert("User has been deleted from database");</script>';
        } else {
            echo '<script>alert("Error: Unable to delete user");</script>';
        }

    }
echo '<script>window.location.href = "user_list.php";</script>';
?>