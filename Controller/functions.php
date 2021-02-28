<?php
function get($name,$def='')
{
    return $_REQUEST[$name] ?? $def;
}

function check_access(){
    if(!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in'])
    header('Location:../errors/loginError.php?error=you must login first');
}

function check_inner_access(){
    if(!isset($_SESSION['user_logged_in']) || !$_SESSION['user_logged_in'])
    header('Location:../../errors/loginError.php?error=you must login first');
}

function alert($msg){
    //Alerts the User
    echo "<script type'text/javascript'>alert('$msg');</script>";
}

function newPasswd($conn,$conResult){
    while($rows = mysqli_fetch_assoc($conResult))
    {
        $newPass = get('newPassword');
        mysqli_query($conn,"UPDATE `members` SET `password` = '$newPass'");
    }
    header('Location:../View/loginPage.php');
}

function maintenance($maintenance)
{
    while($main = mysqli_fetch_assoc($maintenance))
        {
          if($main['status'] == '1')
          {
            header('Location:maintenance.php');
          }
        }
}

function displayItemsOnIndex($result,$conn){

    while ($rows = mysqli_fetch_assoc($result)) 
    {
        $id = $rows['id'];
        $catRow = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM category WHERE id=$id;"));
     //If Specific Update Button clicked And the button matches with the current category
        if((isset($_POST[$rows['id']]))&& $rows['front_page'] == "YES")
        {
            //Display all the Items
            echo '<li class="list-group-item">';
            echo '<img src="../../../public/css/img/'.$rows['img'].'" height=350 width=400></img>';
            echo '<h3>'.$rows['title'].'</h3>';
            echo '<h3><small class="text-muted">'.$rows['description'].' '.$rows['id'].'</small></h3>';
            echo '<h4>'.$rows['price'].'</h4><form action="items/detailedItemPage.php" method= "post">
            <input class="btn btn-primary" type = "submit" name ='.$rows['Id'].' value="Buy Now!">
            </form>';
            echo ' </li>';
        } 
    }
}


function checkMaint($conn)
{
    $sql = "SELECT `status` FROM maintenance;";
    $maintenance = mysqli_query($conn,$sql);

    while($rows = mysqli_fetch_assoc($maintenance))
    {
        if($rows['status'] == '1')
        {
            header('Location:maintenance.php');
    
        }
    }
}

function inner_Maint($conn)
{
    $sql = "SELECT `status` FROM maintenance;";
    $maintenance = mysqli_query($conn,$sql);

    while($rows = mysqli_fetch_assoc($maintenance))
    {
        if($rows['status'] == '1')
        {
            header('Location:../maintenance.php');
    
        }
    }
}

function cat_maint($conn)
{
    $sql = "SELECT `status` FROM maintenance;";
    $maintenance = mysqli_query($conn,$sql);

    while($rows = mysqli_fetch_assoc($maintenance))
    {
        if($rows['status'] == '1')
        {
            header('Location:../../maintenance.php');
    
        }
    }
}


function displayItems($result,$conn){

    while ($rows = mysqli_fetch_assoc($result)) 
    {
        $id = $rows['cat_id'];
        $catRow = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `id` FROM category WHERE id=$id;"));
        $catRowName = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `name` FROM category WHERE id=$id;"));
    //If Specific Update Button clicked And the button matches with the current category
        if((isset($_POST[$rows['cat_id']])) && $catRow && $rows['status'] == "SHOW")
        {
            //Display all the Items
            echo '<li class="list-group-item">';
            echo '<img src="../../../public/css/img/'.$rows['img'].'" height=350 width=400></img>';
            echo '<h3>'.$rows['title'].'</h3>';
            echo '<h3><small class="text-muted">'.$rows['description'].' '.$catRowName['name'].'</small></h3>';
            echo '<h4>'.$rows['price'].'</h4><form action="../detailedItemPage.php" method= "post">
            <input class="btn btn-primary" type = "submit" name ='.$rows['Id'].' value="Buy Now!">
            </form>';
            echo ' </li>';       
        } 
    }
}




function chosenNewId($csvdata)
{
    //If Specific Update Button clicked
    if(isset($_POST[$csvdata[0]])) //Each update button is named by a specfic Item ID
    {
        //Display all Items
        echo '<p>'.$csvdata[0].'</p>';
        echo $csvdata[1];
        echo $csvdata[2];
        echo $csvdata[3];
        echo $csvdata[4];
        echo $csvdata[5];
    }
}