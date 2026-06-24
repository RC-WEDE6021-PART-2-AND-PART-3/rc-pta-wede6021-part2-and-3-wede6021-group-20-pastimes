<?php
session_start();
include 'dbConnect.php';

$result = $conn->query("SELECT * FROM tblListings WHERE status='active' ORDER BY createdAt DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Active Listings</title>
    <<link rel="stylesheet" href="Style.css">
</head>
<body>
    <h1>Active Seller Listings</h1>
    <?php 
    if($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            
                <h2><?php echo htmlspecialchars($row['itemName']); ?></h2>

                <p><strong>Seller:</strong> <?php echo htmlspecialchars($row['sellerName']); ?></p>

                <p><strong>Price:</strong> R<?php echo htmlspecialchars($row['price']); ?></p>

                <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>

                <?php if(!empty($row['image'])): ?>

                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="Item image" style="max-width:200px; display:block; margin-bottom:12px;">
                <?php endif; ?>

                <p>
                    <a href="chat.php?listingID=<?php echo $row['listingID']; ?>">Chat about this item</a>
                
                </p>
            </div>

        <?php endwhile; ?>
        
    <?php else: ?>
        <p>No listings are available right now.</p>
    <?php endif; ?>

    <p><a href="sell.php">Sell your own item</a></p>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
