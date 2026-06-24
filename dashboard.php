<?php
session_start();
include 'dbConnect.php'; 

if(!isset($_SESSION['user'])){
    header("Location: login.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style.css">
</head>
<body>

<!--  TOP BAR -->
<div class="top-bar">
    <h2 class="logo">Pastimes</h2>

    <a href="cart.php">Cart</a>
    <a href="listings.php">Listings</a>
    <a href="sell.php">Sell Item</a>
        <div class="avatar"></div>
    </div>
</div>

<!--  NEW ARRIVALS -->
<div class="section">
    <h1>NEW ARRIVALS</h1>

    <div class="products">

        <?php
        $result = $conn->query("SELECT * FROM tblClothes LIMIT 4");

        while($row = $result->fetch_assoc()){ 
        ?>
        
    <div class="card">

    <a href="product.php?id=<?php echo $row['clothesID']; ?>">

        <img src="images/<?php echo $row['image']; ?>" class="product-img">

        <p class="name"><?php echo $row['name']; ?></p>

        <h2>R<?php echo $row['price']; ?></h2>

    </a>

    <form action="AddtoCart.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['clothesID']; ?>">
        <button type="submit" class="add-to-cart-button">Add to Cart</button>
    </form>

</div>
        <?php } ?>

        <!-- NEXT BUTTON -->
        <div class="next-btn">></div>

    </div>
</div>

<!--  NEXT IN LINE -->
<div class="section">
    <h1>NEXT IN LINE</h1>
 //more content
       <p>
        At Pastimes, we are always working on bringing you the latest and most exciting second-hand fashion.
        Coming soon, you can expect a wider range of clothing including vintage pieces, branded streetwear,
        and limited-edition items at affordable prices.
    </p>

    <p>
        We are also improving our platform to make buying and selling easier. Soon, users will be able to upload
        their own clothing items, manage their listings, and interact with buyers directly.
    </p>

    <p>
        Second-hand clothing is becoming more popular every day. It helps reduce waste, saves money, and gives
        clothes a second life instead of ending up in landfills. At Pastimes, we support sustainable fashion
        and aim to build a community where style meets responsibility.
    </p>

    <p>
        Stay tuned for updates such as new arrivals, better search features, and a smoother shopping experience.
    </p>
</div>
</div>

</body>
</html>