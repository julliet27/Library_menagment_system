<html>
<head>
  <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
<?php
  session_start();
  if(!isset($_SESSION['id']))
  {

    header("location: http://localhost/Library Management System/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "user")
  {

    header("location: http://localhost/Library Management System/signin&signup.php");
  }
  $id = $_SESSION['id'];
  echo "<h1>Your past orders</h1>";
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $query = "select * from past_order where Student_ID = '$id'";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo "<table>
  <tr id = 'table_head'>
    <td>Title</td>
    <td>ISBN</td>
    <td>Price</td>
    <td>Late_fee_paid</td>
    <td>Date_borrowed</td>
    <td>Date_returned</td>
  </tr>";
  foreach ($rows as $row)
  {
    $title = $row['Title'];
    $isbn = $row['ISBN'];
    $price = $row['Price'];
    $late_fee = $row['Late_fee_paid'];
    $bor_date = $row['Date_borrowed'];
    $ret_date = $row['Date_returned'];
    echo "<tr id = 'table_data'>";
    echo "<td>$title</td>";
    echo "<td>$isbn</td>";
    echo "<td>$price</td>";
    echo "<td>$late_fee</td>";
    echo "<td>$bor_date</td>";
    echo "<td>$ret_date</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
?>
</body>
</html>
