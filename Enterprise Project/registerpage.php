

<!DOCTYPE html>
<html>
<head>
<title>Register Page</title>
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
            <a href="loginpage.php">History</a>
            <a href="loginpage.php">Profile</a>
            <a href="loginpage.php">Login</a>
            <a href="registerpage.php" class="active">Sign Up</a>
        </nav>
    </header>

    <div class = "container">
    <div class= "form-box">
                <h2>Sign Up</h2>
                <form action ="handle_register.php" method="post">
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type ="text" name="username" id="username" placeholder="Name" required>
                    <label for =""></label>
                </div>
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
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type ="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
                    <label for =""></label>
                </div>
                <div class ="input-box">
                    <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
                    </span>
                    <input type ="telno" name="telno" id="telno" placeholder="Phone Number" required>
                    <label for =""></label>
                </div>
                <button type="submit" class="btn">Sign Up </button>
                <div class ="login-register">
                    <p>Already have an Account ? <a href="loginpage.php">Login Here</a></p>
                </div>

                <script>
                document.querySelector('.btn').onclick = function () {
                    var email = document.getElementById('email').value;
                    var password = document.getElementById('password').value,
                    confirmPassword = document.getElementById('cpassword').value;
                    var telno = document.getElementById('telno').value;
                    
                     var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    if (!email.match(emailRegex)) {
                        alert("Invalid email format. Please enter a valid email address.");
                        return false;
                    }
                    if (password.length < 8) {
                        alert("Invalid password. Password must be at least 8 characters long.");
                        return false;
                    }
                    if (password !== confirmPassword) {
                        alert("Password and Confirm Password not matched! Please try again!");
                        return false;
                    }
                    if (!telno.match(/^0\d{9}$/)) {
                    alert("Invalid telephone number! Please enter a 10-digit number and first number is 0.");
                    return false;
                    }

                };
            </script>

            </form>
        </div>
    </div>
    

   
    <?php include 'footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>



