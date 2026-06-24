<?php
include 'dbConnect.php'; // Include the database connection file

if(isset($_POST['upload'])){ // Check if the upload button was clicked

    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'];

    // IMAGE
    $imageName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];

    // FIX FILE NAME (remove spaces and replace with underscores)
    $imageName = str_replace(" ", "_", $imageName);

    // MOVE IMAGE
    move_uploaded_file($tempName, "images/".$imageName);

    // INSERT INTO DB
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
<title>Upload Clothes</title>
</head>
<body>
 
//  UPLOAD FORM
<h2>Add New Clothing</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Clothing Name" required><br><br>
    <input type="number" name="price" placeholder="Price" required><br><br>
    <input type="text" name="size" placeholder="Size"><br><br>

    <!--  IMAGE INPUT -->
    <input type="file" name="image" required><br><br>

    <button name="upload">Upload</button>
</form>

</body>
</html>