<?php
session_start();
session_destroy();

header("location: http://localhost/Library Management System/signin&signup.php");
?>
