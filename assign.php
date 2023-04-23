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
  $stu_id = $_POST["id"];
  $wishlist_id  =$_POST["wishlist_id"];

  $query = "select * from copy where ISBN = '$isbn' and Availability = 1";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $num = mysqli_num_rows($result);

  if ($num == 0)
  {
    echo "Book not available";
  } else
  {
    $copy_id = $rows['0']['Copy_ID'];
    $query2 = "insert into borrows values('$isbn', $copy_id, $stu_id, 0, date_add(CURRENT_DATE(), interval 2 week), CURRENT_DATE())";
    mysqli_query($con, $query2);
    $query3 = "update copy set Availability = 0 where ISBN = '$isbn' and Copy_ID = $copy_id";
    mysqli_query($con, $query3);
    $query4 = "delete from wishlist_book where Student_ID = $stu_id and Wishlist_ID = $wishlist_id";
    mysqli_query($con, $query4);
  }
?>
