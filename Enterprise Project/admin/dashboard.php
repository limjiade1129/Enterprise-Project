<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            include 'config.php';
            $nbr_user = $conn->query("SELECT * FROM user");
            $nbr_user = $nbr_user->rowCount();

            $nbr_class = $conn->query("SELECT * FROM class");
            $nbr_class = $nbr_class->rowCount();

            $nbr_contact = $conn->query("SELECT * FROM contact_us");
            $nbr_contact = $nbr_contact->rowCount();

            $result = $conn->query("SELECT SUM(total) AS total_amount FROM sales");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $totalAmount = $row['total_amount'];
            


        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">
        <?php 
            include "header.php";
        ?>
            <div class="cards row gap-3 justify-content-center mt-5">
                <div class=" card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="far fa-graduation-cap h3"></i>
                        <span>User</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr"><?php echo $nbr_user; ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--rose col-md-3 position-relative">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-bookmark h3"></i>
                        <span>Classes</span>
                    </div>
                    <div class="card__nbr-course">
                        <span class="h5 fw-bold nbr"><?php echo $nbr_class; ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--yellow col-md-3 position-relative">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-usd-square h3"></i>
                        <span>Sales</span>
                    </div>
                    <div class="card__payments">
                        <span class="h5 fw-bold nbr">RM <?php echo $totalAmount; ?></span>
                    </div>
                </div>

                <div class="card__items card__items--gradient col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-user h3"></i>
                        <span>Contact</span>
                    </div>
                    <span class="h5 fw-bold nbr"><?php echo $nbr_contact; ?></span>
                </div>
            </div>

        </div>
        <!-- end contentpage -->
    </main>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
