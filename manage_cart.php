<?php

session_start();
$action=$_POST['action'];

if($action=='add')
{
$id = $_POST['id'];	
$qty = $_POST['qty'];	
	   
	    foreach ($_SESSION["products"] as $select => &$val) 
	    {
			if($val['id'] == $id)
			{                           ////....IF PRODUCT ALRDY EXISTS...////
				$val['qty']+=$qty;
				$add='no';
			}
		
	    }
	    if(isset($add))
		{
			return true;
		}
		else
		{                            ////....IF PRODUCT IS NEW...////
	        $book=array(
			'id'=>$id,
			'qty'=>$qty,    
	        );
	       $_SESSION['products'][]=$book;
		}
}

if($action=='del')
{
	foreach ($_SESSION["products"] as $select => $val) 
	{
		if($val['id'] == $_POST['id'])
		{
			unset($_SESSION['products'][$select]);
			echo 1;
		}
		
	}

}

if($action=='edit')
{
	foreach ($_SESSION["products"] as $select => &$val) 
	{
		if($val['id'] == $_POST['id'])
		{
			$val['qty']=$_POST['qty'];
			echo 1;
		}
		
	}

}

if($action=='empty')
{
	unset($_SESSION['products']);
	unset($_SESSION['total']);
	unset($_SESSION['discount']);
   
}
/*
foreach( $_SESSION['products'] as $data )
{  
    echo 'id: ' . $data['id'];
    echo 'qty: ' . $data['qty'].'<br>';
}
/*session_start();
require('db.php');
$sql= "select * from products where id=".$_POST['id'] ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

$_SESSION['pro_id']=$_POST['id'];
$_SESSION['qty']=$_POST['qty'];
$_SESSION['name']=$row['name'];
$_SESSION['image']=$row['image'];
$_SESSION['price']=$row['sales_price'];

*/


?>