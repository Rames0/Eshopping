<?php
if(isset($_GET['del_payment']))
{
    $delete_pay=$_GET['del_payment'];

    $delete="Delete from `payment` where pay_Id=$delete_pay";
    $run=mysqli_query($con,$delete);
    if($run)
    {
        echo "<script> alert('Payment Deleted Successfully')</script>";
        echo"<script>window.open('./index.php?payment','_self')</script>";
    }
}


?>