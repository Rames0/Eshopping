<?php


include('../includes/connect.php');
include('../function/function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
 <!-- Bootsrap css link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        /* .admin_img {
    width: 100%;
    object-fit: contain;
} */
      body
      {
        overflow-x:hidden;
      }
      .pro_img
      {
        width:100px;        
        object-fit:contain;
      }


    
    </style>

</head>
<body>
    <!-- nav bar -->
    <div class="container-fluid p-0">
        <!-- nav first -->
        <nav class="navbar navr-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <img src="../img/logo.png" alt="logo">
                <nav class="navbar navr-expand-lg ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            
                            <?php
        if(isset($_SESSION['username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link text-danger fw-bold text-decoration-none' href=''><i class='fa-solid fa-user'></i> ". $_SESSION['username'] . " </a></li>";

        }

        ?> 

                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- nav second -->

        <div class="bg-light">
            <h3 class="text-center p-2">Management</h3>
        </div>

        <!-- nav third -->
        <div class="row">
            <div class="col-md-12 bg-primary p-1 d-flex align-items-center">
                <div>
                    <a href="index.php"><img src="../img/admin.png" alt="admin" class="admin_img"></a>
                    <p class="text-light text-center">
                        <?php
        if(isset($_SESSION['username']))
        {
          echo $_SESSION['username'];
        }

        ?> 
        </p>
                </div>
                <div class="button text-center p-2">
                    <button class="my-3 p-1 "><a href="index.php?insert_product" class="nav-link text-dark bg-warning p-1 m-1"> Insert Product</a></button>
                    <button class="my-3 p-1 "><a href="index.php?view_product" class="nav-link text-dark bg-warning p-1 m-1"> View Product</a></button>
                    <button class="my-3 p-1 "><a href="index.php?insert_catagory" class="nav-link text-dark bg-warning p-1 m-1">Insert Catagory </a></button>
                    <button class="my-3 p-1 "><a href="index.php?view_catagory" class="nav-link text-dark bg-warning p-1 m-1">View Catagory</a></button>
                    <button class="my-3 p-1 "><a href="index.php?order" class="nav-link text-dark bg-warning p-1 m-1">Orders</a></button>
                    <button class="my-3 p-1 "><a href="index.php?payment" class="nav-link text-dark bg-warning p-1 m-1"> Payments</a></button>
                    <button class="my-3 p-1 "><a href="index.php?users_manage" class="nav-link text-dark bg-warning p-1 m-1">Users</a></button>
                    <button class="my-3 p-1 "><a href="adm_logout.php" class="nav-link text-dark bg-warning p-1 m-1">Logout <i class="fa-solid fa-right-from-bracket"></i> </a></button>
     


                </div>

            </div>

        </div>
<!-- container -->
<div class="container mt-5">
<?php
// inserting,deleting,editing product 
if(isset($_GET['insert_product']))
{
    include('product.php');
}
if(isset($_GET['view_product']))
{
    include('view_product.php');
}
if(isset($_GET['delet_pro']))
{
    include('delet_pro.php');
}

// inserting,deleting,editing catagory 

if(isset($_GET['insert_catagory']))
{
    include('insert_catagory.php');
}
if(isset($_GET['view_catagory']))
{
    include('view_catagory.php');
}
if(isset($_GET['edit_cat']))
{
    include('edit_cat.php');
}
if(isset($_GET['delet_cat']))
{
    include('delet_cat.php');
}

// orders 

if(isset($_GET['order']))
{
    include('order.php');
}
if(isset($_GET['delet_ord']))
{
    include('delet_ord.php');
}

// payment 

if(isset($_GET['payment']))
{
    include('payment.php');
}
if(isset($_GET['del_payment']))
{
    include('del_payment.php');
}

// users management 

if(isset($_GET['users_manage']))
{
    include('users_manage.php');
}
if(isset($_GET['del_users']))
{
    include('del_users.php');
}


?>

</div>


        <!-- footer -->
        <?php
include('../includes/footer.php');
?>
    

<!-- scripting -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

<!-- Jquery  -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>