
<h3 class="text-center text-info">All Category</h3>
<table class="table table-bordered mt-5">
    <thead class="beg-info">
        <tr class='text-center'>
            <th>S.N</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selec_cat="Select *from `catagory` ";
        $result_cat= mysqli_query($con,$selec_cat);
        $sn=0;
        while($row=mysqli_fetch_assoc($result_cat))
        {
            $cat_id=$row['cat_Id'];
            $cat_title=$row['cat_Title'];
            $sn++;
        


?>
        <tr class='text-center'>
            <td><?php echo $sn ?></td>
            <td><?php echo $cat_title ?></td>
            <td><a href="index.php?edit_cat=<?php echo $cat_id ?>"><i class="fa-regular fa-pen-to-square text-dark"></i></a></td>
            <td><a  href="index.php?delet_cat=<?php echo $cat_id?>"><i class='fa-solid fa-trash text-dark'></a></td>
        </tr>
        
       
        <?php         
        } 
        ?>

    </tbody>



</table>


