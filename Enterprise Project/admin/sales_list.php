

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales list</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php 
            include "sidebar.php";
        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
        <?php 
            include "header.php";
        ?>
          
        
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Sales List</div>
            </div>
            
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th>ID</th>
                            <th>Class Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Card Holder Name</th>
                            <th>Card Number</th>
                            <th>Time Payment</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          include 'config.php';
                          $result = $conn -> query("SELECT * FROM sales");
                          foreach($result as $value):
                        ?>
                      <tr class="bg-white align-middle">
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['productname'] ?></td>
                                <td><?php echo $value['quantity'] ?></td>
                                <td><?php echo $value['price'] ?></td>
                                <td><?php echo $value['total'] ?></td>
                                <td><?php echo $value['userid'] ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo $value['card_holder_name'] ?></td>
                                <td><?php echo $value['card_number'] ?></td>
                                <td><?php echo $value['time_created'] ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                    <a href="#" onclick="confirmRemove(<?php echo $value['id']?>)"><i class="far fa-trash"></i></a>
                                </td>
                        </tr> 
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content page -->
    </main>

    <script>
    function confirmRemove(id) {
        var confirmDelete = confirm("Are you sure you want to remove this user?");
        
        if (confirmDelete) {
            window.location.href = "remove_sales.php?id=" + id;
        }
    }
</script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>                        
</body>

</html>
