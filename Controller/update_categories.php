<?php
include 'functions.php';
include 'dbh.connect.php';

$sql = "SELECT * FROM category;";

$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0)
{
   while ($rows = mysqli_fetch_assoc($result))
      {
            //If the submit button is clicked depending on the ID is True, do the following
            if((isset($_POST[$rows['id'].'-submit'])))
            {

                //Updates the Items per Index
                $id = $rows['id'];
                $updateName = $_POST['updateCatName'];
                $updateDesc = $_POST['updateCatDesc'];
                $status = $_POST['update_Catshow/hide'];

                mysqli_query($conn,"UPDATE `category` SET `id`='$id',`name`='$updateName',`desc`='$updateDesc',`status`='$status' WHERE id=$id");
            }
    }
}
header('Location:../View/admin/admin_categories/adminCategories.php');

?>