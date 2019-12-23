<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="adminn.css">
</head>
<body>
    <header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <br>
    <li class="users"><a href="#">My Account</a></li>
    <li class="logout warn"><a href="">Log Out</a></li>
  </ul>
</header>

<main role="main">
  
  <section class="panel important">
    <h2>Data</h2>
<?php
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

$sql = "SELECT id, name, description, image, price FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Description</th><th>Image</th><th>Price</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["image"] . "</td><td>" . $row["price"] . "</td><td><form action='delete_product.php' method='post'><input type='hidden'name='id' value='" . $row["id"] . "'><input type='submit' value='DELETE'></input></form></td><td><form action='update.php' method='post'><input type='hidden'name='id' value='" . $row["id"] . "'><input type='submit' value='UPDATE'></input></form></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
  </section>
  <?php
    $nameErr = $descriptionErr = $imageErr =$priceErr="";
    $name = $description = $image = $price ="";
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            if (empty($_POST["description"])) {
               $descriptionErr = "Description is required";
            }else {
               $description = test_input($_POST["description"]);
            }
            if (empty($_POST["image"])) {
               $imageErr = "image is required";
            }else {
               $image = test_input($_POST["image"]);
            }
            if (empty($_POST["price"])) {
               $priceErr = "Price is required";
            }else {
               $price = test_input($_POST["price"]);
            }
       }
            
            
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
  
    ?>
  <section class="panel important">
         
    <h2>Write a post</h2>
       <form action="add_product.php" method="post">
           
            <div class="twothirds" >
              Name of product:<br/>
              <input type="text" name="name" size="40" required value=''/><span class = "error" >* <?php echo $nameErr;?></span><br/><br/>
              Description:<br/>    
              <textarea name="description" rows="15" cols="67" required></textarea><span class = "error">* <?php echo $descriptionErr;?></span><br/>  
              Image src:<br/>    
              <input type="text" name="image" size="40" required/><span class = "error">* <?php echo $imageErr;?></span><br/><br/>
              Price:<br/>    
              <input type="number" name="price" size="40"required/><span class = "error">* <?php echo $priceErr;?></span><br/><br/>

            </div>
            <div>
              <input type="submit" name="submit" value="Save" />
            </div>
        </form>
      
  </section>
  

</main>

</body>
</html>