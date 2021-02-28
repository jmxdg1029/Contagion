<?php
session_start();
include '../../../Controller/functions.php';
include '../../../Controller/dbh.connect.php';
check_inner_access();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php">
              <img src="../../../public/css/img/mask.jpg" width="55" height="55" alt="" loading="lazy">
            </a>
            <a class="navbar-brand" href="../index.php">CONTAGION (Admin)</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="../index.php">Dashboard<span class="sr-only">(current)</span></a>
                <a class="nav-link active" href="../admin_itemPage/itemPage.php">Items</a>
                <a class="nav-link" href="../admin_categories/adminCategories.php" role="button">Categories</a>
              </div>
            </div>

            <div class="navbar-nav">
            <a href="../changePswd/new_pswd.php" class="btn btn-info btn-sl">Password Change</a>
            <a class="nav-link " href="../../loginPage.php">Logout</a>
          </div>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          </form>
          </nav>
    </header>


        <main class="bg-secondary">
            <div class="container">
                <div class="row justify-content-center">
                <form action = "../../../Controller/mysql.php" method = "post" class="mt-5" enctype="multipart/form-data">
                      Item ID <input type = "text" name = "id" required>
                      &nbsp;
                      Name <input type = "text" name = "name" required>
                      &nbsp;
                      Price <input type = "text" name = "price">
                      <input type = "submit" name = "submit" value = "Submit">
                      <div class="form-group mt-3">
                      description 
                      <textarea class="form-control" name = "description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      &nbsp;
                    </div>
                    <select class="custom-select mb-4" name='categories' id="inlineFormCustomSelectPref">
                      <?php
                      $sqlCat = "SELECT * FROM category";
                      $catResult = mysqli_query($conn,$sqlCat);
                      $resultCheck = mysqli_num_rows($catResult);

                      if($resultCheck > 0)
                      {
                        while($rows = mysqli_fetch_assoc($catResult))
                        {
                          
                          echo '<option selected>'.$rows['name'].'</option>';
                          
                        }
                      }
                      ?>
                    </select>
                    Item Image: 
                    <input type="file" name="image" id="image">

                      <input type="radio" id="show" name="show/hide" value="SHOW">
                      <label for="show" >SHOW</label>
                      <input type="radio" id="hide" name="show/hide" value="HIDE">
                      <label for="hide"> HIDE</label>
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      Front Page
                      <input type="radio" id="front" name="front" value="YES">
                      <label for="show" >YES</label>
                      <input type="radio" id="front" name="front" value="NO">
                      <label for="hide"> NO</label>
                 </form>
              </div>    
        <hr class="mt-4 mb-3"/>
        </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../../../public/js/bootstrap.min.js"></script>
  </body>
</html>