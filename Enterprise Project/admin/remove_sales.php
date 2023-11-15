<?php 
    include 'config.php';
    $id = $_GET['id'];

    if(isset($id)){
        $stmt = $conn ->prepare("DELETE FROM sales WHERE id=$id");

        if ($stmt->execute()) {
            echo '<script>alert("Sales has been deleted from database");</script>';
        } else {
            echo '<script>alert("Error: Unable to delete Sales");</script>';
        }

    }
echo '<script>window.location.href = "sales_list.php";</script>';
?>