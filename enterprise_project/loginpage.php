<?php
require 'config.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' ");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["userid"] = $row["userid"];
            header('Location: loginhomepage.php');
            exit();
        } else {
            echo "<script> alert('Invalid Password! Please Try Again!'); </script>";
            
        }
    } else {
        echo "<script> alert('Invalid Email! Please Try Again!'); </script>";
        
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="CSS/style.css"/>
<link rel="stylesheet" href="CSS/loginregister.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="loginpage.php">Classes</a>
            <a href="loginpage.php">About Us</a>
            <a href="loginpage.php">Profile</a>
            <a href="loginpage.php"class="active">Login</a>
            <a href="registerpage.php">Sign Up</a>
        </nav>
    </header>

    <div class = "container">
        <div class= "form-box">
                <h2>Login</h2>
                <form action ="" method="post">
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type ="email" name="email" id="email" placeholder="Email" required>
                    <label for =""></label>
                </div>
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type ="password" name="password" id="password" placeholder="Password" required>
                    <label for =""></label>
                </div>
                <button type="submit" name="submit" class="btn">Log in </button>
                <div class ="login-register">
                    <p>Dont have an Account ? <a href="registerpage.php">Sing Up Here</a></p>
                </div>
            </form>
        </div>
    </div>
    

   
    <?php include 'footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>
