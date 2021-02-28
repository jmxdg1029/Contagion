<?php
session_start();
include '../../Controller/functions.php';
include '../../Controller/dbh.connect.php';
check_access();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
              <img src="../../public/css/img/mask.jpg" width="55" height="55" alt="" loading="lazy">
            </a>
            <a class="navbar-brand" href="index.php">CONTAGION (Admin)</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="admin_itemPage/itemPage.php">Items</a>
                <a class="nav-link" href="admin_categories/adminCategories.php" role="button" > Categories</a>
              </div>
            </div>

            <div class="navbar-nav">
            <a href="changePswd/new_pswd.php" class="btn btn-info btn-sl">Password Change</a>
            <a class="nav-link " href="../loginPage.php">Logout</a>
          </div>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          </form>
          </nav>
    </header>
        <main class=" bg-secondary">
          <div class="container">
                <div class="row">   
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4"> 
                <h1 class=" display-4 py-1 text-truncate ml-5">Dashboard</h1>
                    <hr class="mt-4 mb-3"/>
                        <div class="login-form mt-4 ml-5 justify-content-center">
                        <a href="admin_itemPage/itemPage.php" class="btn btn-info btn-lg">Manage Items</a>
                        </div>
                        <div class="login-form mt-3 ml-5 justify-content-center">
                        <a href="admin_categories/adminCategories.php" class="btn btn-info btn-lg">Manage Categories</a>
                        </div>
                        <div class="login-form mt-3 ml-5 justify-content-center">
                        <?php
                        $sql = 'SELECT * FROM maintenance;';
                        $maintenance = mysqli_query($conn,$sql);
                        while($rows = mysqli_fetch_assoc($maintenance))
                        {
                          if($rows['status'] == '0')
                          {
                            echo '<a href="../../Controller/maintenanceControl.php" class="btn btn-info btn-lg">Website Maintenance</a>';
                          }
                          else
                          {
                            echo '<a href="../../Controller/maintenanceControl.php" class="btn btn-danger btn-lg">Finish Maintenance</a>';
                          }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        <hr class="mt-4 mb-3"/>
        </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
  </body>
</html>