<html>
<body>
<head>
  <link rel = "stylesheet" href = "../css/main.css">
</head>

<?php
  session_start();
  if(!isset($_SESSION['id']))
  {

    header("location: http://localhost/Library Management System/admin/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "admin")
  {

    header("location: http://localhost/Library Management System/admin/signin&signup.php");
  }

  $id = $_SESSION['id'];
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $query = "select * from borrows";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo "<table>
  <tr id = 'table_head'>
    <td>Student ID</td>
    <td>ISBN</td>
    <td>Copy ID</td>
    <td>Payment Status</td>
    <td>Return Date</td>
    <td>Borrowed Date</td>
  </tr>";

  foreach ($rows as $row)
  {
    $stu_id = $row['Student_ID'];
    $isbn = $row['ISBN'];
    $cpid = $row['Copy_ID'];
    $pay_stat = ($row['Payment_status'])? "Paid" : "Not paid";
    $ret_date = $row['Return_date'];
    $bor_date = $row['Date_borrowed'];
    echo "<tr id = 'table_data'>";
    echo "<td>$stu_id</td>";
    echo "<td>$isbn</td>";
    echo "<td>$cpid</td>";
    echo "<td>$pay_stat</td>";
    echo "<td>$ret_date</td>";
    echo "<td>$bor_date</td>";
    echo "<td><form action = 'return.php' method = 'post' target = '_blank'><input type='hidden' name='stu_id' value=$stu_id>
          <input type='hidden' name='isbn' value=$isbn> <input type='hidden' name='cpid' value=$cpid> <button type = 'submit' class='button'>Return Book</button></form></td>";
    echo "<td><form action = 'clear_payment.php' method = 'post' target = '_blank'><input type='hidden' name='stu_id' value=$stu_id>
          <input type='hidden' name='isbn' value=$isbn> <input type='hidden' name='cpid' value=$cpid> <button type = 'submit' class='button'>Clear Payment</button></form></td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
?>

<html>
<body>

</body>
</html>
