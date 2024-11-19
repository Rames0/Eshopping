<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat']))
{
    $catagory_title=$_POST['cat_title'];
    $select_query="Select * from `catagory` where cat_Title='$catagory_title'";
    $result_select=mysqli_query($con,$select_query);
    $num=mysqli_num_rows($result_select);
    if($catagory_title=='')
    {
        echo "<script>alert('Please Enter Catagory Title!')</script>";
    }
    else{
        
    
    if($num>0)
    {
        echo "<script >alert('Category already exists!')</script>";
    }  
    else
    { 
    
    $insert_query="insert into `catagory`(cat_Title	) values('$catagory_title')";
    $result=mysqli_query($con,$insert_query);
    if($result)
    {
        echo "<script>alert('Catagory Added Successfully!')</script>";
    }
}
}
}
?>

<h2 class="text-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
<div class="input-group flex-nowrap w-90 mb-2">
  <span class="input-group-text bg-warning" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Catagory" aria-label="Catagory" aria-describedby="addon-wrapping">
</div>
<div class="input-group flex-nowrap w-10 mb-2 m-auto">
    <input type="submit" class="bg-success text-light p-1 border-0" name="insert_cat" value="Insert Catagory" aria-label="Username" aria-describedby="addon-wrapping" class="bg-warning">
   
</div>

</form>