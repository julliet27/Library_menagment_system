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

    #update {
      float: right;
      margin-right: 5px;
    }

    #delete {
      float: right;
      margin-right: 3%;
    }

    #add_copy {
      float: right;
    }
  </style>
</head>
<body>
  <nav>
  <ul>
  <li><a href = "http://localhost/Library Management System/admin/view_requests.php" target="_blank">View Requests</a></li>
  <li><a href = "http://localhost/Library Management System/admin/take_back.php" target="_blank">Borrowed Books</a></li>
  <li><a href = "http://localhost/Library Management System/admin/search.php" target="_blank">Search Books</a></li>
  <!-- <li><a href = "contact.asp">Contact</a></li>
  <li><a href = "about.asp">About</a></li> -->
  <li style = 'float : right;'><a href = "http://localhost/Library Management System/admin/logout.php">Logout</a>
  </ul>
</nav>
  <?php
    session_start();
    if(!isset($_SESSION['id']))
    {
      header("location: http://localhost/Library Management System/admin/signin&signup.php");
    } elseif ($_SESSION['user_type'] != "admin")
    {
      header("location: http://localhost/Library Management System/admin/signin&signup.php");
    }

    $name = $_SESSION['name'];
    echo "<h1 style = 'margin-left: 4%;'>Hi $name</h1><br>";

    // $user = "root";
    // $pass = "";
    // $db = "project";
    //
    // $db = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
    // echo "Hi '$'<br>";

    // $result = mysqli_query($db, "SELECT * FROM developers");
    // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // foreach ($rows as $row) {
    //   printf("%s", $row["name"]);
    //   echo "<br>";
    // }
   ?>
   <a href = "http://localhost/Library Management System/admin/logout.php">Logout</a>

   <form action = "admin_action.php" method="POST">
     <h2>Add a Book</h2>

     <label>ISBN</label>
     <input type = "text" name = "isbn" required>
     <br><br>
     <label>Price</label>
     <input type = "number" name = "price" required>
     <br><br>
     <label>Publisher</label>
     <input type = "text" name = "publisher" required>
     <br><br>
     <label>Language</label>
     <input type = "text" name = "language" required>
     <br><br>
     <label>Title</label>
     <input type = "text" name = "title" required>
     <br><br>
     <label>Publish Date</label>
     <input type = "date" name = "publish_date" required>
     <br><br>
     <label>Genre</label>
     <input type = "text" name = "genre" required>
     <br><br>
     <label>Authors</label>
     <input type = "text" name = "authors" required>
     <br><br>
     <label>Number</label>
     <input type = "number" name = "num" required>
     <br><br>
     <button name = "submit" value = "add_book" type = "submit" class = "button">Submit</button>
   </form>

   <form action = "admin_action.php" method="POST" id = "delete">
     <h2>Delete Book</h2>

     <label>ISBN</label>

     <input type = "text" name = "isbn" required>
     <br><br>
     <button name = "submit" value = "del_book" type = "submit" class = "button">Submit</button>
   </form>

   <form action = "admin_action.php" method="POST" id = "update">
     <h2>Update book price</h2>

     <label>ISBN</label>
     <input type = "text" name = "isbn" required>
     <br><br>
     <label>New price</label>
     <input type = "number" name = "new_price" required>
     <br><br>
     <button name = "submit" value = "alt_book_price" type = "submit" class = "button">Submit</button>
   </form>

</body>
</html>
