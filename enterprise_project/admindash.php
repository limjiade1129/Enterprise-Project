<?php

@include 'config.php';
session_start();

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="uft-8"/>
<title></title>

</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href=css/stylesheet2.css />
<body>
    <header>
        <div class="menu-bar">
            <ul>
                    <hr>
                        <a href="logout.php" class="sub-menu-link"><p>Logout</p><span></span></a>
                    </div>

                    </div>
            </ul>
        </div>
    </header>

   
    <section class="dashboard">

<h1 class="heading">dashboard</h1>
<div class="dash-container">


<div class="dash">
<?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
      ?>
      <h3><?php echo $row_count; ?></h3>
      <p>Total Orders </p>
      <a href="view_order.php" class="btn">VIEW ORDERS</a>
   </div>



<div class="dash">
<?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `class`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
      ?>
      <h3><?php echo $row_count; ?></h3>
      <p>Total Classes</p>
      <a href="admin_addclass.php" class="btn">ADD CLASS</a>
   </div>

   <div class="dash">
   <?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `user`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
      ?>
      <h3><?php echo $row_count; ?></h3>
      
      <p>Total Customers</p>
      <a href="user_dash.php" class="btn">EDIT USER ACCOUNT</a>
   </div>
</section>

<script src="main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>






</body>

</html>