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
<title>About Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/aboutus.css"/>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    var contactButtons = document.querySelectorAll('.contactButton');

    contactButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var emailText = this.parentElement.getAttribute('data-email');

        // Create a dummy input element
        var dummyInput = document.createElement('input');
        dummyInput.setAttribute('value', emailText);
        document.body.appendChild(dummyInput);

        // Select the text in the input element
        dummyInput.select();
        dummyInput.setSelectionRange(0, 99999);

        // Use the Clipboard API to copy the text to the clipboard
        document.execCommand('copy');

        // Remove the dummy input element
        document.body.removeChild(dummyInput);

        // Optionally, you can provide feedback to the user
        this.innerHTML = 'Email Copied!';
        var originalText = this;
        setTimeout(function () {
          originalText.innerHTML = 'Contact';
        }, 2000);
      });
    });
  });
</script>
    
</head>
<body>
<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="loginhomepage.php">Home</a>
            <a href="aboutus.php" class="active">About Us</a>
            <a href="classlist.php">Classes</a>
            <a href="history.php">History</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a>
        </nav>
    </header>

    <div class="about-section">
  <h1>About Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="image/member1.png" alt="Lim" style="width:100%">
      <div class="container">
        <h2>Lim Jia De</h2>
        <p class="title">Lecturer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>Lim@example.com</p>
        <p data-email="Lim@example.com"><button class="button contactButton">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="image/member2.jpg" alt="Ooh" style="width:100%">
      <div class="container">
        <h2>Ooh Jing Xuan</h2>
        <p class="title">Lecturer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>Ooh@example.com</p>
        <p data-email="Ooh@example.com"><button class="button contactButton">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="image/member3.jpeg" alt="Lee" style="width:100%">
      <div class="container">
        <h2>Lee Chee Hoong</h2>
        <p class="title">Lecturer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>Lee@example.com</p>
        <p data-email="Lee@example.com"><button class="button contactButton">Contact</button></p>
      </div>
    </div>
  </div>
</div>


<div class="center-container" id="contact">
  <h2>Contact Us</h2>
  <div class="contact-container">
    <form action="process_contact.php" method="post">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?= $row['username'] ?>" placeholder="Your name...">
  
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?= $row['email'] ?>" placeholder="Your email...">
    
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Your subject...">
  
      <label for="msg">Message</label>
      <textarea id="msg" name="msg" placeholder="Write something..." style="height:150px"></textarea>
  
      <input type="submit" class="btn" value="Submit">

      <script>
              document.querySelector('.btn').onclick = function () {
                  var email = document.getElementById('email').value;
              
                  var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                  if (!email.match(emailRegex)) {
                      alert("Invalid email format. Please enter a valid email address.");
                      return false;
                  }
                
                };
            </script>
    </form>
  </div>
</div>

<div class="center-container">
    <h2>Location</h2>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15889.967954798654!2d100.2818707!3d5.3416038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac048a161f277%3A0x881c46d428b3162c!2sINTI%20International%20College%20Penang!5e0!3m2!1sen!2smy!4v1688752670786!5m2!1sen!2smy"
            width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>


<?php include 'footer.php'; ?>




</body>
</html>



