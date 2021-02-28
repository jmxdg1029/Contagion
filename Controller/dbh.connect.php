<?php
$servername = "localhost";
$username = "f0t30";
$password = "Troop1234";
$dbname = "f0t30_Assignment2";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("Connection failed".$conn->connect_error);
}
?>