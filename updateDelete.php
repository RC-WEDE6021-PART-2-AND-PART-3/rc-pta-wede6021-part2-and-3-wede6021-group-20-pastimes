<?php
session_start();
include 'dbConnect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update / Delete</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <h1> Modify </h1>
    <form method="POST" action="updateDelete.php">
        <input type="number" name="clothesID" placeholder="Clothing ID" required><br><br>
        <input type="text" name="name" placeholder="New Clothing Name"><br><br>
        <input type="number" name="price" placeholder="New Price"><br><br>
        <input type="text" name="size" placeholder="New Size"><br><br>
        <button name="update">Update</button>
        <button name="delete">Delete</button>
    </form>
</body>
</html>