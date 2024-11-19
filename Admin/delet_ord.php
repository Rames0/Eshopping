<?php
if(isset($_GET['delet_ord']))
{
    $delete_id=$_GET['delet_ord'];
    // delete order

    $delete_ord="Delete from `order_tbl` where Ord_Id=$delete_id";
    $result=mysqli_query($con,$delete_ord);
    if($result)
    {
        echo "<script>alert('Order Successfully Deleted')</script>";
        echo "<script>window.open('./index.php?order','_self')</script>";
    }
}

?>