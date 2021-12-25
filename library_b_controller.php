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
    if(isset($_POST['add'])){
        global $con;
        $book_id="";
        $book_name=$_POST['book_name'];
        $book_category=$_POST['book_category'];
        $book_location=$_POST['book_location'];
        $valid=true;

        if($_POST['book_id']==""){

            $_SESSION['errormsg']="Book id is Required. ";
            $valid=false;
            
            header("location:Library-Books.php");
        }
        else{
            $book_id=$_POST['book_id'];
           $sql="SELECT * FROM library_book WHERE book_id='$book_id'";
           $data=mysqli_query($con,$sql);
           $row=mysqli_num_rows($data);
           if ($row>0) {
            $_SESSION['errormsg']= "BookID $book_id already exists. (:";
            
            $valid=false;
            header("location:Library-Books.php");
        }

        }
        
        if($book_id==""|| $book_name==""|| $book_category==""|| $book_location==""){
            header("location:Library-Books.php");
            $_SESSION['errormsg']="All Fields are Required.";
            $valid=false;
        }
            // else{
            //     $_SESSION['successmag']="Successfully Added.";
            // }
        if($valid){
          $sql="INSERT INTO library_book (book_id,b_name,b_category,b_location) Values ('$book_id','$book_name','$book_category'
            ,'$book_location')";
            $result=mysqli_query($con,$sql);
         $sql1="INSERT INTO `student_book`(`book_id`, `book_name`, `b_category`, `b_location`)Values ('$book_id','$book_name','$book_category'
           ,'$book_location')";
            $result=mysqli_query($con,$sql1);
            if($result){

           header("location:Library-Books.php");
            $_SESSION['successmsg']="Successfully Added."; 
        }
        

        }
        else{
            header("location:Library-Books.php");
               $_SESSION['errormsgs']="Not Added";
   
           }
    }
    
}

function delete_data(){
    global $con;
    $id=$_GET['id'];
    $sql="DELETE FROM library_book WHERE b_id='$id'";
    $result =mysqli_query($con,$sql);
    if($result){
        header ("location:Library-Books.php");

        $_SESSION['successmsg']="Successfully Deleted. ";

}
else{
    header ("location:Library-Books.php");
        $_SESSION['errormsg']="Not Deleted";

}
}


?>