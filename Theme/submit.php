<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO food_items (name, category, price, description) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssds", $name, $category, $price, $description);

// Set parameters and execute
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
