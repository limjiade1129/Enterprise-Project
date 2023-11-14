<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
    
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

header {
    top: 0;
    left: 0;
    width: 100%;
    padding: 5px 50px;
    background-color: black;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}

.logo {
    font-size: 2em;
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

.row {
  display: flex;
  justify-content: center;
  flex-wrap: wrap; /* Allow columns to wrap to the next row if the screen is too small */
}

.column {
  flex: 0 0 23%; /* Set a fixed width for each column (adjust as needed) */
  margin: 0 16px; /* Add some margin to separate the columns */
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center; 
  padding: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
  margin-bottom: 30px;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}


input[type=text],input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.center-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 30px;
  margin-bottom: 30px;
}

.contact-container {
  width: 50%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.card img {
  width: 100%; /* Ensure the image takes up the entire width of its container */
  height: 300px; /* Set a fixed height for all images (adjust the value as needed) */
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


</style>
</head>
<body>
<header>
        <h2 class="logo">JD Tuition Centre</h2>>
        <nav class="navigation">
            <a href="homepage.php">Home</a>
            <a href="#">Classes</a>
            <a href="aboutus.php"  class="active">About Us</a>
            <a href="#">Profile</a>
            <a href="loginpage.php">Login</a>
            <a href="registerpage.php">Sign Up</a>
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
      <img src="img/member1.png" alt="Lim" style="width:100%">
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
      <img src="img/member2.jpg" alt="Ooh" style="width:100%">
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
      <img src="img/member3.jpeg" alt="Lee" style="width:100%">
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
<div class="center-container">
  <h2>Contact Us</h2>
  <div class="contact-container">
    <form action="process_contact.php" method="post">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" placeholder="Your name...">
  
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Your email...">
    
      <label for="subject">Subject</label>
      <input type="text" id="subject" name="subject" placeholder="Your subject...">
  
      <label for="msg">Message</label>
      <textarea id="msg" name="msg" placeholder="Write something..." style="height:150px"></textarea>
  
      <input type="submit" value="Submit">
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


<div class="footer">
        <p>&copy; <?php echo date("Y"); ?> Private Tuiton Centre website. All rights reserved.</p>
    </div>




</body>
</html>



