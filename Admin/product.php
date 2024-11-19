<?php
// php connection

include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
    $product_title=$_POST['Product_Title'];

    $product_description=$_POST['description'];

    $product_Keyword=$_POST['Keyword'];

    $product_categroy=$_POST['product_categroy'];

    $product_price=$_POST['price'];
    $product_status='true';

    // images
    $product_image1=$_FILES['Image1']['name'];

  
    // temp name

    $temp_image1=$_FILES['Image1']['tmp_name'];




    //regularl expression
    if($product_title=='' or $product_description=='' or $product_Keyword=='' or 
    $product_categroy=='' or $product_price=='' or $product_image1=='')
    {
        echo "<script>alert('Please Fill all fields')</script>";
    }
    else
    {
        move_uploaded_file($temp_image1,"./productImage/$product_image1");
// inserting 
        $insert_product="insert into `products` (pro_Title,pro_Des,pro_key,cat_Id,pro_img1
        ,pro_Price,date,status) values('$product_title','$product_description',
        '$product_Keyword','$product_categroy','$product_image1','$product_price',NOW(),'$product_status')";
        
        $result_query=mysqli_query($con,$insert_product);
        if($result_query)
        {
            echo "<script>alert('Product Inserted')</script>";
        }
    }
     


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
        <!-- Bootsrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link --> 
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container">
    <h1 class="text-center">Insert Your Products</h1>
    <!-- form for product inserting -->
    <form action="" method="post" enctype="multipart/form-data">
      <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for= "Product_Title "class="form-lebel"> Product Title* :</label>
            <input type="text" name="Product_Title" id="Product_Title" 
            class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for= "description "class="form-lebel"> Product Description* :</label>
            <input type="text" name="description" id="description" 
            class="form-control" placeholder="Product Description" autocomplete="off" maxlength="100" required>
        </div>
        <!-- Keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for= "Keyword "class="form-lebel"> Product Keyword* :</label>
            <input type="text" name="Keyword" id="Keyword" 
            class="form-control" placeholder="Product Keyword" autocomplete="off" maxlength="100" required>
        </div>

        <!-- Catagory -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for= "category "class="form-lebel"> Product Category* :</label>
            <select name="product_categroy" id="" class="form_select">
                <option disabled selected value> Select Category</option>
                <?php
                $select_query="Select * from `catagory`";
                $resul_query=mysqli_query($con,$select_query);
                while ($row = mysqli_fetch_assoc($resul_query))
                {
                    $catagory_title=$row['cat_Title'];
                    $catagory_id=$row['cat_Id'];
                    echo "<option value='$catagory_id'>$catagory_title</option>";
                
                }
                ?>
                </select>        
        </div>

        <!-- Image  -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for= "Image1 "class="form-lebel"> Product Image1*</label>
            <input type="file" name="Image1" id="Image1" class="form-control" required>
        </div>
        
        <!-- <div class="form-outline mb-4 w-50 m-auto">
            <label for= "Image2 "class="form-lebel"> Product Image2</label>
            <input type="file" name="Image2" id="Image2" class="form-control" >
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for= "Image3 "class="form-lebel"> Product Image3</label>
            <input type="file" name="Image3" id="Image3" class="form-control" >
        </div> -->
    <!-- Cost -->
    <div class="form-outline mb-4 w-50 m-auto">
            <label for= "price "class="form-lebel"> Product Price* :</label>
            <input type="text" name="price" id="price" 
            class="form-control" placeholder="Enter Product Prnce" autocomplete="off" required>
        </div>

        <!-- submit -->
    <div class="form-outline mb-4 w-50 m-auto">
    <!-- <a href='index.php' class='btn btn-secondary'><i class="fa-solid fa-arrow-left"></i> Back</a> -->
            <input type="submit" name="insert_product"  
            class="btn btn-warning" value="Insert Product" >

            
        </div>
        
        


    </form>

    </div>

    
</body>
</html>