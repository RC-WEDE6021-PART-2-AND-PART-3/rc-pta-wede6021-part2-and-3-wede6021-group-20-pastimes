<?php 
session_start();
include 'dbConnect.php'; // Include the database connection file
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="Style.css">
</head>
<body>

<!-- BACKGROUND TEXT (Shows PASTIMES diagonally in background) -->
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

<div class="card"> // LOGIN CARD
<h2>Login</h2>

 // LOGIN FORM

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>
</form>

<p>Don't have an account? <a href="register.php">Register</a></p> // LINK TO REGISTER PAGE

<?php
if(isset($_POST['login'])){ // Check if the login button was clicked
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tblUser WHERE email='$email'";
    $result = $conn->query($sql);


    // CHECK IF USER EXISTS
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){
            $_SESSION['user'] = $row['fullName'];
            header("Location: dashboard.php"); // Redirect to dashboard after successful login
        } else {
            echo "<p style='color:red;'>Wrong password!</p>";
        }
    } else {
        echo "<p style='color:red;'>User not found!</p>";
    }
}
?>
</div>

</body>
</html>