<?php
        session_start();
        if(isset($_POST['submit'])){
          include 'config.php';
          $username = $_POST['username'];
          $password = $_POST['password'];

          $requete = "SELECT * FROM admin WHERE username = '$username' and Password = '$password'";
          $statment = $conn -> prepare($requete);
          $statment -> execute();
          $result = $statment -> fetch();
          if($result['username'] === $username && $result['password'] === $password){
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['Password'];
            if(isset($_POST['check'])){
                setcookie('username',$_SESSION['username'],time() + 3600);
                setcookie('password',$_SESSION['password'],time() + 3600);
            }
            header("location:dashboard.php");
            }
            else if(empty($username) || empty($password)){
                header("location:adminlogin.php?error=please enter your email or password");
            }
            else
            {
                header("location:adminlogin.php?error=email or password not found");
            }
      }?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="CSS/login.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>


    <div class = "container">
        <div class= "form-box">
                <h2>Admin Login</h2>
                <form action ="" method="post">
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <label for=""></label>
                </div>
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type ="password" name="password" id="password" placeholder="Password" required>
                    <label for =""></label>
                </div>
                <button type="submit" name="submit" class="btn">Log in </button>
            </form>
        </div>
    </div>
    

   
    <div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Private Tuiton Centre website. All rights reserved.</p>
    </div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>
