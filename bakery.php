<!DOCTYPE html>
<html>
    <head>

</head>
<body>

<?php
    $Name = $_POST['name'];
    $Description = $_POST['description'];
    $Price = $_POST['price'];

    $conn = new mysqli("127.0.0.1","root","","bakery");
    if($conn->connect_error){
        die('Connection Failed :' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into item(name, description, price)
        values(?,?,?)");
        $stmt->bind_param("ssd",$Name,$Description,$Price);
        $stmt->execute();
        echo '<script>alert("Add Successful"); window.location.href = "add.php";</script>';
        $stmt->close();
        $conn->close();
    }
?>
</body>
    </html>
