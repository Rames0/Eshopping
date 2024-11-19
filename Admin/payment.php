

<h3 class="text-center">User Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="">
        <?php
        $get_pay="Select * from `payment` ";
        $run=mysqli_query($con,$get_pay);
        $row_count=mysqli_num_rows($run);
        echo "
        <tr class='text-center'>
            <th>SN</th>
            <th>Amount</th>
            <th>Biil Number</th>
            <th>Payment Method</th>
            <th>Order Date</th>        
            <th class='bg-danger text-light'>Delete</th>
        </tr>
        </thead>
        ";
        if ($row_count ==0)
        {
            echo "<h2 class='text-danger'> No any Payments for Orders<h2> ";
        }
        else{
            $num=0;
            while($result = mysqli_fetch_assoc($run))
            {
                $pay_Id=$result['pay_Id'];
                $Ord_Id=$result['Ord_Id'];
                $bill_num=$result['bill_num'];
                $amount=$result['amount'];
                $pay_mode=$result['pay_mode'];
                $date=$result['date'];
                // $ord_status=$result['ord_status'];
                $num++;
                echo"
                <tbody>
            <tr class='text-center'>
                <td>$num</td>
                <td> $amount</td>
                <td> $bill_num</td>
                <td> $pay_mode</td>
                <td > $date</td>                
                <td class='bg-danger'><a  href='index.php?del_payment=$pay_Id'><i class='fa-solid fa-trash text-light '></a></td>
            </tr>
        </tbody>
        ";
            }
        }

        ?>
        

        
    





</table>