<?php
if(isset($_GET['edit_cat']))
{
    $edit_cat=$_GET['edit_cat'];
    $select_cat="Select * from `catagory` where cat_Id=$edit_cat ";
    $run=mysqli_query($con,$select_cat);
    $row=mysqli_fetch_assoc($run);
    $cat_title=$row['cat_Title'];
}
if(isset($_POST['update_cat']))
{
    $cat_ttitle=$_POST['cat_title'];
    $update_cat="UPDATE `catagory` set  cat_Title='$cat_ttitle' WHERE cat_Id=$edit_cat";
    $runn=mysqli_query($con,$update_cat);
    if($runn)
    {
        echo "<script>alert('Category Updated Successfully')</script>";
        echo"<script>window.open('./index.php?view_catagory','_self')</script>";
    }
}


?>

<div class="container mt-3">
    <h1 class="text-center">Edit Catagory</h1>
    <form action="" method="post">
        <div class="form-outline mb-3 w-50 m-auto">
            <label for="cat_title" class="form-label"><b>Catagory Title: </b></label>
            <input type="text" value="<?php echo $cat_title ?>" class="form-control" name="cat_title" id="cat_title" autocomplete="off" required >
        </div>
        <input type="submit" value="Update Category" class="btn btn-success m-auto" name="update_cat">
    </form>

</div>

<?php
?>