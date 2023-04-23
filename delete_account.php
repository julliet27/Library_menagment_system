<?php
   session_start();
   if(!isset($_SESSION['id']))
   {

     header("location: http://localhost/Library Management System/signin&signup.php");
   } elseif ($_SESSION['user_type'] != "user")
   {

     header("location: http://localhost/Library Management System/signin&signup.php");
   }
   $user = "root";
   $pass = "";
   $db = "library";
   $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

   if(!isset($_SESSION['id']))
   {

     header("location: http://localhost/Library Management System/signin&signup.php");
   }

   $id = $_SESSION['id'];
   $query = "delete from student where ID = '$id'";
   mysqli_query($con, $query);
   session_destroy();
   if (mysqli_affected_rows($con) == 0)
   {
     echo 'There was a problem with your query';
   } else
   {
     echo 'Operation successful';
   }
 ?>
