<html>
<body>
  <link rel = "stylesheet" href = "../css/main.css">
  <h1 style = 'text-align: center; padding-top: 20%;'>Successful!</h1>
</body>
</html>
<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header("location: http://localhost/Library Management System/admin/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "admin")
  {
    header("location: http://localhost/Library Management System/admin/signin&signup.php");
  }
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $isbn = $_POST["isbn"];
  $stu_id = $_POST["stu_id"];
  $cpid = $_POST["cpid"];

  $query1 = "update borrows set Payment_status = 1 where ISBN = '$isbn' and Copy_ID = '$cpid' and Student_ID = '$stu_id'";
  $result1 = mysqli_query($con, $query1);

?>
