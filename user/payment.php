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
<style>
    .img1{
        width: 50%;
    }

</style>
<body>
<!-- php code for accepting payment   -->
<?php
$user_IP = getIPAddress();
$get_user= "Select * from `user` where user_Ip='$user_IP'";
$result = mysqli_query($con,$get_user);
$run = mysqli_fetch_array($result);
$user_id= $run['User_Id'];
?>


    <div class="container ">
        <h2 class="text-center bg-info p-2">Pay Through</h2>
        <div class="row d-flex justify-contain-center align-items-center ">
            <div class="col-md-4">
            <a href="../khalti/pay.php?user_Id=<?php echo $user_id?>" target='_blank'><img src="../img/khalti.png" alt="" class="img1"></a>
            </div>
          
                       
            <div class="col-md-4">
            <a href="order.php?user_Id=<?php echo $user_id?>" ><img src="../img/cash.png" alt="" class="img1"></a>
            </div>
        </div>


    </div>
    
</body>
</html>