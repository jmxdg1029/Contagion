<?php
include "functions.php";
include "dbh.connect.php";

$sql = "SELECT * FROM items";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);


if($resultCheck > 0)
{
    while($rows = mysqli_fetch_assoc($result))
    {
    
                if((isset($_POST[$rows['Id'].'-yes'])))
                {
                    $id = $rows['Id'];
                    mysqli_query($conn,"DELETE FROM items WHERE id=$id");
                }      
    }
}
header('Location:../View/admin/admin_itemPage/itemPage.php');
    
?>