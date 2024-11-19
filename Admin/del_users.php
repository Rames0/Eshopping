<?php

if(isset($_GET['del_users']))
{
    $delete_user=$_GET['del_users'];
    $delete="Delete from `user` where User_Id=$delete_user";
    // @phpstan-ignore-next-line
    
    $run=mysqli_query($con,$delete);
    if($run)
    {
        echo "<script> alert('User Deleted Successfully')</script>";
        echo"<script>window.open('./index.php?users_manage','_self')</script>";
    }
}


?>