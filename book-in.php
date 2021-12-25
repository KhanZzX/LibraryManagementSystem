<?php
 
 require_once ("include/connection.php");

 function function_alert($message) {
      
    echo "<script>alert('$message');</script>";
}
  

 
$errors = array(); 
 if(isset($_POST['add-book'])){
    global $con;
    $book_id1=$_POST['book_id']?? "";
    $book_name1=$_POST['book_name'] ?? "";
    $book_category=$_POST['book_category'] ?? "";
    $book_location=$_POST['book_location'] ?? "";
   if (empty($book_id)) { array_push($errors, "First Name is required"); }

    if($book_id==""|| $book_name==""|| $book_category==""|| $book_location==""){
        header("location:book-in.php");
        $_SESSION['errormsg']="All Fields are Required";

        
    }
$user_check_query = "SELECT * FROM library_book WHERE book_id='$book_id1' AND b_name = '$book_name1'";
  $result = mysqli_query($con, $user_check_query) ;
  $bookcheck = mysqli_fetch_assoc($result);
  
   // if user exists
  
  if($bookcheck){
    if (($library_book['book_id'] == $book_id) && ($library_book['b_name'] == $book_name)) {
      $sql="INSERT INTO student_book (`book_id`, `book_name`, `b_category`, `b_location`) Values ('$book_id1','$book_name1','$book_category'
        ,'$book_location')";
        $result=mysqli_query($con,$sql);
        if($result){
            function_alert("Added");

       header("location:Dashboard1.php");
        
    }
}

//    if ($library_book['b_name'] =! $book_name) {
  //    array_push($errors, "Please Input Valid Category");
   // }
  }

/*if(count($errors)==0){

      $sql="INSERT INTO student_book (`book_id`, `book_name`, `b_category`, `b_location`) Values ('$book_id','$book_name','$book_category'
        ,'$book_location')";
        $result=mysqli_query($con,$sql);
        if($result){

       header("location:Dashboard.php");
        $_SESSION['successmsg']="Success full added"; 
    }*/

    else{
     header("location:redirectError.php");
        // $_SESSION['errormsg']="Not Added";

    }
    
}

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
                    <h2 class="fs-2 ">Book In Form </h2>
                </div>
                
               
            </nav>
              <?php include('errors.php'); ?>
            <form action="" method="post">
            <div class="container px-4">
                <div class="row my-2">
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
                        <button type="submit" name="add-book" class=" btn btn btn-primary fw-bolder px-4 py-2 me-5   add-book  ">BOOK IN</button>

                    </div>
</div>


                   
            </div>
            </form>
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

  <!--   <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script> -->
</body>

</html>