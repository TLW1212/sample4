<?php
// Database connection
$servername = "project-db.cc7tazxltrra.us-east-1.rds.amazonaws.com";
$username = "admin"; // Update with your database username
$password = "awsprojectdb"; // Update with your database password
$dbname = "projectaws"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all items from the database
$sql = "SELECT * FROM Item"; // Assuming the table is named 'items'
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - My Apache Bakery</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="navbar">
        <a href="tcc.php" class="logo">My Apache Bakery</a>
        <div class="menu">
            <div class="menu-item">
                <a href="view.php">View Items</a>
            </div>
            <div class="menu-item">
                <a href="add.php">Add Items</a>
            </div>
            <div class="menu-item">
                <a href="edit.php">Edit Items</a>
            </div>
            <div class="menu-item">
                <a href="delete.php">Delete Items</a>
            </div>
        </div>
    </div>
    
    <div class="bb"><a href="tcc.php">Homepage</a></div>

    <div class="form-container">
        <h1>Add New Bakery Item</h1>
        <form action="bakery.php" method="post">
        <label>Item Name:</label>
        <input type="text" name="name" required>

        <label>Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <label>Price ($):</label>
        <input type="number" name="price" step="0.01" required>


            <button type="submit">Add Item</button>
        </form>
    </div>
</body>
</html>
