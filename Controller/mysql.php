<?php
include 'functions.php';

$file = $_FILES['image'];
    
$fileName = $_FILES['image']['name'];
$fileTmpName = $_FILES['image']['tmp_name'];
$fileSize = $_FILES['image']['size'];
$fileError = $_FILES['image']['error'];
$fileType = $_FILES['image']['type'];
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

$servername = "localhost";
$username = "f0t30";
$password = "Troop1234";
$dbname = "f0t30_Assignment2";


$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("Connection failed".$conn->connect_error);
}

    $sqlCat = "SELECT * FROM category";
    $catResult = mysqli_query($conn,$sqlCat);

    $id =  $_POST['id'];
    $title = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    while($rows = mysqli_fetch_assoc($catResult))
    {
        if($_POST['categories'] == $rows['name'])
        {
            $cat_id = $rows['id'];
        }
    }
    $status = $_POST['show/hide'];
    $front = $_POST['front'];
 

    $items = "INSERT INTO `items`(`id`, `title`, `description`, `price`, `cat_id`, `status`, `front_page`,`img`) VALUES ('$id','$title','$desc','$price','$cat_id','$status','$front','$fileName');";
    
     mysqli_query($conn, $items);
     header("Location:../View/admin/admin_itemPage/itemPage.php");

$conn->close();

?>