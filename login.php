<?php
 require_once ("include/connection.php");
 
session_start();



 if(isset($_POST['login'])){
     $user_name="";
     $user_pass="";
     $valid=true;

     if($_POST['user_name']==""){
         echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('UserName is Required.')
    window.location.href='login.php';
    </SCRIPT>");
         $valid=false;

     }
     elseif( $_POST['user_name']){
         $user_name=$_POST['user_name'];

     }
     else {
        
            $valid=false;
     }
     if($_POST['user_pass']==""){

                 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password is Required.')
    window.location.href='login.php';
    </SCRIPT>");
         $valid=false;
     }
     elseif (strlen($_POST['user_pass'])>5) {
        $user_pass=$_POST['user_pass'];

     }
     else {
        $_SESSION['user']= "Password must be at least 6 digits";
        $valid=false;
     }

     if($valid){

        $query="SELECT u_id,username FROM `users` WHERE  `username`='$user_name' AND  `password`='$user_pass'";
    $res=mysqli_query($con,$query);
    $num=mysqli_num_rows($res);
    if($num>0){
    $res=mysqli_fetch_assoc($res);
    $_SESSION['u_id']=$res['u_id'];
     $_SESSION['u_name']=$res['username'];
    header("location:dashboard.php");
    }

     else {
         $_SESSION['login_in']="Invalid username or password.";
         header("loaction:login.php");
        
     }
    }

 }




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="assets/styles.css" />
    <title>LMS</title>
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <div class="container-fluid  m-auto mt-4  ">

            <div class="row ">

                <div class="col-xl-7 col-md-7 ">
                <img src="assets/images/Portal-Logo.jpg" class="h-100"  style=" width:820px; " alt="">
                </div>
                <div class="col-xl-5 col-md-5" >
                    <div class=" logo pt-4 mt-5 ms-3  py-3  text-center">
                        <img src="assets/images/Portal-Logo.png"  style=" width:250px;" class="px-2 " style="border-right:1px solid blue ;" alt="">
                       
                    </div>
                    <div class="row mt-4 ms-5 ps-5 ">

                        <div class="col-xl-5 text-center ">
                            <div class="text-center  my-2 ">

                                <a href="login.php" style="background:#3994d1;" type="submit" class=" btn  fw-bolder  login     "> LOGIN </a>

                            </div>

                        </div>
                        <div class="col-xl-5 text-center ">
                            <div class="text-center   my-2  ">

                                <a href="Register.php" type="submit" class=" btn  fw-bolder      register  "> Register
                                </a>

                            </div>


                        </div>

                    </div>

                    <?php           
                        if(isset($_SESSION['login_in']))
{
  ?>
                            <p style="color:red; " class="text-center ms-3 msg">
                                <?php
echo $_SESSION['login_in'];  ?>
                            </p>
                            <?php } ?>


                    <div class="col-xl-12 text-center ">
                        <div class="mt-3 ms-1">
                            <label for=""
                                class="me-3 fw-bolder text-primary ms-2  register-input  d-inline-block">Username:</label>
                            <input type="text" class="form-control  d-inline-block w-50 " name="user_name" id="">
                            <?php           
                        if(isset($_SESSION['user_name']))
{
  ?>
                            <p style="color:red; " class="text-center ms-3 msg">
                                <?php
echo $_SESSION['user_name'];  ?>
                            </p>
                            <?php } ?>

                        </div>
                    </div>

                    <div class="col-xl-12 text-center ">
                        <div class="mt-3 ms-1">
                            <label for=""
                                class="me-3 fw-bolder text-primary ms-2  register-input  d-inline-block">Password:</label>
                            <input type="password" class="form-control  d-inline-block w-50 " name="user_pass" id="">
                            <?php           
                        if(isset($_SESSION['user_pass']))
{
  ?>
                            <p style="color:red; " class="text-center ms-3 msg">
                                <?php
echo $_SESSION['user_pass'];
  ?>
                            </p>

                            <?php } ?>
                        </div>

                    </div>

                    <div class="col-xl-12 text-center ms-3  my-4">
                        <div>
                            <button type="submit" name="login"
                                class="btn btn-primary py-2 Account-Now fw-bolder  px-4 w-50">
                                LOGIN
                            </button>
                        </div>

                    </div>




                </div>


            </div>
        </div>
    </form>

    <script>

 var msg= document.querySelectorAll(".msg");
       setTimeout(function(){
        for(let m of msg)
        {
            m.remove();
        }
       },4000);
 </script>


    <script src="assets/bootstrap-5.0.0-beta1-dist/popper.js">

    </script>
    <script src="assets/bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js">

    </script>
</body>

</html>