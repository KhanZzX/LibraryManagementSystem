<?php

require_once ("include/connection.php");
session_start();



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
     include ("include/side.php")
     ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-4">
                <div class="d-flex align-items-center fixed">

                    <i class="fa fa-bars primary-text fs-4 me-3" id="menu-toggle" aria-hidden="true"></i>
                    <h2 class="fs-2 ">Library Books</h2>
                </div>



            </nav>
            <?php

            if(isset($_SESSION['successmsg']))
{
  ?>
<div class="alert alert-success alert-dismissible fade show p-0 text-center sm msgss" role="alert">
  <?php
echo $_SESSION['successmsg'];
  ?>

</div>



<?php
unset($_SESSION['successmsg']);
}
?>

<?php
if(isset($_SESSION['errormsg']))
{
  ?>
<div class="alert alert-danger alert-dismissible fade show p-0 sm  msg text-center" role="alert">
<?php
echo $_SESSION['errormsg'];
?>

</div>
<?php
unset($_SESSION['errormsg']);
}
?>
           

            <form action="library_b_controller.php?action=add" method="post">
            <div class="container px-4">
                <div class="row my-2">
                <?php
                    if(isset($_SESSION['book_id']))
{
  ?>
   <p style="color:red; " class=" msg">  <?php
echo $_SESSION['book_id'];
  ?></p>
 
 <?php } ?>
            
                    <div class="col-xl-1 mt-1 text-center ">
                        <label for="" class="fw-bolder mt-1"> Book ID: </label>
                       
                    </div>
         
                    <div class="col-xl-3 mt-1 ">
                        <input type="text" class="form-control py-1" name="book_id" id="">
                    </div>
         
                   <div class="col-xl-2  text-center mt-1 ">


                        <label for="" class="fw-bolder  mt-1 "> Book Name : </label>
                    </div>
            
                    <div class="col-xl-5 mt-1  ">
                        <input type="text" class="form-control py-1" name="book_name" id="">
                    </div>
</div>
<div class="row my-2 mt-4">
                    <div class="col-xl-1 mt-1 text-center ">
                        <label for="" class="fw-bolder mt-1"> Category: </label>
                       
                    </div>
        
                    <div class="col-xl-3  mt-1  ">
                        <input type="text" class="form-control py-1" name="book_category" id="">
                    </div>
                    <div class="col-xl-2 text-center  mt-1 ">
                        <label for="" class="fw-bolder  mt-1  "> Location: 
                        </label>
                    </div>
        
                    <div class="col-xl-5  mt-1">
                        <input type="text" class="form-control py-1" name="book_location" id="">
                    </div>
                    <div class="text-end mt-4  add-book">
                        <button type="submit" name="add" class=" btn btn btn-primary fw-bolder px-4 py-2 me-5   add-book  ">ADD BOOK</button>

                    </div>
</div>


                   
            </div>
            </form>
            <div class="container  px-5">
                <div class="row my-5">
                    <table class="table bg-white rounded shadow-sm    text-center" >
                        <thead class=" bg-dark text-light">
                        
                                <th scope="col">Book ID</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                               
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql ="SELECT * FROM library_book ORDER BY book_id ASC";
                        $result=mysqli_query($con,$sql);
                        foreach ($result as $data)  
                        {
                        ?>
                            <tr>
                            <tr class="data  fs- fw-bold">
                                <th scope="row"><?php echo $data['book_id'] ?></th>
                                <td ><?php echo $data['b_name'] ?></td>
                                <td><?php echo $data['b_category'] ?></td>
                                <td><?php echo $data['b_location'] ?></td>
                               
                              <td><a class="btn btn-sm btn-danger" href="library_b_controller.php?action=delete&&id=<?php echo $data['b_id']  ?>">Delete</a></td> 
                               
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
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script>

// var msg= document.querySelectorAll(".msg");
//       setTimeout(function(){
//        for(let m of msg)
//        {
//            m.remove();
//        }
//       },2000);
</script>

    <script src="assets/bootstrap-5.0.0-beta1-dist/jquery/jquery.js"></script>
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