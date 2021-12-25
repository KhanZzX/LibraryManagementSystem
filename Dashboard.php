<?php
require_once("include/connection.php");
session_start();
// if(!isset($_SESSION['u_id'])){
//     header('location:login.php');
//  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="assets/styles.css" />
    <title>LMS</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
       <?php
       include("include/side.php");

       ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-4">
                <div class="d-flex align-items-center fixed">

                    <i class="fa fa-bars primary-text fs-4 me-3" id="menu-toggle" aria-hidden="true"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" >
                    <div class="navbar-nav ms-auto mb-2 me-3 mb-lg-0">
                        <?php
                     if(isset($_SESSION['u_id']))
                     { ?>
                        <h5><?php  echo $_SESSION['u_name'] ?></h5>
                        
                    </div>
                    <?php
                        }?>
                </div>
            </nav>
            <div class="container px-4">
                <div class="row my-5">
                    <table class="table bg-white rounded shadow-sm    text-center">
                        <thead class=" bg-dark text-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Location</th>
                                <th scope="col">Availablity</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql ="SELECT * FROM student_book ORDER BY book_id ASC" ;
                        $result=mysqli_query($con,$sql);
                        foreach ($result as $data)  
                        {
                        ?>
                            <tr class="data fs- fw-bold">
                                <th scope="row"><?php  echo $data['book_id'] ?></th>
                                <td > <?php  echo $data['book_name'] ?></td>
                                <td><?php  echo $data['b_category'] ?></td>
                                <td><?php  echo $data['b_location'] ?></td>
                                <td>Yes</td>
                            </tr>
                            <?php

                        }?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="assets/bootstrap-5.0.0-beta1-dist/popper.js">

    </script>
    <script src="assets/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js">

    </script>

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>