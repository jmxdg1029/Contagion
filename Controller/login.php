<?php
session_start();
include 'functions.php';
include 'dbh.connect.php';

$selectMembers = "SELECT * FROM members;";
$connectStatus = mysqli_query($conn,$selectMembers);
$statusCheck = mysqli_num_rows($connectStatus);
$_SESSION['user_logged_in'] = false;

if($statusCheck > 0)
{
  while($row = mysqli_fetch_assoc($connectStatus))
  {
    if($row['username'] == get('username') && $row['password'] == get('password'))
    {
      $_SESSION['user_logged_in']=true;
      header('Location:../View/admin/index.php');
    }
  }
    if($_SESSION['user_logged_in'] == false)
    {  
      header('Location:../View/errors/wrongLogin.php');
    }
}


?>


