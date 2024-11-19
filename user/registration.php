<?php
// php connection

include('../includes/connect.php');
include('../function/function.php');
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid ">
        <!-- header -->
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
    </div>
</div>
  
</nav>
</nav>
<!-- end of header-->

        <h2 class="text-center bg-info p-2 mt-2"> Register New User</h2>
        <hr><hr>
        <div class="row d-flex align-tems-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" entype="multipart/fprm-data">
                    <div class="form-outline mb-2">
                        <label for="user_name" class="form-label"><i class="fa-regular fa-user fa-fade"></i> User Name: </label>
                        <input type="text" id="user_name" class="form-control" name="User_Name" placeholder="Enter User Name" autocomplete="off"  required>
                    </div>
                    <div class="form-outline mb-2">
                        <label for="user_email" class="form-label"><i class="fa-solid fa-envelope"></i> Email: </label>
                        <input type="email" id="user_email" class="form-control" name="User_Email" placeholder="Enter User Email" autocomplete="off"  required>
                    </div>
                    <!-- IMAGE -->
                    <!-- <div class="form-outline mb-2">
                        <label for="user_image" class="form-label"><i class="fa-regular fa-image"></i> Upload Image: </label>
                        <input type="file" id="user_image" class="form-control" name="user_image"  required>
                    </div> -->
                    <div class="form-outline mb-2">
                        <label for="user_password" class="form-label"><i class="fa-solid fa-key"></i> Password: </label>
                        <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter User Password" autocomplete="off"  required>
                    </div>
                    <div class="form-outline mb-2">
                        <label for="userRe_pass" class="form-label"><i class="fa-solid fa-key fa-flip-horizontal"></i> Confirm Password: </label>
                        <input type="password" id="userRe_pass" class="form-control" name="userRe_pass" placeholder="Confirm Password" autocomplete="off"  required>
                    </div>
                    <div class="form-outline mb-2">
                        <label for="user_add" class="form-label"><i class="fa-solid fa-location-dot"></i> User Address: </label>
                        <input type="text" id="user_add" class="form-control" name="user_add" placeholder="Enter User Address" autocomplete="off"  required>
                    </div>
                    <div class="form-outline mb-2">
                        <label for="user_num" class="form-label"><i class="fa-solid fa-phone-volume"></i> User Number: </label>
                        <input type="text" id="user_num" class="form-control" name="user_num" placeholder="Enter User Number" autocomplete="off"  required>
                    </div>
                    <div class="mt-4 Pt-2">
                        <input type="submit" value="Register" class="btn bg-warning p-2 border-0" name="Registration">
                        
                        <p class="mt-3"> <h5>Already have an Account? 
                        <a href="buy.php" class="btn bg-primary p-2 border-0 text-light" > 
                            logIn <i class="fa-solid fa-right-to-bracket"></i></a></h5> </p>
                        <!-- <input type="submit" value="LogIn" class="bg-success text-light px-3 border-0 text-decoration-none" name="login"> -->
                        
                    </div>


                </form>


            </div>


        </div>

<!-- footer -->
<?php
include('../includes/footer.php');
?>

    </div>
    
</body>
</html>

<!-- php code for registration -->

<?php
if(isset($_POST['Registration']))
{
    $user_name=$_POST['User_Name'];
    $user_email=$_POST['User_Email'];   
    $user_password=$_POST['user_password'];
    $encrypt_pass = password_hash($user_password,PASSWORD_DEFAULT);
    $user_Repassword=$_POST['userRe_pass'];
    $user_address=$_POST['user_add'];
    $user_number=$_POST['user_num'];
    // $user_image=$_FILES['user_image']['name'];
    // $user_Tmpimage=$_FILES['user_image']['tmp_name'];
    $user_IP = getIPAddress();
// selecting query
$select_query="select *from `user` where user_Name='$user_name' or User_Email='$user_email'";
$result = mysqli_query($con,$select_query);
$cont_row=mysqli_num_rows($result);
if ($cont_row>0){
    echo "<script>alert('Username or Email address already exist')</script>";
}
else if($user_password!=$user_Repassword)
{
    echo "<script>alert('Password and Confirm Password are not Matched')</script>";

}
else if (!preg_match('/^[9]\d{9}$/', $user_number))
{
    echo '<script type="text/javascript"> alert("Invalid Phone Number"); </script>';

}
else {
    //inserting in db
    // move_uploaded_file($user_Tmpimage,"./images/$user_image");
    $insert_query= "insert into `user` (user_Name,User_Email,user_pass,user_Ip,user_address,user_num) 
    values ('$user_name','$user_email','$encrypt_pass','$user_IP','$user_address','$user_number')";
    $execute=mysqli_query($con,$insert_query);

    if($execute)
    {
        echo "<script> alert('User Registered successfully.')</script>";
        echo "<script> window.open('buy.php','_self')</script>";
    }
    else{
        die (mysqli_error($con));
    } 
}  

// validating cart items 

$select_cart="Select * from `cart` where IP_address='$user_IP'";
$result_cart = mysqli_query($con,$select_cart);
$cont_cart_row=mysqli_num_rows($result_cart);
if ($cont_cart_row>0){
    $_SESSION['username']=$user_name;
    echo "<script>alert('items in carts')</script>";
    echo "<script>window.open('buy.php','_self')</script>";
}
else{
    echo "<script>window.open('../index.php','_self'</script>";

}

    

}



?>