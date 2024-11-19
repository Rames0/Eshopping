
    <h3 class="text-center bg-light p-2 text-danger mb-4">Delete My Account</h3>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <p class="text-center">
            <input type="submit" value="Delete My Account" class=" btn btn-outline-danger form-control w-50 p-2  m-auto" name="delete">
            <input type="submit" value="Don't Delete My Account" class=" btn btn-outline-success form-control w-50 mt-5  m-auto" name="dont_delete">
            </P>
        </div>
    </form>

    <?php
     $user_name=$_SESSION['username'];
     if(isset($_POST["delete"]))
     {
        $delete_acc ="Delete from `user` where user_Name='$user_name'";
       $execute= mysqli_query($con,$delete_acc);
       if($execute)
       {
        session_destroy();
        echo "<script type='text/javascript'>alert('Account Deleted Successfully')</script>;
        <script type='text/javascript'>window.open('../index.php','_self')</script>";
       }
     }
     if(isset($_POST["dont_delete"]))
     {
        echo "<script type='text/javascript'>window.open('profile.php','_self')</script>";
     }

    ?>
