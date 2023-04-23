<?php
  session_start();
?>
<html>
<head>
  <link rel = "stylesheet" href = "../css/main.css">
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
    }

    #register {
      float: right;
      margin-right: 10%;
    }

    #login {
      margin-left: 10%;
      margin-top: 8%;
    }
  </style>
</head>

<body>
  <form action = "validate.php" method = "post" id = "login">
    <h2>Login</h2>
    <label>Admin ID</label>
    <input type = "text" name = "id" required>
    <br><br>
    <label>Password</label>
    <input type = "password" name = "password" required>
    <br><br>
    <button type = "submit" class = "button">Login</button>
  </form>

  <form action = "register.php" method = "post" id = "register">
    <h2>Sign up</h2>
    <label>Admin ID</label>
    <input type = "text" name = "ID" required>
    <br><br>
    <label>Name</label>
    <input type = "text" name = "name" required>
    <br><br>
    <label>Password</label>
    <input type = "password" name = "password" required>
    <br><br>

    <button type = "submit" class = "button">Register</button>
  </form>
<?php
  if(isset($_SESSION['msg']))
  {
      echo $_SESSION["msg"];
  }
?>
</body>

</html>
