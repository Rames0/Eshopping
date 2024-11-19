<?php
if(isset($_GET['delet_pro']))
{
    $delete_id=$_GET['delet_pro'];
    // delete product

    $delete_pro="Delete from `products` where pro_Id=$delete_id";
    $result=mysqli_query($con,$delete_pro);
    if($result)
    {
        echo "<script>alert('Product Successfully Delete')</script>";
        echo "<script>window.open('./index.php?view_product','_self')</script>";
    }
}

?>