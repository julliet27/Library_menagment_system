<html>
<body>
  <link rel = "stylesheet" href = "css/main.css">
  <h1 style = 'text-align: center; padding-top: 20%;'>Successful!</h1>
</body>
</html>
<?php
  session_start();
  if(!isset($_SESSION['id']))
  {

    header("location: http://localhost/Library Management System/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "user")
  {

    header("location: http://localhost/Library Management System/signin&signup.php");
  }
  $isbn = $_POST['isbn'];
  $stu_id = $_SESSION['id'];
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $title = $_POST['title'];
  $title = mysqli_real_escape_string($con, $title);
  // $query1 = "select * from book where isbn = '$isbn'";
  // $result1 = mysqli_query($con, $query1);
  // $num = mysqli_num_rows($result1);
  $query2 = "select max(Wishlist_ID) from wishlist_book where Student_ID = $stu_id group by Student_ID";
  $result2 = mysqli_query($con, $query2);
  $result2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
  $wish_id = (!empty($result2)) ? $result2['0']['max(Wishlist_ID)'] + 1 : 0;
  $query3 = "insert into wishlist_book values($wish_id, '$stu_id', '$title', '$isbn', CURRENT_DATE())";
  mysqli_query($con, $query3);
  // if ($num == 0)
  // {
  //   $query3 = "insert into wishlist_book values($wish_id, '$stu_id', '$title', '$isbn', 0, 0, CURRENT_DATE())";
  //   mysqli_query($con, $query3);
  // } else
  // {
  //   $query4 = "select * from copy where ISBN = '$isbn' and Availability = 1";
  //   $quantity = mysqli_num_rows(mysqli_query($con, $query4));
  //   $stock = 0;
  //   if ($quantity > 0)
  //   {
  //     $stock = 1;
  //   }
  //   $query3 = "insert into wishlist_book values($wish_id, '$stu_id', '$title', '$isbn', 1, $stock, CURRENT_DATE())";
  //   mysqli_query($con, $query3);
  // }
 ?>
