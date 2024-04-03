<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // default username in XAMPP
$password = ""; // default password in XAMPP is empty
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO blood_donors (name, phone_number, email, blood_group, state, city, zipcode, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $phone_number, $email, $blood_group, $state, $city, $zipcode, $address);

// Set parameters and execute
$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$blood_group = $_POST['blood_group'];
$state = $_POST['state'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$address = $_POST['address'];

$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
