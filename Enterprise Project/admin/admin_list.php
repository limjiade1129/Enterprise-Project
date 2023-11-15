<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin list</title>
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
                <div class="title h6 fw-bold">Admin List</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="button-add-student">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Admin</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Admin Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="add_admin.php" enctype="multipart/form-data">
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="username">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="password">
                                  </div>
                                  <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                
                              </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th>Admin ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Time Created</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          include 'config.php';
                          $result = $conn -> query("SELECT * FROM admin");
                          foreach($result as $value):
                        ?>
                      <tr class="bg-white align-middle">
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo $value['password'] ?></td>
                                <td><?php echo $value['time_created'] ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $value['id']?>"><i class="far fa-pen"></i></a>
                                    <a href="#" onclick="confirmRemove(<?php echo $value['id']?>)"><i class="far fa-trash"></i></a>
                                </td>
                        </tr> 
                            

                        <!-- Update User Modal -->
                        <div class="modal fade" id="updateModal<?php echo $value['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Admin Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="update_admin.php?id=<?php echo $value['id']?>" enctype="multipart/form-data">
                    <div class="">
                        <label for="update-username" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="update-username" name="username" value="<?php echo $value['username']; ?>">
                    </div>
                    <div class="">
                        <label for="update-password" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" id="update-password" name="password" value="<?php echo $value['password']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
            window.location.href = "remove_admin.php?id=" + id;
        }
    }
</script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>                        
</body>

</html>
