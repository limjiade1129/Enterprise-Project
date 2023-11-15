

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class list</title>
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
                <div class="title h6 fw-bold">Class List</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="button-add-student">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Class</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Class Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="add_class.php" enctype="multipart/form-data">
                                  <div class="">
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Image:</label>
                                    <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="image">
                                  </div>
                                    <label for="recipient-name" class="col-form-label">Class Name:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="classname">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Price:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="price">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Quantity:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="quantity">
                                  </div>
                                  <div class="">
                                    <label for="recipient-name" class="col-form-label">Time:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="time">
                                  </div>
                                  <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Add Class</button>
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
                            <th>Class ID</th>
                            <th>Photo</th>
                            <th>Class Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Time</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          include 'config.php';
                          $result = $conn -> query("SELECT * FROM class");
                          foreach($result as $value):
                        ?>
                      <tr class="bg-white align-middle">
                                <td><?php echo $value['classID'] ?></td>
                                <td><img src="../image/<?php echo $value['image'] ?>" alt="img" height="50" with="50"></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['price'] ?></td>
                                <td><?php echo $value['quantity'] ?></td>
                                <td><?php echo $value['time'] ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $value['classID']?>"><i class="far fa-pen"></i></a>
                                    <a href="#" onclick="confirmRemove(<?php echo $value['classID']?>)"><i class="far fa-trash"></i></a>
                                </td>
                        </tr> 
                            

                        <!-- Update User Modal -->
                        <div class="modal fade" id="updateModal<?php echo $value['classID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Class Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="update_class.php?classID=<?php echo $value['classID']?>" enctype="multipart/form-data">
                    <div class="">
                        <label for="recipient-name" class="col-form-label">Image:</label>
                        <input type="file" class="form-control" id="" accept=".jpg,.png,.jpeg" name="img">
                    </div>
                    <div class="">
                        <label for="update-username" class="col-form-label">Class Name:</label>
                        <input type="text" class="form-control" id="" name="classname" value="<?php echo $value['name']; ?>">
                    </div>
                    <div class="">
                        <label for="update-email" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" id="" name="price" value="<?php echo $value['price']; ?>">
                    </div>
                    <div class="">
                        <label for="update-password" class="col-form-label">Quantity:</label>
                        <input type="text" class="form-control" id="" name="quantity" value="<?php echo $value['quantity']; ?>">
                    </div>
                    <div class="">
                        <label for="update-telno" class="col-form-label">Time:</label>
                        <input type="text" class="form-control" id="" name="time" value="<?php echo $value['time']; ?>">
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
    function confirmRemove(classID) {
        var confirmDelete = confirm("Are you sure you want to remove this user?");
        
        if (confirmDelete) {
            window.location.href = "remove_class.php?classID=" + classID;
        }
    }
</script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/script.js"></script>                        
</body>

</html>
