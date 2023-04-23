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

  $query1 = "select Title, Price from book where ISBN = '$isbn'";
  $result1 = mysqli_query($con, $query1);
  $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
  $title = mysqli_real_escape_string($con, $rows1['0']['Title']); $price = $rows1['0']['Price'];

  $query2 = "select Date_borrowed from borrows where ISBN = '$isbn' and Copy_ID = $cpid and Student_ID = '$stu_id'";
  $result2 = mysqli_query($con, $query2);
  $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
  $date_borrowed = $rows2['0']['Date_borrowed'];

  $query3 = "select datediff(current_date(), date_add('$date_borrowed', interval 2 week)) as delay";
  $result3 = mysqli_query($con, $query3);
  $rows3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
  $delay = $rows3['0']['delay'];
  $late_fee = max($delay/7, 0) * 10;


  $query4 = "select max(Past_order_ID) from past_order group by Student_ID and Student_ID = $stu_id";
  $result4 = mysqli_query($con, $query4);
  $result4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);
  $past_order_ID = (!empty($result4)) ? $result4['0']['max(Past_order_ID)'] + 1 : 0;
  // $query4 = "select * from past_order where Student_ID = '$stu_id'";
  // $result4 = mysqli_query($con, $query4);
  // $past_order_ID = mysqli_num_rows($result4);

  $curr_date = "select current_date()";
  $curr_date = mysqli_query($con, $curr_date);
  $curr_date = mysqli_fetch_all($curr_date, MYSQLI_ASSOC)['0']['current_date()'];
  $query5 = "insert into past_order values($past_order_ID, '$stu_id', $late_fee, '$title', '$price', '$isbn', '$curr_date', '$date_borrowed')";
  mysqli_query($con, $query5);
  $query5 = "delete from borrows where ISBN = '$isbn' and Student_ID = '$stu_id' and Copy_ID = $cpid";
  mysqli_query($con, $query5);
  $query5 = "update copy set Availability = 1 where ISBN = '$isbn' and Copy_ID = '$cpid'";
  mysqli_query($con, $query5);
  //printf($query5);
?>
