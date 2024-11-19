<?php
if(isset($_GET['edit_profile']))
{
    $user_session=$_SESSION['username'];
    $select_query="Select * from `user` where user_Name='$user_session'";
    $execute = mysqli_query($con,$select_query);
    $fetching=mysqli_fetch_assoc($execute);
    $user_id=$fetching['User_Id'];
    $user_name=$fetching['user_Name'];
    $user_email=$fetching['User_Email'];
    $user_add=$fetching['user_address'];
    $user_num=$fetching['user_num'];
}

    if(isset($_POST['update']))
    {
        $update_Id=$user_id;
        $new_name=$_POST['user_Name'];
        $new_email=$_POST['user_Email'];
        $new_add=$_POST['user_add'];
        $new_num=$_POST['user_num'];

        $updateUser="Update `user` set user_Name='$new_name',User_Email='$new_email',
        user_address='$new_add',user_num='$new_num' where User_Id=$update_Id ";
        $updating = mysqli_query($con,$updateUser);
        if($updating)
        {
            echo "<script>alert('Data Updated successfully')</script>;
            <script>window.open('logout.php','_self')</script>
            
            
            ";

        }

    }
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center bg-info text-light p-2">Edit Your Account</h2>
    <hr><hr>
    <form action="" method="post" entype="multipart/form-data">
        <div class="form-outline mt-4 mb-2 w-50 m-auto">
            <label for="user_name" class="form-label"><i class="fa-regular fa-user fa-fade"></i> User Name: </label>
             <input type="text" id="user_name" class="form-control" name="user_Name" value="<?php echo $user_name ?>" autocomplete="off" readonly>
        </div>
        <div class="form-outline mb-2 w-50 m-auto">
            <label for="user_email" class="form-label"><i class="fa-solid fa-envelope"></i> Email: </label>
            <input type="email" id="user_email" class="form-control" name="user_Email" value="<?php echo $user_email ?>" autocomplete="off" readonly>
        </div>
        <div class="form-outline mb-2 w-50 m-auto">
            <label for="user_add" class="form-label"><i class="fa-solid fa-location-dot"></i> User Address: </label>
            <input type="text" id="user_add" class="form-control" name="user_add" value="<?php echo $user_add ?>" autocomplete="off">
        </div>
        <div class="form-outline mb-2 w-50 m-auto">
            <label for="user_num" class="form-label"><i class="fa-solid fa-phone-volume"></i> User Number: </label>
            <input type="text" id="user_num" class="form-control" name="user_num" value="<?php echo $user_num ?>" autocomplete="off">
        </div>

       <p class="text-center"> <input type="submit" value="Update" class="btn btn-outline-success p-2 mt-5 border-3" name="update"></p>






    </form>
    
    
</body>
</html>