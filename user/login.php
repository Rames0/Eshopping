<?php
// php connection

include('../includes/connect.php');
include('../function/function.php');
@session_start();
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
    <link rel="stylesheet" href="./stylesheet.css">
    <style>
      body
      {
        overflow-x:hidden;
      }


    </style>
</head>
<body>
    <div class="container-fluid ">
    
        <h2 class="text-center bg-info p-2"> User LogIn</h2>
        <hr><hr>
        <div class="row d-flex align-tems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" entype="multipart/fprm-data">
                    <div class="form-outline mb-2 w-50">
                        <label for="user_name" class="form-label"><i class="fa-regular fa-user fa-fade"></i> User Name: </label>
                        <input type="text" id="user_name" class="form-control" name="User_Name" placeholder="Enter User Name" autocomplete="off"  required>
                    </div>
                    
                    
                    <div class="form-outline mb-2 w-50">
                        <label for="user_pass" class="form-label"><i class="fa-solid fa-key"></i> Password: </label>
                        <input type="password" id="user_pass" class="form-control" name="user_pass" placeholder="Enter User Password" autocomplete="off"  required>
                    </div>
                    
                    
                    <div class="mt-4 Pt-2">
                    <!-- <a href='../index.php' class='btn btn-secondary'><i class="fa-solid fa-arrow-left"></i> Back to Home</a> -->
                        <input type="submit" value="LogIn User" class="btn bg-warning p-2 border-0" name="login">
                        
                        
                        <p class="mt-3"> <h5>Don't have an Account? 
                        <a href="registration.php" class="btn bg-primary p-2 border-0 text-light" > 
                            Register Here</a></h5> </p>
                        <!-- <input type="submit" value="LogIn" class="bg-success text-light px-3 border-0 text-decoration-none" name="login"> -->
                        
                    </div>


                </form>


            </div>


        </div>



    </div>
    
</body>
</html>


<?php

if(isset($_POST['login']))
{
    $user_name=$_POST['User_Name'];
    $user_pass=$_POST['user_pass'];
    // $_SESSION['username']=$user_name;


    $select_query="Select *from `user` where user_Name='$user_name'";
    $run=mysqli_query($con,$select_query);
    $count_user=mysqli_num_rows($run);
    $bd_pass=mysqli_fetch_assoc($run);
    $user_IP = getIPAddress();
    // items from cart 
    $select_cart_query="Select *from `cart` where IP_address='$user_IP'";
    $run_cart=mysqli_query($con,$select_cart_query);
    $count_cart=mysqli_num_rows($run_cart);




    if($count_user>0)
    {
        $_SESSION['username']=$user_name;
        if(password_verify($user_pass,$bd_pass['user_pass']))
        {

            if($count_user==1 and $count_cart==0)
            {
                // echo "<script type='text/javascript'>alert('User Logged In')</script>";
                echo "<script type='text/javascript'>window.open('../index.php','_self')</script>";

            }
            else{
                $_SESSION['username']=$user_name;
                // echo "<script type='text/javascript'>alert('User Logged In')</script>";
                echo "<script type='text/javascript'>window.open('buy.php','_self')</script>";
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Invalid Password')</script>";
        }

    
    }
    else{
        echo "<script type='text/javascript'>alert('Invalid User Name')</script>";
    }
}


?>