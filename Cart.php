<?php
session_start();
include 'dbConnect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

 <div class="header">
    <h2>Pastimes</h2>
    </div>

<h1 style="padding:20px;">Your Cart</h1>

<?php

$total = 0;

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

    echo "<div class='products'>";

    foreach($_SESSION['cart'] as $id => $qty){

        $sql = "SELECT * FROM tblClothes WHERE clothesID = $id";
        $result = $conn->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();

            $subtotal = $row['price'] * $qty;
            $total += $subtotal;
?>

            <div class="card">

                <img src="images/<?php echo $row['image']; ?>" class="product-img">

                <p><?php echo $row['name']; ?></p>

                <p>Price: R<?php echo $row['price']; ?></p>

                <p>Quantity: <?php echo $qty; ?></p>

                <p>Subtotal: R<?php echo $subtotal; ?></p>

                <a href="removeFromCart.php?id=<?php echo $row['clothesID']; ?>">
                    Remove
                </a>

            </div>
            
           

    <div>
        <a href="dashboard.php">Continue Shopping</a>
    </div>
</div>

<?php
        }
    }

    echo "</div>";

    echo "<h2 style='padding:20px;'>Total: R$total</h2>";

}
else{
    echo "<p style='padding:20px;'>Your cart is empty.</p>";
}
?>

</body>
</html>