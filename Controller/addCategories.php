<?php
    include "dbh.connect.php";

    $id = $_POST['id'];
    $catTitle = $_POST['categories'];
    $desc = $_POST['description'];
    $status = "Show";
    
    $categories = "INSERT INTO `category`(`id`, `name`, `desc`, `status`) VALUES ('$id','$catTitle','$desc','$status');";

    mysqli_query($conn, $categories);
    header('Location:../View/admin/admin_categories/adminCategories.php');
?>