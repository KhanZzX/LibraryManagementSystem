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
                    <h2 class="fs-2 ">Book Out Form </h2>
                </div>


            </nav>
            <?php
if(isset($_SESSION['successmsg']))
{
  ?>
<div class="alert alert-success alert-dismissible fade show p-0 text-center sm msg" role="alert">
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
 <form action="book_out_controller.php?action=add" method="post">
            <div class="container px-4">
                <div class="row my-2">
                    <div  class="book-out">
                        <div class="container">
                            <div class="row ">

                                <div class="col-xl-4">
                                    <label for="" class="fw-bolder mt-2">Chosse Book From the Drop down: </label>
                                </div>
                                <div class="col-xl-8">
                                
                                <select class="form-select" id="bname"   name="book_name"  aria-label="Default select example">
                                <option value="">Select Book</option>

                                <?php
                                $sql="SELECT * FROM student_book";
                $result=mysqli_query($con,$sql);
                foreach($result as $data){
                ?>    
                                        <option value="<?php echo $data['book_name'] ?>"><?php echo $data['book_name'] ?></option>
                                        <?php
                }
                                        ?>
                                      
                                    </select>
                                </div>

                                <div class="col-xl-2 mt-3">
                                    <label for="" class="fw-bolder mt-2">Student ID: </label>
                                </div>
                                <div class="col-xl-10 mt-3">
                                    <input type="text" class="form-control" name="student_id" id="">
                                </div>

                                <div class="col-xl-2 mt-3">
                                    <label for="" class="fw-bolder mt-2">Student Name : </label>
                                </div>
                                <div class="col-xl-10 mt-3">
                                    <input type="text" class="form-control" name="s_name" id="">
                                </div>

                                <div class="col-xl-2 mt-3">
                                    <label for="" class="fw-bolder mt-2">Book Out Date : </label>
                                </div>
                                <div class="col-xl-10 mt-3">
                                    <input type="date" class="form-control" name="t_from" id="">
                                </div>

                                <div class="col-xl-2 mt-3">
                                    <label for="" class="fw-bolder mt-2">Returning Date : </label>
                                </div>
                                <div class="col-xl-10 mt-3">
                                    <input type="date" class="form-control" name="t_t" id="">
                                </div>
                                <div class="text-end mt-3 book-out">

                                    <button type="submit" name="added" class=" btn btn btn-primary px-4  ">BOOK OUT</button>

                                </div>
                            </div>
                        </div>

                </div>

                </div>
            </div>

            </form>



            <div class="container  px-5">
                <div class="row my-5">
                    <table class="table bg-white rounded shadow-sm    text-center">
                        <thead class=" bg-dark text-light">
                            <tr>
                                
                                <th scope="col">Book Name</th>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Book Out Date</th>
                                <th scope="col">Returning Date</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$sql="SELECT * FROM book_out";
$result=mysqli_query($con,$sql);
foreach($result as $data){

?>

                            <tr class="data fs- fw-bold">
                                <th scope="row"><?php echo $data['book_name']   ?></th>
                                <td><?php echo $data['student_id']   ?></td>
                                <td><?php echo $data['s_name']   ?></td>
                                <td><?php echo $data['t_from']   ?></td>
                                <td><?php echo $data['t_t']   ?></td>
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
 <script src="assets/bootstrap-5.0.0-beta1-dist/jquery/jquery.js">
 </script>
     <script src="assets/bootstrap-5.0.0-beta1-dist/popper.js">

    </script>
    <script src="assets/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js">

    </script>

    <script>


     $("#bname").change(function()
     {
      var bname=$(this).val();
      console.log(bname);
         $.ajax(
             {
                 url:'book_out_controller.php?action=delete',
                 type:'POST',
                 data:{
                     name:bname,
                 },
                 success:function(data)
                 {
                     console.log(data);
                 }
             });
    });
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
     <script>

var msg= document.querySelectorAll(".msg");
      setTimeout(function(){
       for(let m of msg)
       {
           m.remove();
       }
      },4000);
</script>
 
</body>

</html>