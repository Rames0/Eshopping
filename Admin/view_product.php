<h1 class="text-center text-success">All Products</h1>
<table class="table table-bordered mt-2 ">
    <thead class="text-center">
        <tr>
        <th class="bg-warning">S.N</th>
        <th class="bg-warning">Product Id</th>
        <th class="bg-warning">Product Title</th>
        <th class="bg-warning">Product Image</th>
        <th class="bg-warning">Product Price</th>
        <th class="bg-warning">Product Category</th>
        <th class="bg-warning">Selling Items</th>
        <th class="bg-warning">Status</th>       
        <th class="bg-warning">Delete</th>
        </tr>

    </thead>
    <tbody class="bg-dark">
        <?php
        $product= "Select * from `products`";
        $execute = mysqli_query($con,$product);
        $SN=1;
        while ($row = mysqli_fetch_assoc($execute)) 
        { 
            $pro_id=$row['pro_Id'];
            $pro_title=$row['pro_Title'];
            $pro_image=$row['pro_img1'];
            $pro_price=$row['pro_Price'];
            $cat_id=$row['cat_Id'];
            $pro_stat=$row['status'];
            ?>

   
        <tr class='text-center' >
        <td class='bg-success text-light'><?php echo $SN ?></td>
        <td class='bg-success text-light'><?php echo $pro_id ?></td>
        <td class='bg-success text-light'><?php echo $pro_title ?></td>
        <td class='bg-success text-light'><?php echo "<img src='./productImage/$pro_image' class='pro_img'>" ?></td>
        <td class='bg-success text-light'><?php echo $pro_price ?></td>
        <?php
         $catt= "Select * from `catagory` where cat_Id=$cat_id ";
         $execute_cat = mysqli_query($con,$catt);         
         while ($row = mysqli_fetch_assoc($execute_cat)) 
         { 
             $cat_Id=$row['cat_Id'];
             $cat_Title=$row['cat_Title'];           
          
         }
        //  echo $cat_Title;
         ?>
        <td class='bg-success text-light'><?php echo $cat_Title ?></td>
        <td class='bg-success text-light'>
            <?php 
            $count= "Select * from `pending_tbl` where pro_Id=$pro_id ";
            $execute_count = mysqli_query($con,$count);
            $rows_count = mysqli_num_rows($execute_count);
            echo  $rows_count;        
         
        ?>
        </td>
        <td class='bg-success text-light'><?php echo $pro_stat ?></td>        
        <td class='bg-danger text-light'><a href="index.php?delet_pro= <?php echo $pro_id ?>"><i class='fa-solid fa-trash text-light'></i></a></td>


</tr>

      
       
<?php
$SN++;
        }
        ?>
        

    </tbody>




</table>
    
