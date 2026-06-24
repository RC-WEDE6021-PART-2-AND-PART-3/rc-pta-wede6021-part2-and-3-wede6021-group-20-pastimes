<?php
session_start();
include 'dbConnect.php';

if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}

if(!isset($_GET['listingID']) || !is_numeric($_GET['listingID'])){
    echo 'Invalid listing.';
    exit;
}

$listingID = intval($_GET['listingID']);

$listingStmt = $conn->prepare('SELECT * FROM tblListings WHERE listingID = ? AND status = "active"');
$listingStmt->bind_param('i', $listingID);
$listingStmt->execute();
$listingResult = $listingStmt->get_result();
$listing = $listingResult->fetch_assoc();
$listingStmt->close();

if(!$listing){
    echo 'Listing not found.';
    exit;
}

if(isset($_POST['send'])){
    $messageText = trim($_POST['message']);
    if($messageText !== ''){
        $senderName = $_SESSION['user'];
        $messageStmt = $conn->prepare('INSERT INTO tblMessages (listingID, senderName, message) VALUES (?, ?, ?)');
        $messageStmt->bind_param('iss', $listingID, $senderName, $messageText);
        $messageStmt->execute();
        $messageStmt->close();
    }
}

$messagesStmt = $conn->prepare('SELECT * FROM tblMessages WHERE listingID = ? ORDER BY createdAt ASC');
$messagesStmt->bind_param('i', $listingID);
$messagesStmt->execute();
$messages = $messagesStmt->get_result();
$messagesStmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chat ></title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <h1>Chat about: <?php echo htmlspecialchars($listing['itemName']); ?></h1>

    <p><strong>Seller:</strong>
     <?php echo htmlspecialchars($listing['sellerName']); ?></p>
    <p><strong>Price:</strong> R<?php echo htmlspecialchars($listing['price']); ?></p>

    <p><?php echo nl2br(htmlspecialchars($listing['description'])); ?></p>

    <?php if(!empty($listing['image'])): ?>
        <img src="images/<?php echo htmlspecialchars($listing['image']); ?>" alt="Item image" style="max-width:200px; display:block; margin:12px 0;">
    <?php endif; ?>

    <h2>Messages</h2>
    <?php if($messages && $messages->num_rows > 0): ?>
        <?php while($row = $messages->fetch_assoc()): ?>
            <
                <strong><?php echo htmlspecialchars($row['senderName']); ?></strong>
                <span style="font-size:0.9em; color:#555;">(<?php echo htmlspecialchars($row['createdAt']); ?>)</span>
                <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
            </div>

        <?php endwhile; ?>
        
    <?php else: ?>
        <p>No messages yet. Start the conversation with delivery or price questions.</p>
    <?php endif; ?>

    <form method="POST">
        <label>Your message</label><br>
        <textarea name="message" rows="4" required></textarea><br><br>
        <button type="submit" name="send">Send Message</button>
    </form>

    <p><a href="listings.php">Back to listings</a></p>
</body>
</html>
