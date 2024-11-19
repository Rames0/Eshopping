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
    <title>Admin Login</title>
    <!-- Bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link --> 
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body class="bg-secondary">
<div class="container-fluid">
        <h1 class="text-center mb-5 mt-3 bg-success text-light">Admin Log In</h1>
        <form action="" method="post">
            <div class="form-outline mb-4 mx-5">
                <label for="adm_name" class="form-label text-light "><b>User Name:</b></label>
                <input type="text" name="adm_name" id="adm_name" class="form-control w-50" placeholder="Enter You Username" required>
            </div>            
            <div class="form-outline mb-4 mx-5">
                <label for="adm_pass" class="form-label text-light "><b>Password:</b></label>
                <input type="password" name="adm_pass" id="adm_pass" class="form-control w-50" placeholder="Enter You Password" required>
            </div>            
            <div class="mx-5 ">
                <input type="submit" value="Log In " class="btn btn-info p-2" name="adm_login">
                <h5 class="text-light mt-3 ">Don't You Have an Account? 
                    <a href="adm_registration.php" class="btn bg-primary p-2 border-0 text-light">Register</a>
                </h5>           
            </div>





        </form>



    </div>
    
</body>
</html>


<?php

if(isset($_POST['adm_login']))
{
    $adm_name=$_POST['adm_name'];
    $adm_pass=$_POST['adm_pass'];
    // $_SESSION['username']=$user_name;


    $select_query="Select *from `adm_tbl` where adm_name='$adm_name'";
    $run=mysqli_query($con,$select_query);
    $count_user=mysqli_num_rows($run);
    $bd_pass=mysqli_fetch_assoc($run);    


    if($count_user>0)
    {
        $_SESSION['username']=$adm_name;
        if(password_verify($adm_pass,$bd_pass['adm_pass']))
        {           
                // echo "<script type='text/javascript'>alert('User Logged In')</script>";
                echo "<script type='text/javascript'>window.open('index.php','_self')</script>";
            
            
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