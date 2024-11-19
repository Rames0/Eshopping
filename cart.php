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
          <a class="nav-link active" aria-current="page" href="index.php"><i class='fa-solid fa-house'></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allproduct.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart <i class="fa-solid fa-cart-shopping"><sup>
            <?php numOfCarts(); ?>
          </sup></i></a>
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

    <!-- cart info -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
               
                <tbody>
                    <?php
                    global $con;
                    $ip_add = getIPAddress();
                    $total=0;                    
                    $cart_query = "Select * from `cart` where IP_address='$ip_add' ";
                    $result_query=mysqli_query($con,$cart_query);   
                    $count_cart=mysqli_num_rows($result_query);
                    if($count_cart>0)
                    {    
                      echo"
                      <thead>
                      <tr>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Quantity</th>                        
                          <th>Price per Item</th>                        
                          <th>Remove</th>
                          <th>Operation</th>
  
                      </tr>
                  </thead>
                  ";        
                    while($row=mysqli_fetch_array($result_query))
                    {
                      $pro_id=$row['pro_Id'];
                      $select_product= "Select * from `products` where pro_Id='$pro_id' ";
                      $result=mysqli_query($con,$select_product);
                
                      while($row_pro_price=mysqli_fetch_array($result))
                    {
                      $total_price = array($row_pro_price['pro_Price']);
                      $unit_price = $row_pro_price['pro_Price'];
                      $pro_title = $row_pro_price['pro_Title'];
                      $pro_img = $row_pro_price['pro_img1'];
                      $total_sum = array_sum($total_price);
                      $total += $total_sum;

?>
<tr>
                        
                        
                    <td> <?php echo $pro_title ?> </td>
                    <td> <img src="./Admin/productImage/<?php echo $pro_img ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-control w-5"></td>
                    <?php
                    $ip_add = getIPAddress();
                    if(isset($_POST["update_cart"])){
                        $quantity = $_POST['qty']; 
                        $updateCart = "update `cart` set Qty=$quantity and IP_address='$ip_add' ";
                        $result_cart=mysqli_query($con,$updateCart);
                        $total=$total*$quantity;
                    }
                    ?>
                    
                    <td>Rs.<?php echo $unit_price ?> </td>                    
                    <td><input type="checkbox" name="remove[]" id="" value="<?php echo $pro_id?>" ></td>
                    <td>
                        <!-- <button class='btn btn-warning bg-info p-2 m-3 '>update</button> -->
                        <input type="submit" value="Update" class='btn btn-warning bg-info p-2 m-3 ' name="update_cart" >
                        <!-- <button class='btn btn-warning bg-danger p-2 m-3 '> remove</button> -->
                        <!-- <input type="submit" value="Remove" class='btn btn-warning bg-danger p-2 m-3 text-light' name="remove_cart" > -->
                    </td>  
                    </tr>

                    <?php
                    }
                }
              }
              else
              {
                echo "<h2 class='text-center text-danger'>No Itesms to Display</h2>";
              }
              
                    ?>                  
                </tbody>
            </table>
            <div class="d-flex p-2">
      <?php
      $ip_add = getIPAddress();                         
      $cart_query = "Select * from `cart` where IP_address='$ip_add' ";
      $result_query=mysqli_query($con,$cart_query);   
      $count_cart=mysqli_num_rows($result_query);
      if($count_cart>0)
      {
        echo "
        <h4 class='px-3 m-3'> Total Price: Rs.<strong>$total</strong></h4>
                              
                <input type='submit' value='Continue Shopping' class='btn btn-primary p-2 m-3' name='continue_Shopping'>
                <input type='submit' value='Buy Now' class='btn btn-warning p-2 m-3' name='Buy'>
                <input type='submit' value='Remove' class='btn btn-warning bg-danger p-2 m-3 text-light' name='remove_cart' >
                
            
        ";

      }
      else{
        echo "<input type='submit' value='Continue Shopping' class='btn btn-primary p-2 m-auto ' name='continue_Shopping'>";

      }
      if(isset($_POST['continue_Shopping']))
      {
        echo "<script>window.open('index.php','_self')</script>";
      }
      if(isset($_POST['Buy']))
      {
        echo "<script>window.open('./user/buy.php','_self')</script>";
      }

      ?>
      </div>

            
        </div>
    </div>

    </form>   
    
                

    <!-- removing product -->

    <?php
    function productRemove()
    {
        global $con;
        if(isset($_POST['remove_cart']))
        {
            foreach ($_POST['remove'] as $remove_Id)
            {
                echo $remove_Id;
                $deleteProduct = "DELETE FROM `cart` WHERE pro_Id='$remove_Id'";
                $run_delete=mysqli_query($con,$deleteProduct);
                if($deleteProduct)
                {
                    echo "<script>window.open('cart.php','_self')</script>";
                    
                }
            }
        }
    }
    echo $remove_Product = productRemove();
   ?>


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