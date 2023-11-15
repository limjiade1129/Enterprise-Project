<?php
include 'config.php';
session_start();?>

<script>
    // JavaScript code for logout confirmation
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector('.logout-link').addEventListener('click', function (e) {
            e.preventDefault();
            var confirmLogout = confirm("Are you sure you want to logout?");
            if (confirmLogout) {
                window.location.href = "adminlogin.php";
            }
        });
    });
</script>

<div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="text-start ms-5 ps-1 mt-3 h6 fw-bold">JD Tuition Centre (Admin)</h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2s mt-2">
                <img class="rounded-circle" src="img/profileicon.jpg" alt="img-admin" height="100" width="100">
                <h2 class="h6 fw-bold mt-2"><?php echo $_SESSION['username']; ?></h2>

            </div>
            <div class=" bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-4 ">
                <ul class="d-flex flex-column list-unstyled">
                        <li class="h7"><a class="nav-link text-dark" href="dashboard.php"><i
                                    class="fal fa-home-lg-alt me-2"></i> <span>Home</span></a></li>
                        <li class="h7"><a class=" nav-link text-dark" href="user_list.php"><i
                                    class="far fa-regular fa-user me-2"></i> <span>User</span></a></li>
                        <li class="h7"><a class=" nav-link text-dark" href="admin_list.php"><i
                                    class="fal fa-solid fa-lock me-2"></i><span>Admin</span></a></li>
                        <li class="h7"><a class=" nav-link text-dark" href="class_list.php"><i
                                    class="fal fa-bookmark me-2"></i> <span>Class</span></a></li>
                        <li class="h7"><a class=" nav-link text-dark" href="contactus_list.php"><i
                                    class="fal fa-solid fa-comment me-2"></i> <span>Contact Us</span></a></li>
                        <li class="h7"><a class=" nav-link text-dark" href="sales_list.php"><i
                                    class="fal fa-usd-square me-2"></i> <span>Sales</span></a></li>
                        <li class="h7"><a class=" nav-link text-dark logout-link" href="#"><i
                                    class="fal fa-sign-out-alt ms-2"></i> <span>Logout</span></a></li>
                </ul>
                
            </div>

        </div>
        