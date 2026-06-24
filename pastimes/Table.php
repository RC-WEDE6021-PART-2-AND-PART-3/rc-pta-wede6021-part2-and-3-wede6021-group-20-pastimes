<?php
include 'dbConnect.php'; // Include the database connection file

// Drop table if exists
$conn->query("DROP TABLE IF EXISTS tblUser"); 

// Recreate table
$conn->query("
    CREATE TABLE tblUser (
        userID INT AUTO_INCREMENT PRIMARY KEY,
        fullName VARCHAR(100),
        email VARCHAR(100),
        password VARCHAR(255)
    )
");

// Read text file
$file = fopen("UserData.txt", "r");

while (($line = fgets($file)) !== false) {
    $data = explode(",", trim($line));

    $fullName = $data[0];
    $email = $data[1];
    $password = password_hash($data[2], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tblUser (fullName, email, password)
            VALUES ('$fullName', '$email', '$password')";

    $conn->query($sql);
} // End of while loop

fclose($file);

echo "Table created and data loaded!";
?>