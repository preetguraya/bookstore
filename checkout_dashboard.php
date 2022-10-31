<?php
session_start();
require('db.php');
$action = $_POST['action'];
     

     /****************......APPLY COUPON .....*****************/
if($action=='check_code') 
{	
	$code=$_POST['code'];
	$sql="select * from coupon where code='$code' and status=1";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if (mysqli_num_rows($result)>0){
		echo json_encode(array(
					"statusCode"=>1,
					"discount"=>$row['discount']
				));
		$_SESSION['discount']=$row['discount'];
		$_SESSION['code']=$row['code'];
		$query="update coupon set status=0 where code='$code' and status=1"; 
		mysqli_query($con,$query);
	}
	else{
		echo json_encode(array("statusCode"=>0));
    }

}

 /****************......REMOVE COUPON .....*****************/
if($action=='remove_code')
{
	$code=$_POST['code'];
	$sql="update coupon set status=1 where code='$code' and status=0";
	if(mysqli_query($con,$sql))
	{
		echo 1;
		unset($_SESSION['discount']);
		unset($_SESSION['code']);
	}
	
}	


 /****************......PLACE ORDER .....*****************/
if($action=='order')
{
	require('order_id.php');
	$query="select * from register_user where ID=".$_SESSION['id'];
	$i=mysqli_query($con,$query);
	$row=mysqli_fetch_array($i);
	$email=$row['Email'];
   if(isset($_SESSION['code']))
    {
	   $coupon=1;
	   $code=$_SESSION['code'];
	   $discount=$_SESSION['discount'];
	   $total=$_SESSION['total'] - $_SESSION['discount'];
	   
    } 
	   else
	{  
        $coupon=0;
        $code='null';
        $discount='';
		$total=$_SESSION['total'];
	}
  //$_SESSION['order_id']='BOOK';//
	$sub=$_SESSION['total'];
	   $id=$_SESSION['id'];
	$b_name=$_POST['b_name'];
	$b_phone=$_POST['b_phone'];
	$b_street=$_POST['b_street'];
	$b_area=$_POST['b_area'];
	$b_city=$_POST['b_city'];
	$b_state=$_POST['b_state'];
	$b_pincode=$_POST['b_pincode'];
	$s_name=$_POST['s_name'];
	$s_phone=$_POST['s_phone'];
	$s_street=$_POST['s_street'];
	$s_area=$_POST['s_area'];
	$s_city=$_POST['s_city'];
	$s_state=$_POST['s_state'];
	$s_pincode=$_POST['s_pincode'];
	
	$sql="insert into orders(order_id,sub_total,coupon_applied,coupon_code,discount,total,customer_id,email,b_name,b_phone,b_street,b_area,b_city,b_state,b_pincode,s_name,s_phone,s_street,s_area,s_city,s_state,s_pincode)
	      values('$zippy_order_id','$sub','$coupon','$code','$discount','$total','$id','$email','$b_name','$b_phone','$b_street','$b_area','$b_city','$b_state','$b_pincode','$s_name','$s_phone','$s_street','$s_area','$s_city','$s_state','$s_pincode')";
	if(mysqli_query($con,$sql))
	{
        foreach($_SESSION['products'] as $data)
		{	
			$s= "select * from products where id=". $data['id'];
			$res=mysqli_query($con,$s);
			$roww=mysqli_fetch_array($res);
            $qty=$data['qty'];			
			$pro_id=$roww{'id'};
			$price=$roww['sales_price'];
			$total=$price * $qty;
		    $sq="insert into order_items(order_id,product_id,quantity,price,total)
		     values('$zippy_order_id','$pro_id','$qty','$price','$total')";
			 mysqli_query($con,$sq);
		}		
		unset($_SESSION['discount']);
		unset($_SESSION['code']);
		unset($_SESSION['total']);
		unset($_SESSION['products']);
		echo 1;					
	
	}
	else
	{   echo 0; }
	
}	
	
?>