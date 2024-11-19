

<h3 class="text-center">All Order List</h3>
<table class="table table-bordered mt-5">
    <thead class="">
        <?php
        $get_order="Select * from `order_tbl` ";
        $run=mysqli_query($con,$get_order);
        $row_count=mysqli_num_rows($run);
        echo "
        <tr class='text-center'>
            <th>SN</th>
            <th>Amount</th>
            <th>Biil Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
        </thead>
        ";
        if ($row_count ==0)
        {
            echo "<h2 class='text-danger'> No any products are Orded<h2> ";
        }
        else{
            $num=0;
            while($result = mysqli_fetch_assoc($run))
            {
                $ord_id=$result['Ord_Id'];
                $user_id=$result['User_Id'];
                $amount=$result['amount'];
                $bill_num=$result['bill_num'];
                $total_pro=$result['total_pro'];
                $ord_date=$result['ord_date'];
                $ord_status=$result['ord_status'];
                $num++;
                echo"
                <tbody>
            <tr class='text-center'>
                <td>$num</td>
                <td> $amount</td>
                <td> $bill_num</td>
                <td> $total_pro</td>
                <td> $ord_date</td>
                <td> $ord_status</td>
                <td><a  href='index.php?delet_ord=$ord_id'><i class='fa-solid fa-trash text-dark'></a></td>
            </tr>
        </tbody>
        ";
            }
        }

        ?>
        

        
    





</table>