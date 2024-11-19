<?php
// php connection
include('../includes/connect.php');
include('../function/function.php');

if(isset($_GET['user_Id']))
{
    $user_Id =$_GET['user_Id'];   
}



//getting all items from cart
$user_IP = getIPAddress();
$total_price=0;
$cart_price="Select * from `cart` where IP_address='$user_IP'";
$result=mysqli_query($con,$cart_price);
$bill_nums = mt_rand();
$status='Pending';
$count_pro=mysqli_num_rows($result);
while($unit_price=mysqli_fetch_array($result))
{
    $pro_id=$unit_price['pro_Id'];
    $select_pro="Select * from `products` where pro_Id='$pro_id' ";
    $run_price=mysqli_query($con,$select_pro);
    while($pro_unit_price=mysqli_fetch_array($run_price))
    {
        $pro_price=array($pro_unit_price['pro_Price']);
        $pro_prices=array_sum($pro_price);
        $total_price+=$pro_prices;
    }
}

//quantity 
$get_cart = "Select * from `cart`";
$run_cart = mysqli_query($con, $get_cart);
$item_qty=mysqli_fetch_array($run_cart);
$qty=$item_qty['Qty'];
if($qty==0)
{
    $qty=1;
    $amounts=$total_price;

}
else{
    $qty=$qty;
    $amounts=$qty*$total_price;
}

// inserting orders

$insert_order="Insert into `order_tbl` (User_Id,amount,bill_num,total_pro,ord_date,ord_status)
values ($user_Id,$amounts,$bill_nums,$count_pro,NOW(),'$status')";
$run_order = mysqli_query($con,$insert_order);
if($run_order)
{
    echo "<script>alert('Order submitted sucessfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}


// pending orders
$insert_pending="Insert into `pending_tbl` (User_Id,bill_num,pro_Id,Qty,ord_status)
values ($user_Id,$bill_nums,$pro_id,$qty,'$status')";
$run_pending = mysqli_query($con,$insert_pending);

// deleteing products from carts
$delete_product="Delete From `cart` Where IP_address='$user_IP'";
$run_delete_product = mysqli_query($con,$delete_product);


?>