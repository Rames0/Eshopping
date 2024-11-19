

<h3 class="text-center">List All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="">
        <?php
        $get_user="Select * from `user` ";
        $run=mysqli_query($con,$get_user);
        $row_count=mysqli_num_rows($run);
        echo "
        <tr class='text-center'>
            <th>SN</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>            
            <th>User Address</th>
            <th>User Number</th>                   
            <th class='bg-danger text-light'>Delete</th>
        </tr>
        </thead>
        ";
        if ($row_count ==0)
        {
            echo "<h2 class='text-danger'> No any users are Registered </h2> ";
        }
        else{
            $num=0;
            while($result = mysqli_fetch_assoc($run))
            {
                $User_id=$result['User_Id'];
                $user_Name=$result['user_Name'];
                $User_Email=$result['User_Email'];                
                $User_Email=$result['User_Email'];                
                $user_pass=$result['user_pass'];                
                $user_Ip=$result['user_Ip'];                
                $user_address=$result['user_address'];
                $user_num=$result['user_num'];                
                // $ord_status=$result['ord_status'];
                $num++;
                echo"
                <tbody>
            <tr class='text-center'>
                <td>$num</td>                
                <td> $User_id</td>
                <td> $user_Name</td>
                <td> $User_Email</td>                
                <td > $user_address</td>                
                <td > $user_num</td>                
                <td class='bg-danger'><a href='index.php?del_users=$User_id'><i class='fa-solid fa-trash text-light '></a></td>
            </tr>
        </tbody>
        ";
            }
        }

        ?>
        

        
    





</table>