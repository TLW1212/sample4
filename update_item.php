<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection details
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'bakery';

    // Connect to the database
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $new_name = $conn->real_escape_string($_POST['new_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = (float) $_POST['price'];

    // Update the item in the database
    $sql = "UPDATE item SET name = '$new_name', description = '$description', price = $price WHERE name = '$name'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Edit Successful"); window.location.href = "edit.php";</script>';
    } else {
        echo "Error updating item: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
