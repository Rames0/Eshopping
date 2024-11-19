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
    <title>Admin Registration</title>
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
        <h1 class="text-center mb-5 mt-3 bg-success text-light">Admin Registration</h1>
        <form action="" method="post">
            <div class="form-outline mb-4 mx-5">
                <label for="adm_name" class="form-label text-light "><b>User Name:</b></label>
                <input type="text" name="adm_name" id="adm_name" class="form-control w-50" placeholder="Enter Your Username" required>
            </div>
            <div class="form-outline mb-4 mx-5">
                <label for="adm_email" class="form-label text-light "><b>User Email:</b></label>
                <input type="email" name="adm_email" id="adm_email" class="form-control w-50" placeholder="Enter Your Email" required>
            </div>
            <div class="form-outline mb-4 mx-5">
                <label for="adm_pass" class="form-label text-light "><b>Password:</b></label>
                <input type="password" name="adm_pass" id="adm_pass" class="form-control w-50" placeholder="Enter Your Password" required>
            </div>
            <div class="form-outline mb-4 mx-5">
                <label for="adm_pass_conf" class="form-label text-light "><b>Confirm Password:</b></label>
                <input type="password" name="adm_pass_conf" id="adm_pass_conf" class="form-control w-50" placeholder="Enter Your Confirm Password" required>
            </div>
            <div class="mx-5 ">
                <input type="submit" value="Register" class="btn btn-info p-2" name="adm_register"> 
                <h5 class="text-light mt-3 ">Don't You Have an Account? 
                    <a href="adm_login.php" class="btn bg-primary p-2 border-0 text-light">Log In <i class="fa-solid fa-right-to-bracket"></i></a>
                </h5>           
            </div>





        </form>



    </div>
    
</body>
</html>


<!-- php code for registration -->

<?php
if(isset($_POST['adm_register']))
{
    // $adm_Id=$_POST['adm_Id'];
    $adm_name=$_POST['adm_name'];   
    $adm_email=$_POST['adm_email'];   
    $adm_pass=$_POST['adm_pass'];
    $encrypt_pass = password_hash($adm_pass,PASSWORD_DEFAULT);
    $adm_pass_conf=$_POST['adm_pass_conf'];    
// selecting query
$select_query="select *from `adm_tbl` where adm_name='$adm_name' or adm_email='$adm_email'";
$result = mysqli_query($con,$select_query);
$cont_row=mysqli_num_rows($result);
if ($cont_row>0){
    echo "<script>alert('Username or Email address already exist')</script>";
}
else if($adm_pass!=$adm_pass_conf)
{
    echo "<script>alert('Password and Confirm Password are not Matched')</script>";

}
else {
    //inserting in db
    
    $insert_query= "insert into `adm_tbl` (adm_name,adm_email,adm_pass) 
    values ('$adm_name','$adm_email','$encrypt_pass')";
    $execute=mysqli_query($con,$insert_query);

    if($execute)
    {
        echo "<script> alert('User Registered successfully.')</script>";
        echo "<script> window.open('adm_login.php','_self')</script>";
    }
    else{
        die (mysqli_error($con));
    } 
}      

}



?>