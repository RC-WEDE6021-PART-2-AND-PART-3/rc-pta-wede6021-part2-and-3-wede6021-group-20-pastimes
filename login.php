<?php 
session_start();
include 'dbConnect.php'; 
?>

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

<div class="card"> 
<h2>Login</h2>



<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>
</form>

<p>Don't have an account? <a href="register.php">Register</a></p> 

<?php
if(isset($_POST['login'])){ 
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM    tblUser WHERE email='$email'";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){
            $_SESSION['user'] = $row['fullName'];
            header("Location: dashboard.php"); 
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