<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP password is empty
$database = "contact_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phone);

// Execute the query
if ($stmt->execute()) {
    echo "Record saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
