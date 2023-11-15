<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['msg'];

require 'config.php';

if ($conn->connect_error) {
    die('Connection Failed: '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contact_us (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        ?>
        <script>
            alert("Your message sent successfully! Wait our admin to contact you.");
            window.location.href = "aboutus.php#contact"; // Redirect to a success page
        </script>
        <?php
        exit();
    } else {
        $stmt->close();
        $conn->close();
        ?>
        <script>
            alert("Error occurred while sending the message!");
            window.location.href = "aboutus.php#contact"; // Redirect to an error page if an error occurs
        </script>
        <?php
        exit();
    }
}
?>
