<?php
// php connection

include('includes/connect.php');
include('function/function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
    <!-- Bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link --> 
    <link rel="stylesheet" href="stylesheet.css">
    <style>
.zoom {
  padding: 50px;
  background-color: green;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 200px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
</head>
<body>
<!-- nav -->
<div class="container-fluid p-0">
<!-- Nav first -->
<nav class="navbar navbar-expand-lg bg-warning sticky-sm-top">
  <div class="container-fluid">
  <a class="nav-link active" aria-current="page" href="index.php">
    <img src="./img/logo.png" alt="logo"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php"> <i class='fa-solid fa-house'></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allproduct.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart <i class="fa-solid fa-cart-shopping"> <sup><?php numOfCarts(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <p class="nav-link" >Total-Price: Rs. <?php total_cost() ?></p>          
        </li>
        <?php
        if(!isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/registration.php'><b>Register <i class='fa-regular fa-registered'></i></b></a>
        </li>";
        }       

        ?>

        
      </ul>
      <form class="d-flex" role="search" action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline-success" name="Pro_search">
      </form>
    </div>
  </div>
</nav>

<!--  nav second -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav me-auto">
    <<?php
        if(!isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/login.php'>Welcome to Online_shopping </a></li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/profile.php'><i class='fa-solid fa-user'></i> ". $_SESSION['username'] . " </a></li>";

        }

        ?>
        <<?php
        if(!isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/buy.php'>Log_In <i class='fa-solid fa-right-to-bracket'></i></a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user/logout.php'>Log_Out <i class='fa-solid fa-right-from-bracket'></i></a>
        </li>";

        }

        ?>
</nav>

<!-- text contain -->
<div class="bg-light">
    <h2 class="text-center"> Shopping</h2>
    <p class="text-center"> Greate Shopping comes with Greate Website</P>
    </div>
<!-- container -->


<div class="row">
    <div class="col-md-2 bg-primary p-0"> 
        <!-- sidnav bar (Catagory)-->
    <ul class="navbar-nav me-auto text-center" style="height:80%">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2>Catagory</h2></a>
        </li>
        <?php

        //   sidebar function call from funtion
        sidebar();

        ?>
      </ul>


</div>
    
    


    <div class="col-md-10"> 
      <!-- list of products -->
        <div class="row">
          <div class="col-md-4">
            <!-- image-->
            <!-- <div class='card' style='width: 18rem;'>
              <img src='./Admin/productImage/$product_Image' class='card-img-top' alt='$product_Title'>
              <div class='card-body'>
               <h5 class='card-title text-center'>$product_Title</h5>
               </div>
            </div> -->


          </div>

          <div class="col-md-8">
            <!-- detail-->
            <div class="row">
                <div class="col-md-12">
                    <!-- <h1 class="text-center text-info mb-5">About Product</h1>
                    <div class='card-body'>
               <h5 class='card-title text-center'>$product_Title</h5>
               <p class='card-text'>$product_Description</p>
               <p class='card-text'><b>Price: Rs.$product_Price</b></p>
               <a href='#' class='btn btn-warning'>Add to Cart <i class='fa-solid fa-cart-plus'></i></a>
               <a href='detail.php?pro_Id=$product_Id' class='btn btn-secondary'><i class='fa-solid fa-circle-info'></i> Detail</a> -->
              </div>
                </div>


            </div>


          </div>
          <?php
          //   products function call from funtion
          details();
          search();
          cat_products();
          

          ?>

           
            
      </div>

</div>




<!-- footer -->
<?php
include('./includes/footer.php');
?>

</div>




<!-- scripting -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>