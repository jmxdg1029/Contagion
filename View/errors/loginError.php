<?php
session_start();
include '../../Controller/functions.php';
alert('Please Log In Before Accessing');
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
            <a class="navbar-brand" href="../index.php">
              <img src="../../public/css/img/mask.jpg" width="55" height="55" alt="" loading="lazy">
            </a>
            <a class="navbar-brand" href="../index.php">CONTAGION</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="../items/itempage.php">Items</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    <div class="container">
                     <div class="d-flex flex-column">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form method="post" action="../items/categories/categoryPage.php">
                    <?php
                        $csvfile=fopen("../../Model/data/categories.csv",'r');
                        while (($csvcateg = fgetcsv($csvfile,",")) !== FALSE)
                        {
                            echo '<input  type="submit" href="../items/categories/categoryPage.php" class="dropdown-item btn btn-outline-primary btn-block" value="'.$csvcateg[1].'"name="'.$csvcateg[1].'"></input>';
                        }
                        fclose($csvfile);
                    ?>
                    </form>
                      </div>
                      </div>
                      </div>
                 </li>
              </div>
            </div>

            <div class="navbar-nav">
            <a class="nav-link " href="../loginPage.php">Login</a>
          </div>
          <form class="form-inline" action="../search/searchPage.php" method="post">
              <input class="form-control mr-sm-2" type="search" name="searched" placeholder="Search" aria-label="Search">
          </form>
          </nav>
    </header>

        <main>
        </main>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    <script src="../../public/js/bootstrap.min.js"></script>
  </body>
</html>