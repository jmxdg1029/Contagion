<?php
include '../Controller/functions.php';
include '../Controller/dbh.connect.php';
checkMaint($conn);
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
    <?php
        
        $sql = "SELECT * FROM maintenance;";
        $maintenance = mysqli_query($conn,$sql);

        maintenance($maintenance);
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
              <img src="../public/css/img/mask.jpg" width="55" height="55" alt="" loading="lazy">
            </a>
            <a class="navbar-brand" href="index.php">CONTAGION</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="items/itempage.php">Items</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    <div class="container">
                <div class="d-flex flex-column">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form method="post" action="items/categories/categoryPage.php">
                    <?php
                    $sql = "SELECT * FROM category;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if($resultCheck > 0)
                    {
                        while ($rows = mysqli_fetch_assoc($result))
                        {
                            if($rows['status'] == 'Show')
                            {
                            echo '<input  type="submit" href="items/categories/categoryPage.php" class="dropdown-item btn btn-outline-primary btn-block" value="'.$rows['name'].'"name="'.$rows['id'].'"></input>';
                            }
                        }
                    }
                        
                    ?>
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
          <form class="form-inline" action="search/searchPage.php" method="GET">
              <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
              <input class="form-control mr-sm-2" type="submit" value="Search">
          </form>
          </nav>
    </header>

        <main>
        <div class="container">
          <div class="row">
              <div class="col-md-6 desc">
                <h3>
                    Prices so good,it would make you sick
                </h3>
                <p class="lead"><b>A website that's COVID friendly for every user in the planet. We provide you products only we can offer. All customer checkouts are remotely, so no human contact needed! We've provided different Categories that might take you interest.</b></p>
                <p class="lead">Start Shopping and Welcome to Contagion</p>
                <a class="btn btn-primary btn-lg" href="items/itempage.php" role="button">View Items</a>
              </div>
            <div class="col-md-6">
              <img src="../public/css/img/IMG_4780.jpg" class="rounded mx-auto d-block img-fluid" style="margin-top:28%;" width="450" height="450">
            </div>
          </div>
        </div>

        <h3 class="mt-5 pb-3"style="text-align: center; font-size: 2em;">COVID Stay inside and Be Safe</h3>

        <div class="container mt-5" >
        <div class="row"> 
            <?php
             
              $sql = "SELECT * FROM items;";
              $result = mysqli_query($conn,$sql);
              $resultCheck = mysqli_num_rows($result);
              $itemTracker = 0;

              if($resultCheck > 0)
              {
                while ($rows = mysqli_fetch_assoc($result))
                {
                  if($rows['front_page'] == 'YES' && $itemTracker <= 5)
                  {
                    $itemTracker++;
                    echo '<div class="col-sm mt-4">';
                    echo '<li class="list-group-item">';
                    echo '<img src="../public/css/img/'.$rows['img'].'" height=350 width=400></img>';
                    echo '<h3>'.$rows['title'].'</h3>';
                    echo '<h3><small class="text-muted">'.$rows['description'].' </small></h3>';
                    echo '<h4>'.$rows['price'].'</h4>
                    <form action="items/detailedItemPage.php" method= "post">
                    <input class="btn btn-primary" type = "submit" name ='.$rows['Id'].' value="Buy Now!">
                    </form>';
                    echo ' </li>';
                    echo '</div>'; 
                  }
                }
              }
            ?>
          </div>
        </div>

        <hr class="mt-4 mb-3"/>
        <div class="container mb-4">
          <div class="row">
            <div class="col-md-5 mt-5 ml-5">
              <img src="../public/css/img/custombuiltAMD_electronics_pc.jpg" width="400" class="rounded d-block img-fluid">
            </div>
            <div class="col-md-5 mt-5">
              <p class="lead font-weight-light p-3"><b>Our group wanted to make a website specificly for customers that are looking to shop online during the pandemic. We created a market that sells all kind of equipment like from clothes, shoes, Electronics, etc. Contagion is designed to be diverse on the products we sell, which helps all to shop.</b></p>
              <hr class="mt-4 mb-3"/>
              <p class="lead font-weight-light p-3">This is dedicated to the people who are unable to buy the essential things they need, this place is a safehaven</p>
            </div>
          </div>
      </div>
        

    </main>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>