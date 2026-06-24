<?php
$host = "localhost"; 
$user = "root";
$password = "";
$dbname = "clothingStore"; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS tblListings (
    listingID INT AUTO_INCREMENT PRIMARY KEY,
    sellerName VARCHAR(100),
    itemName VARCHAR(150),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255),
    status VARCHAR(20) DEFAULT 'active',
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;");

$conn->query("CREATE TABLE IF NOT EXISTS tblMessages (
    messageID INT AUTO_INCREMENT PRIMARY KEY,
    listingID INT,
    senderName VARCHAR(100),
    message TEXT,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;");
?>
