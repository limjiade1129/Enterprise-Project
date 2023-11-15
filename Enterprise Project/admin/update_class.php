<?php
include 'config.php';

$classID = $_GET['classID'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (isset($classID) && !empty($classID)) {
        // Get the image file name before updating the database
        $stmt = $conn->prepare("SELECT image FROM class WHERE classID = :classID");
        $stmt->bindParam(':classID', $classID, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the query executed successfully
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();
            $oldImageFileName = $result['image'];

            // Handle file upload
            if ($_FILES["img"]["size"] > 0) {
                // Check if the old image exists and unlink it
                if ($oldImageFileName && file_exists("../image/" . $oldImageFileName)) {
                    unlink("../image/" . $oldImageFileName);
                }

                // Upload the new image
                $targetDirectory = "../image/";
                $newImageFileName = basename($_FILES["img"]["name"]);
                $targetFile = $targetDirectory . $newImageFileName;

                // Move the file to the target directory
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                    // Update the database with the new image file name
                    $stmt = $conn->prepare("UPDATE class SET image = :newImageFileName, name = :classname, price = :price, quantity = :quantity, time = :time WHERE classID = :classID");
                    $stmt->bindParam(':newImageFileName', $newImageFileName);
                } else {
                    echo '<script>alert("Error: Unable to upload the new image.");</script>';
                    exit;
                }
            } else {
                // No new image uploaded, update other fields without changing the image
                $stmt = $conn->prepare("UPDATE class SET name = :classname, price = :price, quantity = :quantity, time = :time WHERE classID = :classID");
            }

            // Common fields for both cases
            $stmt->bindParam(':classID', $classID, PDO::PARAM_INT);
            $stmt->bindParam(':classname', $_POST['classname']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':quantity', $_POST['quantity']);
            $stmt->bindParam(':time', $_POST['time']);

            if ($stmt->execute()) {
                echo '<script>alert("Class details have been updated successfully.");</script>';
            } else {
                echo '<script>alert("Error: Unable to update class details.");</script>';
                print_r($stmt->errorInfo()); // Output detailed error information for debugging
            }
        } else {
            echo '<script>alert("No class found with the specified ID.");</script>';
        }
    } else {
        echo '<script>alert("Invalid classID.");</script>';
    }
}

echo '<script>window.location.href = "class_list.php";</script>';
?>