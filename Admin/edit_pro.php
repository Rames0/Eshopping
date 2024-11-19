<?php
if(isset($_GET['edit_pro']))
{
    $Pro_id=$_GET['edit_pro'];
    $pro_data="Select * from `products` where pro_Id=$Pro_id";
    $run=mysqli_query($con,$pro_data);
    $row=mysqli_fetch_assoc($run);
    $pro_title=$row['pro_Title'];
    $pro_des=$row['pro_Des'];
    $pro_key=$row['pro_key'];
    $cat_Id=$row['cat_Id'];
    $pro_img1=$row['pro_img1'];
    $pro_Price=$row['pro_Price'];  


    //catagory data

    $Select_cat = "Select * from `catagory` where cat_Id=$cat_Id";
    $run_cat=mysqli_query($con,$Select_cat);
    $row_cat=mysqli_fetch_assoc($run_cat);
    $cat_Title=$row_cat['cat_Title'];
    
}

?>

<div class="container mt-5">
    <h1 class="text-center text-success">Edit Product</h1> <hr><hr>
    <form action="" method="post" entype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"><b>Product Title</b></label>
            <input type="text" name="pro_title" id="" class="form-control" value="<?php  echo $pro_title ?>" required> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"><b>Product Description</b></label>
            <input type="text" name="pro_des" id="" class="form-control" value="<?php echo $pro_des ?>" required> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"><b>Product Key Words</b></label>
            <input type="text" name="pro_key" id="" class="form-control" value="<?php echo $pro_key ?>" required> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"><b>Product Catagory</b></label>
            <select name="pro_cat" class="form-select" required>
                <option value="<?php echo $cat_Title ?>"><?php echo $cat_Title ?></option>
                <option value="">------Select Category------</option>
                <?php
                $Select_all_cat = "Select * from `catagory`";
                $run_all_cat=mysqli_query($con,$Select_all_cat);
                while ($row_all_cat=mysqli_fetch_assoc($run_all_cat))
                {
                $cat_all_Title=$row_all_cat['cat_Title'];
                $cat_all_id=$row_all_cat['cat_Id'];
                echo "<option value='<?php echo $cat_all_id ?>'>$cat_all_Title</option>";
                }

                ?>
                
            </select> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="Image1" class="form-label"><b>Product image</b></label>
            <div class="d-flex">
            <!-- <input type="file" name="Image1" id="Image1" class="form-control w-90 m-auto"  required> -->
        <img src="./productImage/<?php echo $pro_img1 ?>" alt="" class="pro_img">    
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="" class="form-label"><b>Product Price</b></label>
            <input type="text" name="pro_price" id="" class="form-control" value="<?php echo $pro_Price ?>" required> 
        </div>
        <div class="text-center">
            <input type="submit" value="Update Product" name="update_pro" class="btn btn-success p-2 ">
        </div>
    </form>
</div>

<?php
if(isset($_POST['update_pro'])){
    $pro_titles=$_POST['pro_title'];
    $pro_desc=$_POST['pro_des'];
    $pro_keywords=$_POST['pro_key'];
    $pro_prices=$_POST['pro_price'];
    $pro_cats=$_POST['pro_cat'];

   

    // move_uploaded_file($temp_image1,"./productImage/$product_image1");
    // updating product 
    $update_proc="Update `products` set cat_id='$pro_cats',pro_Title='$pro_titles', pro_Des='$pro_desc', 
    pro_key='$pro_keywords,pro_Price='$pro_prices',date=Now() where
     pro_Id='$Pro_id'";
     $run_update=mysqli_query($con,$update_proc);
     if($run_update){
        echo '<script>alert("Updated Successfully")</script>';
        echo '<script>window.open("index.php?view_prod","_self")</script>';
     }
    }



?>