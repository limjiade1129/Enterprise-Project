<?php
include 'config.php';

$classID = $_GET['classID']; 

if (isset($classID)) {
    // Get the image file name before deleting from the database
    $stmt = $conn->prepare("SELECT image FROM class WHERE classID = :classID");
    $stmt->bindParam(':classID', $classID, PDO::PARAM_INT);
    $stmt->execute();
    
    $result = $stmt->fetch();
    $imageFileName = $result['image'];

    // Delete the image file
    if ($imageFileName && file_exists("../image/" . $imageFileName)) {
        unlink("../image/" . $imageFileName);
    }

    // Delete data from the database
    $stmt = $conn ->prepare("DELETE FROM class WHERE classID=$classID"); 
    if ($stmt->execute()) {
        echo '<script>alert("Class has been deleted from the database");</script>';
    } else {
        echo '<script>alert("Error: Unable to delete class");</script>';
        print_r($stmt->errorInfo());
    }
}

echo '<script>window.location.href = "class_list.php";</script>';
?>
