<?php
session_start();
require_once("include/connection.php");
if(isset($_GET['action']) && $_GET['action']!=''){
    $action=$_GET['action'];
}
else {
    echo "action not found";
}
switch($action){
    case 'add':
        add_data();
        break;
        case 'delete':
            delete_data();
            break;

}
function add_data(){

    if(isset($_POST['added'])){
        global $con;
        $book_name=$_POST['book_name'];
        $student_id=$_POST['student_id'];
        $s_name=$_POST['s_name'];
        $t_from=$_POST['t_from'];
        $t_t=$_POST['t_t'];
         if ($book_name=="" || $student_id=="" || $s_name=="" || $t_from=="" || $t_t==""){
    
             header("location:book-out.php");
             $_SESSION['errormsg']="All Field aur Requird";
         }
         else{
             $sql="INSERT INTO book_out (book_name,student_id,s_name,t_from,t_t)values('$book_name',
             '$student_id','$s_name','$t_from','$t_t')";
             $result=mysqli_query($con,$sql);


             if($result){
               header("location:book-out.php");
                $_SESSION['successmsg']="Successfully Added.";
             }
             else{
               header("location:book-out.php");
                $_SESSION['errormsg']="Error Occured. Book Not Added";
             }
         }
        
    
         
    }
}

    function  delete_data(){
        $name=$_POST['name'];
        global $con;
        $sql="DELETE FROM student_book WHERE book_name='$name'";
        $result =mysqli_query($con,$sql);
        echo 1;  
}