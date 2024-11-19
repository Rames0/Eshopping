<?php
$user_name=$_SESSION['username'];
$get_user="Select * from `user` where user_Name='$user_name'";
$result = mysqli_query($con,$get_user);
$fetch_data = mysqli_fetch_assoc($result);
$user_id=$fetch_data['User_Id'];


?>

<h3 class="text-center bg-info p-3 text-light">My Orders</h3>

<table class="table table-bordered bg-info ">
    <thead class="bg-info text-center">
    <tr >
        <th>S.N</th>
        <!-- <th class="bg-success">Product Title</th>         -->
        <th>Amount</th>
        <th>User Items</th>
        <th>Bill Number</th>
        <th>Date</th>
        <th>Product State</th>
        <th>Status</th>

    </tr>
    </thead>
    <tbody class="bg-success">
        <?php
        $get_order="Select * from `order_tbl` where User_Id=$user_id";
        $result_order = mysqli_query($con,$get_order);
        $sn=1;
        while($row_order= mysqli_fetch_assoc($result_order))
        {
            $order_id=$row_order['Ord_Id'];
            $order_amt=$row_order['amount'];
            $order_bill_num=$row_order['bill_num'];
            $order_pro=$row_order['total_pro'];
            $order_state=$row_order['ord_status'];
            if($order_state=='Pending')
            {
                $order_state='Incomplete';
            }
            else{
                $order_state='Complete';
            }
            $order_date=$row_order['ord_date'];
            
            
            echo "
            <tr class='text-center'>
            <td>$sn</td>            
            <td >Rs.$order_amt</td>
            <td>$order_pro</td>
            <td>$order_bill_num</td>
            <td>$order_date</td>
            <td>$order_state</td>";
            ?>
            <?php
            if($order_state=='Complete')
            {
                echo "<td class='bg-success text-light'> paid</td>";
            }
            else{

            
            
         echo    "<td><p><a href='confirm.php?order_id=$order_id' class='btn btn-outline-success'>confirm</a><p></td>
        </tr>            
            ";
        }

            $sn++;


        }



?>       
    </tbody>
</table>