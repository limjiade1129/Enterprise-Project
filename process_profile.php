<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $orgName = $_POST["orgName"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];

    // You can perform any actions with the data here, like saving it to a database
    // For this example, we'll just display the data

    echo "Username: " . $username . "<br>";
    echo "First Name: " . $firstName . "<br>";
    echo "Last Name: " . $lastName . "<br>";
    echo "Organization Name: " . $orgName . "<br>";
    echo "Location: " . $location . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone: " . $phone . "<br>";
    echo "Birthday: " . $birthday . "<br>";
} else {
    echo "No data submitted.";
}
?>
