<?php
// Database connection
$servername = "project-db.cc7tazxltrra.us-east-1.rds.amazonaws.com"; // Use the appropriate hostname
$username = "admin"; // Replace with your database username
$password = "awsprojectdb"; // Replace with your database password
$dbname = "projectaws"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']); // Original item name
    $description = $conn->real_escape_string($_POST['description']); // Updated description
    $price = $conn->real_escape_string($_POST['price']); // Updated price
    $new_name = $conn->real_escape_string($_POST['new_name']); // Updated item name

    // Check if the original item exists in the database
    $check_sql = "SELECT * FROM Item WHERE name = '$name'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Update the item details
        $update_sql = "UPDATE Item 
                       SET name = '$new_name', description = '$description', price = '$price' 
                       WHERE name = '$name'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Item updated successfully!";
        } else {
            echo "Error updating item: " . $conn->error;
        }
    } else {
        echo "Item not found in the database.";
    }
}
?>
