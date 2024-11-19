<?php
// php connection

include('../includes/connect.php');
include('../function/function.php');
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
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <style>
      body
      {
        overflow-x:hidden;
      }


    </style>
    
</head>
<body>
<!-- nav -->
<div class="container-fluid p-0">
<!-- Nav first -->
<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php"><i class='fa-solid fa-house'></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../allproduct.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <?php
        if(!isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='registration.php'>Register <i class='fa-regular fa-registered'></i></a>
        </li>";
        }       

        ?>
        
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Cart <i class="fa-solid fa-cart-shopping"><sup>
            <?php numOfCarts(); ?>
          </sup></i></a>
        </li>
        <li class="nav-item">
          <p class="nav-link" ><b>Total-Price: Rs. <?php total_cost() ?> </b></p>          
        </li>

        
      </ul>
      <form class="d-flex" role="search" action="../search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline-success" name="Pro_search">
      </form>
    </div>
  </div>
</nav>

<!-- cart -->
<?php
addToCart();
?>

<!--  nav second -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav me-auto">
           <<?php
        if(!isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome to Online_shopping </a></li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='profile.php'><i class='fa-solid fa-user'></i> ". $_SESSION['username'] . " </a></li>";

        }

        ?>
        <<?php
        if(!isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='buy.php'>Log_In <i class='fa-solid fa-right-to-bracket'></i></a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Log_Out <i class='fa-solid fa-right-from-bracket'></i></a>
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
    <div class="col-md-2 bg-dark p-0 "> 
        <!-- sidnav bar (profile)-->
    <ul class="navbar-nav me-auto text-center" style='height:69vh'>
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h2> <i class="fa-solid fa-circle-user"></i> Profile</h2></a>
        </li>
        <?php
        $user_name=$_SESSION['username'];


        ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?edit_profile">My Profile <i class='fa-solid fa-user'></i></a>
        </li>        
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?pending_ord">Pending Orders <i class="fa-solid fa-hourglass-start"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?My_order">My orders <i class="fa-solid fa-cart-arrow-down"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php?delete_acc">Delete Account <i class="fa-solid fa-trash"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="logout.php">Log Out <i class='fa-solid fa-right-from-bracket'></i></a>
        </li>

       
      </ul>
</div>
<div class="col-md-10">
    <?php
    user_order();
    if(isset($_GET['edit_profile']))
    {
        include('edit_profile.php');
    }
    if(isset($_GET['My_order']))
    {
        include('My_order.php');
    }
    if(isset($_GET['delete_acc']))
    {
        include('delete_acc.php');
    }
    ?>

</div>
    
    


    




<!-- footer -->
<?php
include('../includes/footer.php');
?>

</div>




<!-- scripting -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</body>
</html>