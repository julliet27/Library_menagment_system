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
  $num = $_POST["num"];
  $isbn = $_POST["isbn"];
  $query2 = "select max(Copy_ID) from copy where ISBN = $isbn group by ISBN";
  $result = mysqli_query($con, $query2);
  $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $offset = (!empty($result)) ? $result['0']['max(Copy_ID)'] + 1 : 0;
  for ($i = 1; $i <= $num; $i++)
  {
    $cp = $offset + $i;
    $query1 = "insert into copy values('$isbn', '$cp', 1)";
    mysqli_query($con, $query1);
  }
?>
