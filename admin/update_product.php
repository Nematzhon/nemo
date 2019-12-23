<?php
//Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//Get ID from Database
if(isset($_GET['id'])){
 $sql = "SELECT * FROM products WHERE id =".$_GET['edit_id'];
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
 $name = $_POST['name'];
 $description = $_POST['description'];
 $image = $_POST['image'];
 $price = $_POST['price'];

 $update = "UPDATE data SET name='$name', description='$description',image='$image',address='$price' WHERE id=". $_GET['edit_id'];
 $up = mysqli_query($conn, $update);
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
 header("location: update.php");
 }
}
?>
<!--Create Edit form -->
<!doctype html>
<html>
<body>
<form method="post">
<h1>Edit Employee Information</h1>
<input type="text" name="name" placeholder="Name" value=""><br/><br/>
<input type="text" name="description" placeholder="Gender" value=""><br/><br/>
<input type="text" name="image" placeholder="Department" value=""><br/><br/>
<input type="text" name="price" placeholder="Address" value=""><br/><br/>

<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
<a href="update.php"><button type="button" value="button">Cancel</button></a>
</form>
<!-- Alert for Updating -->
<script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script>
</body>
</html>