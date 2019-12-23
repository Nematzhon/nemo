<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

 echo htmlspecialchars($_SERVER["PHP_SELF"]);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "INSERT INTO products (name, description, image, price)
VALUES ('" . $_POST['name'] . "', '" . $_POST['description'] . "', '" . $_POST['image'] . "', '" . $_POST['price'] . "')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


header('Location: http://localhost/project%20web/admin/');
?>