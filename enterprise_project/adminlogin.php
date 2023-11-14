<?php
require 'config.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' ");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header('Location: admindash.php');
            exit();
        } else {
            echo "<script> alert('Invalid Password! Please Try Again!'); </script>";
            
        }
    } else {
        echo "<script> alert('Invalid username! Please Try Again!'); </script>";
        
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <h1 class="form-title">Private Tuition Center (Admin)</h1>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Admin Login</h2>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <label for=""></label>
                </div>
                <div class="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <label for=""></label>
                </div>
                <button type="submit" name="submit" class="btn">Log in</button>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
