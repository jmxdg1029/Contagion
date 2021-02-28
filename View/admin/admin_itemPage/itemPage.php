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
                <a class="nav-link active" href="itemPage.php">Items</a>
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
                <div class="d-flex justify-content-center">
                            
                            <div class="container ml-my-5 mt-5" id="itemscol1">
                             <h2>Items</h2>

                                <div  class="navbar-nav">
                                <a href="addItem.php" class="btn btn-info btn-sl ">Add Item</a> 
                                </div>
                            
                                <ul class="list-group mb-5">
                                    <li class="list-group-item" id="clothing1">     
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">ID#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Description</th>
                                          <th scope="col">Price</th>
                                          <th scope="col">Categories</th>
                                          <th scope="col">Image</th>
                                          <th scope="col">Update</th>
                                          <th scope="col">Delete</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $sql = "SELECT * FROM items;";
                                          $sqlCat = "SELECT * FROM category";
                                          $result = mysqli_query($conn,$sql);
                                          $catResult = mysqli_query($conn,$sqlCat);
                                         
                                     
                                          $catRes = mysqli_num_rows($catResult);
                                          $resultCheck = mysqli_num_rows($result);
                                          
                                            if($resultCheck > 0)
                                            {
                                              while($rows = mysqli_fetch_assoc($result))
                                              {
                                                $id = $rows['cat_id'];
                                                $sqlCheck = "SELECT * FROM category WHERE id=$id;";
                                                $catRow = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `name` FROM category WHERE id=$id;"));

                                                echo '<tr>';
                                                echo '<td>'.$rows['Id'].'</td>';
                                                echo '<td>'.$rows['title'].'</td>';
                                                echo '<td>'.$rows['description'].'</td>';
                                                echo '<td>$'.$rows['price'].'</td>';
                                                echo '<td>'.$catRow['name'].'</td>';
                                                echo '<td><img src="../../../public/css/img/'.$rows['img'].'" height=100 width=100></img></td>';
                                                echo '<td><form method="post" action="updateItem.php"><input type="submit" href="updateItem.php" class="btn btn-sm btn-outline-primary" value="update" name="'.$rows['Id'].'"></input></form></td>';
                                                echo '<td><form method="post" action="deleteItem.php"><input type="submit" href="deleteItem.php" class="btn btn-sm btn-danger" value="delete" name="'.$rows['Id'].'"></input></form></td>';
                                                
                                                echo '</tr>';
                                              }
                                            }
                                            
                                        ?>
                                      </tbody>
                                    </table>

                                    </li>
                                </ul>
                            </div>     
                    </div>
            </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../../../public/js/bootstrap.min.js"></script>
  </body>
</html>