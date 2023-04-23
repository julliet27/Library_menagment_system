<html>
<body>
  <head>
    <link rel = "stylesheet" href = "../css/main.css">
  </head>
<?php
  session_start();
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  // $genre = $_POST["genre"];
  // $name = $_POST["name"];
  // $author = $_POST["author"];
  // $language = $_POST["language"];
  $categories = ["Genre", "Title", "author_name", "Language"];
  if (!isset($_POST["genre"]))
  {
    $_POST["genre"] = NULL;
  }
  if (!isset($_POST["title"]))
  {
    $_POST["title"] = NULL;
  }
  if (!isset($_POST["author"]) || $_POST["author"] == "None")
  {
    $_POST["author"] = NULL;
  }
  if (!isset($_POST["language"]) || $_POST["language"] == "None")
  {
    $_POST["language"] = NULL;
  }
  $features = array(mysqli_real_escape_string($con, $_POST["genre"]), mysqli_real_escape_string($con, $_POST["title"]), mysqli_real_escape_string($con, $_POST["author"]), mysqli_real_escape_string($con, $_POST["language"]));
  // $query = "";
  // if ($_POST["author"] != NULL)
  // {
  //   $query = "select * from book, author where book.ISBN = author.ISBN"
  // }
  // $query = "select * from book";
  $query = "";
  $first = 0;
  for ($i = 0; $i < 4; $i++)
  {
    $cat = $categories[$i];
    $feat = $features[$i];
    if ($first == 0 && $feat != NULL)
    {
      $filter = " where $cat = '$feat'";
      $query = $query.$filter;
      $first = 1;
    } elseif ($feat != NULL)
    {
      $filter = " and $cat = '$feat'";
      $query = $query.$filter;
    }
  }
  if ($_POST["author"] != NULL)
  {
    $query = "select * from book, author ".$query." and book.ISBN = author.ISBN";
  } else
  {
    $query = "select * from book".$query;
  }

  //printf($query);

  echo "<table>
  <tr id = 'table_head'>
    <td>Title</td>
    <td>ISBN</td>
    <td>Price</td>
  </tr>";

  $present = array();
  $list = mysqli_fetch_all(mysqli_query($con, $query), MYSQLI_ASSOC);
  array_keys($list);
  foreach ($list as $item)
  {
    if (!in_array($item["ISBN"], $present))
    {
      $title = $item['Title'];
      $price = $item['Price'];
      $isbn = $item['ISBN'];
      echo "<tr id = 'table_data'>";
      echo "<td>$title</td>";
      echo "<td>$isbn</td>";
      echo "<td>$price</td>";
      echo "<td><form action = 'copy_add.php' method = 'post' target = '_blank'><input type='hidden' name='isbn' value=$isbn>
            <input type='number' name='num'> <button class = 'button' type = 'submit'>Add Copies</button></form></td>";
      echo "</tr>";
      echo "<br>";
      array_push($present, $item["ISBN"]);
    }
  }

 ?>
 </html>
</body>
