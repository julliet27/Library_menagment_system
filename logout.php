<?php
session_start();
session_destroy();

header("location: http://localhost/Library Management System/admin/signin&signup.php");
?>
