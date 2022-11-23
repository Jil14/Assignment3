<?php
session_start();
require 'dbconn.php';

if(isset($_POST['submit'])){
     $name = mysqli_real_escape_string($con ,$_POST['name']);
     $email = mysqli_real_escape_string($con ,$_POST['email']);
     $bio = mysqli_real_escape_string($con ,$_POST['bio']);

     $query = "INSERT INTO student (name,email,bio) VALUES ('$name','$email','$bio')";  

     $query_run = mysqli_query($con,$query);


     if($query_run){
        $_SESSION['message'] = "Student record added successfully";
        header("Location : index.php");
        exit(0);
     }

     else{

        $_SESSION['message'] = "Student record not added";
        header("Location : index.php");
        exit(0);
     }
}

?>