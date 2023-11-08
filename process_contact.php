<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $country = $_POST["country"];
    $subject = $_POST["subject"];

    // Process the form data (e.g., send an email, save to a database, etc.)
    
    // Provide a response to the user (e.g., a thank-you message)
    echo "Thank you for contacting us, $firstname!";
} else {
    // Handle the case when the form is not submitted correctly
    echo "Form submission error.";
}
?>
