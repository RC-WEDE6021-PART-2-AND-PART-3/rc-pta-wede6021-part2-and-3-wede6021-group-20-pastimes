<?php
include 'dbConnect.php'; 

if(isset($_POST['upload'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];

  
    $imageName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];

   
    $imageName = str_replace(" ", "_", $imageName);

    
    move_uploaded_file($tempName, "images/".$imageName);

  
    $sql = "INSERT INTO tblClothes(name, price, size, image)
            VALUES('$name', '$price', '$size', '$imageName')";

    if($conn->query($sql)){
        echo "<p style='color:green;'>Item added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error adding item</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Administrator</title>
</head>
<body>
 

<h2>Add New Clothing</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Clothing Name" required><br><br>
    <input type="number" name="price" placeholder="Price" required><br><br>
    <input type="text" name="size" placeholder="Size"><br><br>

    <!--  IMAGE INPUT -->
    <input type="file" name="image" required><br><br>

    <button name="upload">Upload</button>
</form>

<h2> Update / Delete Existing Clothing Items</h2>

<form method ="POST" action="updateDelete.php">
    <input type="number" name="clothesID" placeholder="Clothing ID" required><br><br>
    <input type="text" name="name" placeholder="New Clothing Name"><br><br>
    <input type="number" name="price" placeholder="New Price"><br><br>
    <input type="text" name="size" placeholder="New Size"><br><br>

    <button name="update">Update</button>
    <button name="delete">Delete</button>


</form>

</body>
</html>