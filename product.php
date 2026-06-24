<?php
include 'DBConnect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tblClothes WHERE clothesID = $id";
$result = $conn->query($sql);

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="product-page">

    <div class="product-image">
        <img src="images/<?php echo $product['image']; ?>">
    </div>

    <div class="product-details">

        <h1><?php echo $product['name']; ?></h1>

        <h2>R<?php echo $product['price']; ?></h2>

        <p>Size: <?php echo $product['size']; ?></p>

        <p>
            Premium second-hand clothing item in excellent condition.
        </p>

        <form action="AddtoCart.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $product['clothesID']; ?>">
            <button type="submit">Add To Cart</button>
        </form>

    </div>

</div>

</body>
</html>