<?php
include 'functions.php';
include 'dbh.connect.php';

$sql = "SELECT * FROM maintenance;";
$maintenance = mysqli_query($conn,$sql);

while($rows = mysqli_fetch_assoc($maintenance))
{
    if($rows['status'] == '0')
    {
        header('Location:../View/admin/admin_mainten/adminMainten.php');
        if((isset($_POST[$rows['id'].'-submit'])))
        {
            $message = $_POST['updateMessage'];
            $updateStatus =  mysqli_query($conn,"UPDATE `maintenance` SET `status`='1', `message`= '$message'");
            header('Location:../View/admin/index.php');
        }
    }
    else
    {

            $updateStatus =  mysqli_query($conn,"UPDATE `maintenance` SET `status`='0'");
            header('Location:../View/admin/index.php');
        
    }
}


?>