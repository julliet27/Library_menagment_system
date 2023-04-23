<html>
<head>
  <link rel = "stylesheet" href = "../css/main.css">
</head>
<body>
  <section>
  <p class = 'option'>Choose your options, leave empty if no preference</p>
   <form name="search" action="http://localhost/Library Management System/admin/booklist.php" method="post">

     <label for="genre">Genre:</label>
     <input type="text" id="genre" name="genre">
     <br><br>
     <label for="english">Language:</label>
    <input type="text" id="language" name="language">


    <br><br>
   <label for = "author" >Author name:</label>

   <input type = "text" name = "author" id = "author">
   <br><br>

   <label for = "title">Book Title:</label>

   <input type = "text" name = "title" id = "title">

   <br><br>

     <button type = "submit" formtarget="_blank" class = 'button'>Search</button>

   </form>
 </section>
</body>
<html>
