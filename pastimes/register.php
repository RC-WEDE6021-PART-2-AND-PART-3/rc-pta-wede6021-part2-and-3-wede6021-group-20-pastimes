<?php include 'dbConnect.php'; ?> // Include the database connection file

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style.css">
</head>
<body>


<div class="bg-text">
<?php
for ($i = 0; $i < 10; $i++) {
    echo "<div class='bg-row' style='top:".($i * 80)."px;'>";
    
    for ($j = 0; $j < 12; $j++) {
        echo "<span>PASTIMES</span>";
    }

    echo "</div>";
}
?>
</div>

<div class="card"> // REGISTER CARD
<h2>Register</h2>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>
</form>

<p>Already have an account? <a href="login.php">Login</a></p>

<?php
if(isset($_POST['register'])){ // Check if the register button was clicked
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tblUser(fullName,email,password)
            VALUES('$name','$email','$password')";

// CHECK IF REGISTRATION WAS SUCCESSFUL
    if($conn->query($sql)){
        echo "Registered successfully!";
    } else {
        echo "Error!"; // You can also display $conn->error for more details
    }
}
?>

</div>

</body>
</html>