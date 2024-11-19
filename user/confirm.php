<?php
// php connection

include('../includes/connect.php'); 
session_start();
if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $select_data= "Select *from `order_tbl` where Ord_Id=$order_id ";
    $result_data = mysqli_query($con,$select_data);
    $row_fettching = mysqli_fetch_assoc($result_data);
    $bill_numm = $row_fettching['bill_num'];
    $amountt =  $row_fettching['amount'];
}

if(isset($_POST['confirm_pay']))
{
    $billNum = $_POST['bill_num'];
    $amt = $_POST['amount'];
    $pay_mod = $_POST['pay_through'];
    $insert_query="Insert into `payment` (Ord_Id,bill_num,amount,pay_mode,date) 
    values ($order_id,$billNum,$amt,'$pay_mod',NOW())";
    $results=mysqli_query($con,$insert_query);
    if($results){
        echo "<script>alert('Payment Confirmed Successfully!');</script>";
        echo "<script>window.open('profile.php','_self');</script>";
    }
    $update_oreders ="Update `order_tbl` set ord_status='complete' where Ord_Id=$order_id";
    $results_ord=mysqli_query($con,$update_oreders);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping</title>
    <!-- Bootsrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link --> 
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body class="bg-dark">
    <h2 class="text-center bg-secondary text-light p-2 my-5">Confirm Your Payment</h2>
    <div class="container my-5 w-50 ">
        <form action="" method="post">
            <div class="form-outline my-4  text-light">
                <label for="bill_num">Bill Number:</label>
                <input type="text" class="form-control m-auto text-center" name="bill_num" 
                value = "<?php echo $bill_numm ?>" readonly>
            </div>
            <div class="form-outline my-4 text-light">
            <label for="amount">Amount in Rs.:</label>
                <input type="text" class="form-control m-auto text-center" name="amount" value = "<?php echo  $amountt ?>" readonly>
            </div>

            <div class="form-outline my-4 text-light f">
            <label for="amount">Pay Through:</label>
                <select name="pay_through" id="selection" class="form-select" required>
                    <option disabled selected value >------------------------------Select Payment Option------------------------------</option>                    
                    <option href="../khalti/pay.php?user_Id=<?php echo $user_id?>" target='_blank' >Khalti</option>
                    <option >Cash On Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-light ">                           
                <input type="submit" value="Confirm Payment"class="btn btn-warning form-control m-auto text-center" name="confirm_pay">
            </div>
            <div class="form-outline my-4 text-light ">                           
                <a href="profile.php?My_order">
                    <input type="button" value="Cancle"class="btn btn-warning form-control m-auto text-center" name="cancel">
                </a>
                
            </div>
            



        </form>

    </div>
    
</body>
</html>