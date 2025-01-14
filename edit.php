<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item - My Apache Bakery</title>
    <link rel="stylesheet" href="style3.css">
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
        <h1>Edit Bakery Item</h1>
        <form action="update_item.php" method="post">
            <label for="name">Select Item Name:</label>
            <select name="name" id="name" required>
                <option value="">--Select an item--</option>
                <?php
                // Connect to the database
                $conn = new mysqli('project-db.cc7tazxltrra.us-east-1.rds.amazonaws.com', 'admin', 'awsprojectdb', 'projectaws');

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch item names from the database
                $sql = "SELECT name FROM Item";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"" . htmlspecialchars($row['name']) . "\">" . htmlspecialchars($row['name']) . "</option>";
                    }
                } else {
                    echo "<option value=\"\">No items found in the table</option>";
                }

                // Close the connection
                $conn->close();
                ?>
            </select>

            <label for="new_name">New Item Name:</label>
            <input type="text" name="new_name" id="new_name" required>

            <label for="description">New Description:</label>
            <textarea name="description" id="description" rows="4" required></textarea>

            <label for="price">New Price ($):</label>
            <input type="number" name="price" id="price" step="0.01" required>

            <button type="submit">Update Item</button>
        </form>
    </div>
</body>
</html>
