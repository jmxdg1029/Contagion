<?php
include 'functions.php';
include 'dbh.connect.php';

//Image Upload 
$file = $_FILES['newImage'];
    
$fileName = $_FILES['newImage']['name'];
$fileTmpName = $_FILES['newImage']['tmp_name'];
$fileSize = $_FILES['newImage']['size'];
$fileError = $_FILES['newImage']['error'];
$fileType = $_FILES['newImage']['type'];
$fileNameNew;
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');

if(in_array($fileActualExt, $allowed)) {
    if($fileError === 0) {
        if($fileSize < 200000) {
            $uniqFileName = uniqid('',true).".".$fileActualExt;
            $fileDestination = '../public/css/img/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $fileNameNew = $uniqFileName;
        }
        else {
            echo "The file is too big!";
        }
    } 
    else {
        echo "There was an error uploading your file";
    }
}
else {
    echo "You cannot upload files of this type!";
}


$sql = "SELECT * FROM items;";
$sqlCat = "SELECT * FROM category";

$catResult = mysqli_query($conn,$sqlCat);
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0)
{
   while ($rows = mysqli_fetch_assoc($result))
      {
            //If the submit button is clicked depending on the ID is True, do the following
            if((isset($_POST[$rows['Id'].'-submit'])))
            {
                //Updates the Items per Index
                
                    $id = $rows['Id'];
               
                $status = $_POST['update_show/hide'];
                $front = $_POST['updateFront'];
                $updateName = $_POST['updateName'];
                $updatePrice= $_POST['updatePrice'];
                $updateDesc = $_POST['updateDescription'];
                while($catRows = mysqli_fetch_assoc($catResult))
                {
                    if($_POST['updateCategories'] == $catRows['name'])
                    {
                     $updateCat = $catRows['id'];  
                    }
                }
               
                $updateIMG = $fileName;

                mysqli_query($conn,"UPDATE `items` SET `Id`='$id',`title`='$updateName',`description`='$updateDesc',`price`='$updatePrice',`cat_id`='$updateCat',`status`='$status',`front_page`='$front',`img`='$updateIMG' WHERE id=$id");
            }
    }
}

header('Location:../View/admin/admin_itemPage/itemPage.php');
?>