<?php
session_start();
$user = "root";
$pass = "";
$db = "library";
$con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
$name = $_POST["name"];
$pass = $_POST["password"];
$dep = $_POST["department"];
$id = $_POST["ID"];
$s = "select * from student where ID = '$id'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1)
{
  header("location: http://localhost/Library Management System/signin&signup.php");
} else
{
  $reg = "insert into student values('$id', '$name', '$dep', '$pass')";
  mysqli_query($con, $reg);
  $_SESSION['msg'] = "Your registration was successful! You can now explore our books!";
  $_SESSION['id'] = $id;
  $_SESSION['name'] = $name;
  $_SESSION['user_type'] = "user";
  header("location: http://localhost/Library Management System/home.php");
}
?>
