<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jaguar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['uname'];
$password = $_POST['passw'];
$mail = $_POST['id'];
$number = $_POST['ph'];
$city = $_POST['city'];
$country = $_POST['country'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO signin (Name, password, mail, number, city, country) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $password, $mail, $number, $city, $country);

if ($stmt->execute()) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
