<?php
include '../../Controller/dbh.connect.php';
include '../../Controller/functions.php';
inner_Maint($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
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
                <a class="nav-link active" href="itempage.php">Items</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    <div class="container">
                     <div class="d-flex flex-column">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form method="post" action="categories/categoryPage.php">
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
                                 echo '<input  type="submit" href="/categories/categoryPage.php" class="dropdown-item btn btn-outline-primary btn-block" value="'.$rows['name'].'"name="'.$rows['id'].'"></input>';
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
            <a class="nav-link " href="../loginPage.php">Login</a>
          </div>
          <form class="form-inline" action="../search/searchPage.php" method="GET">
              <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search">
              <input class="form-control mr-sm-2" type="submit" value="Search">
          </form>
    </nav>

    <div class="d-flex justify-content-center">

            <div class="list-group m-5" id="categories">
                <div class="container">
                <div class="d-flex flex-column">
                <h2>Categories</h2>
                <form method="post" action="categories/categoryPage.php">
                <div class="p-2">
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
                                 echo '<input type="submit" href="categories/categoryPage.php" class="list-group-item btn btn-outline-primary btn-block " value="'.$rows['name'].'"name="'.$rows['id'].'"></input>';
                            }
                        }
                    }
                   
                 ?>
                </div>
                 </form>
                 </div>
                </div>
            </div>


            <div class="container ml-my-5 mt-5" id="itemscol1">
                <h2>Items</h2>
                <ul class="list-group">       
                    <?php
                        $sql = "SELECT * FROM items;";
                        $sqlCat = "SELECT * FROM category";
                        $result = mysqli_query($conn,$sql);
                        $catResult = mysqli_query($conn,$sqlCat);

                        $catRes = mysqli_num_rows($catResult);
                         $resultCheck = mysqli_num_rows($result);
                                          
                         if($resultCheck > 0)
                         {
                                while ($rows = mysqli_fetch_assoc($result))
                                    {
                                        $id = $rows['cat_id'];
                                        $sqlCheck = "SELECT * FROM category WHERE id=$id;";
                                        $catRow = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `name` FROM category WHERE id=$id;"));

                                        if($rows['status'] == 'SHOW')
                                        {
                                            echo '<li class="list-group-item">';
                                            echo '<img src="../../public/css/img/'.$rows['img'].'" height=350 width=400></img>';
                                            echo '<h3>'.$rows['title'].'</h3>';
                                            echo '<h3><small class="text-muted">'.$rows['description'].' '.$catRow['name'].'</small></h3>';
                                            echo '<h4>'.$rows['price'].'</h4><form action="detailedItemPage.php" method= "post">
                                            <input class="btn btn-primary" type = "submit" name ='.$rows['Id'].' value="Buy Now!">
                                            </form>';
                                            echo ' </li>';    
                                        }
                                    }                       
                        }
                                  
                    ?>
                </ul>
            </div>
    </div>

</header>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>