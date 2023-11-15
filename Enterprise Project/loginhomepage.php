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
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="CSS/style.css"/>
<link rel="stylesheet" href="CSS/homepage.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<script src="https://cdn.commoninja.com/sdk/latest/commonninja.js" defer></script>
<div class="commonninja_component pid-233fb671-1272-4522-ac3e-2535fa045523"></div>

<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="loginhomepage.php" class="active">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="classlist.php">Classes</a>
            <a href="history.php">History</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
        </nav>
    </header>


    <div class="carousel-container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/carousel1.jpg" class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Unlock Your Potential</h4>
                            <p>Discover the path to success with personalized tutoring at JD Tuition Centre.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="image/carousel2.png" class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Join The Family</h4>
                            <p>At JD Tuition Centre We learn Together, Work Together , We success Together!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="image/carousel3.jpg" class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Inspiring Learning Journeys</h4>
                            <p>Join us on a journey of knowledge and growth, where every student's success story begins.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        <div class="container-content">
            <h2>Welcome  <?php print $row['username']; ?> to JD Tuition Centre Website!</h2>


                <p>Press here to get started! Enjoy!</p>                
                <a href="" class="button">Get Started</a>

        </div>

        

    </div>

    <?php include 'footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>



