<?php
require 'config.php';

if (!empty($_SESSION['userid'])) {
    $id = $_SESSION['userid'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE userid=$id");
    $row = mysqli_fetch_assoc($result);
} else {
     echo '<script>alert("Invalid! Sign In First");';
    echo 'window.location.href = "loginpage.php";</script>';
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="CSS/style.css"/>
<link rel="stylesheet" href="CSS/profile.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="loginhomepage.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="classlist.php">Classes</a>
            <a href="history.php">History</a>
            <a href="profile.php"  class="active"s>Profile</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
        </nav>
    </header>

    <div class="container">
        <div class="form-profile">
            <h2>Profile Info</h2>
            
            <!-- Display user profile information fetched from the database -->
            <?php
            if ($row) {
                ?>
                <form action="update_profile.php" method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID:</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?= $row['userid'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?= $row['password'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telno" class="form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="telno" name="telno" value="<?= $row['telno'] ?>" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                </form>
                <?php
            } else {
                echo '<p>Error fetching user data</p>';
            }
            ?>
        </div>
    </div>

    

   
    <?php include 'footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>

