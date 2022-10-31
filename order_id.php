<?php
require('db.php');
	$sqq="select substr(max(order_id),5) as mid from orders";	
	$ress = mysqli_query($con, $sqq);
    $rowww=mysqli_fetch_array($ress);
	$maxorder_id= $rowww['mid'];
	
	
	if ($maxorder_id>=99999 && $maxorder_id<999999)
  {
   $zippy_order_id="IM-".($maxorder_id+1);
  }
  else if ($maxorder_id>=9999 && $maxorder_id<99999)
  {
   $zippy_order_id="IM-0".($maxorder_id+1);
  }
  else if ($maxorder_id>=999 && $maxorder_id<9999)
  {
   $zippy_order_id="IM-00".($maxorder_id+1);
  }
  else if ($maxorder_id>=99 && $maxorder_id<999)
  {
   $zippy_order_id="IM-000".($maxorder_id+1);
  }
  else if ($maxorder_id>=9 && $maxorder_id<99)
  {
   $zippy_order_id="IM-0000".($maxorder_id+1);
  }
  else if ($maxorder_id<9)
  {
	  $zippy_order_id="IM-00000".($maxorder_id+1);
  }

 else
 {
 
  $zippy_order_id="IM-000001";
 }



?>