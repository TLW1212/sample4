<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected item name
    $name = $_POST['name'];

    // Connect to the database
    $conn = new mysqli('127.0.0.1', 'root', '', 'bakery');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the item from the database
    $sql = "DELETE FROM item WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        echo "<script>alert('Item deleted successfully'); window.location.href = 'delete.php';</script>";
    } else {
        echo "<script>alert('Error deleting item'); window.location.href = 'delete.php';</script>";
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
