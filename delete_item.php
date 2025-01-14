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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected item name
    $name = $conn->real_escape_string($_POST['name']);

    if (!empty($name)) {
        // Delete the item from the database
        $sql = "DELETE FROM Item WHERE name = '$name'";

        if ($conn->query($sql) === TRUE) {
            echo "Item deleted successfully!";
            echo "<a href='delete.php'>Delete another item</a> | <a href='view.php'>View Items</a>";
        } else {
            echo "Error deleting item: " . $conn->error;
        }
    } else {
        echo "Please select an item to delete.";
    }
}

// Close the database connection
$conn->close();
?>