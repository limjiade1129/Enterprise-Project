<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  
html {
    box-sizing: border-box;
  }
  
  
  header {
      top: 0;
      left: 0;
      width: 100%;
      padding: 25px 50px;
      background-color: black;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 99;
  }
  
  .logo {
      font-size: 2em;
      font-weight: bold;
      color: #fff;
      user-select: none;
  }
  
  .navigation {
      display: flex;
      align-items: center;
  }
  
  .navigation a {
      position: relative;
      padding: 8px 15px;
      font-size: 1.1em;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      margin-left: 15px;
  }
  
  .navigation a:hover {
      background-color: #fff;
      border-radius: 6px;
      color: black;
  }
  
  .navigation a.active {
      background: transparent;
      border: 3px solid #fff;
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
  }
  
  .navigation a.active:hover {
      background-color: #fff;
      color: black;
  }

  .footer {
    background-color: #11101b;
    color: white;
    text-align: center;
    width: 100%;
    padding: 10px;
    margin-top: auto;
}
  
  .footer p {
      position: static;
      text-align: center;
      color: white;
      font-size: 0.8em;
      padding: 10px;
  }

.form-profile {
    width: 400px;
    margin: 20px auto;
    padding: 20px; /* Increased padding for a cleaner look */
    border: 2px solid rgb(211, 211, 211);
    border-radius: 12px;
}
.form-profile h2 {
    text-align: center;
}
.form-label {
    font-weight: bold;
    color: #333; 
}

.form-control {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

.btn-primary {
    background-color: #000; 
    color: #fff; 
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
}

.btn.btn-primary:hover {
    background-color: #555;
}
</style>

</head>
<body>

<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="#">Classes</a>
            <a href="aboutus.php">About Us</a>
            <a href="profile.php" class="active">Profile</a>
            <a href="loginpage.php">Login</a>
            <a href="registerpage.php">Sign Up</a>
        </nav>
    </header>

    <div class="container">
    <div class= "form-profile">
    <h2>Update Profile</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="telno" class="form-label">Phone Number:</label>
            <input type="tel" class="form-control" id="telno" name="telno" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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
