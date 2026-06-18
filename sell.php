<?php
session_start();
include 'dbConnect.php';

if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}

$message = '';

if(isset($_POST['sell'])){
    $itemName = trim($_POST['itemName']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $sellerName = $_SESSION['user'];
    $imageName = '';

    if(!empty($_FILES['image']['name'])){
        $imageName = str_replace(' ', '_', basename($_FILES['image']['name']));
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $imageName);
    }

    if($itemName !== '' && $price !== ''){
        $sql = "INSERT INTO tblListings (sellerName, itemName, description, price, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $sellerName, $itemName, $description, $price, $imageName);

        if($stmt->execute()){
            $message = 'Your item is now listed for sale.';
        } else {
            $message = 'Unable to list the item. Please try again.';
        }
        $stmt->close();
    } else {
        $message = 'Please provide an item name and price.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sell an Item</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <h1>Sell Your Belonging</h1>
    <p>List your item and then share the chat link with interested buyers.</p>

    <?php if($message !== ''): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Item name</label><br>
        <input type="text" name="itemName" required><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4"></textarea><br><br>

        <label>Price</label><br>
        <input type="number" name="price" step="0.01" required><br><br>

        <label>Image</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit" name="sell">List Item</button>
    </form>

    <p><a href="listings.php">Browse Listings</a></p>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
</body>
</html>
