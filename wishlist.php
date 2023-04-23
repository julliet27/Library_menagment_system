<?php
session_start();
if(!isset($_SESSION['id']))
{

  header("location: http://localhost/Library Management System/signin&signup.php");
} elseif ($_SESSION['user_type'] != "user")
{

  header("location: http://localhost/Library Management System/signin&signup.php");
}
?>
<html>
<head>
  <link rel = "stylesheet" href = "css/main.css">
  <style>
    form {
      display: inline-block;
      font-size: 40px;
      color: white;
      border-radius: 25px;
      background-color: #333;
      padding: 30px;
      opacity: 0.9;
      margin-top: 2%;
      margin-left: 25%;
    }

    h1 {
      padding-top: 12.5%;
      text-align: center;
      justify-content: center;
    }

  </style>
</head>
<body>
  <h1>Let us know what you want to read!</h1>
<form action = 'http://localhost/Library Management System/wishlist_add.php' method = "POST">
  <label for = "title">Title:</label>
  <input type = "text" name = "title" id = "title">

  <label for = "isbn">ISBN:</label>
  <input type = "text" name = "isbn" id = "isbn">

  <button type = "submit" class = 'button'>Submit</button>
</form>
</body>
</html>
