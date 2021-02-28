<?php 
include 'functions.php';
include 'dbh.connect.php';

$sql = "SELECT * FROM members;";

$conResult = mysqli_query($conn,$sql);

newPasswd($conn,$conResult);
?>