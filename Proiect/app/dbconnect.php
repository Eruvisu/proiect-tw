<?php
require_once('db_const.php');
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or
die("Connection to database error " . mysqli_error($con));
?>
