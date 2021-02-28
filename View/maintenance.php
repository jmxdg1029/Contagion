<?php
include '../Controller/dbh.connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
              <img src="../public/css/img/mask.jpg" width="55" height="55" alt="" loading="lazy">
            </a>
            <a class="navbar-brand" href="index.php">CONTAGION</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
              
                    </form>
                      <div class="dropdown-divider"></div>
                    </div>
                </div>
                    </div>
                 </li>
              </div>
            </div>
            <div class="navbar-nav">
            <a class="nav-link " href="loginPage.php">Login</a>
          </div>
            <form class="form-inline" action="search/searchPage.php" method="post">
              <input class="form-control mr-sm-2" type="search" name="searched"placeholder="Search" aria-label="Search">
          </form>
          </nav>
    </header>

        <main>
        <div class="container">

                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                <img src="../public/css/img/maint.png" class="rounded mx-auto d-block img-fluid" style="margin-top:28%;" width="450" height="450">
                </div>
                <div class=" text-center mx-auto desc">
                <?php
                    $sql = " SELECT `message` FROM maintenance;";
                    $maintMSG = mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_assoc($maintMSG))
                    {
                     echo '<h3>'.$row['message'].'</h3>';
                    }
                ?>
                </div>         
        </div>

        
        

    </main>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>