<?php
if(isset($_GET['delet_cat']))
{
    $delete_cat=$_GET['delet_cat'];

    $delete="Delete from `catagory` where cat_Id=$delete_cat";
    $run=mysqli_query($con,$delete);
    if($run)
    {
        echo "<script> alert('Category Deleted Successfully')</script>";
        echo"<script>window.open('./index.php?view_catagory','_self')</script>";
    }
}


?>