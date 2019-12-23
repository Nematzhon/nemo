
<?php
//Connection for database
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

//Select Database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Table</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>ID</th>
<th>Name</th>
<th>Desc</th>
<th>Department</th>
<th>Address</th>

</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['id']; ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['description']; ?></td>
 <td><?php echo $row['image']; ?></td>
 <td><?php echo $row['price']; ?></td>

 <!--Edit option -->
 <td><a href="update_product.php?edit_id=<?php echo $row['id']; ?>" alt="edit" >Edit</a></td>
 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
</table>
</body>
</html>