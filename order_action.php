<?php
require('db.php');
if(!$con)
{echo "DB not connected"; die;}
else
{
$id = $_POST['id'];	
	$sql="select * from orders where id=".$id;	
	$result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);



    $output= '<div><span class="h3">Order Details</span><span class="pull-right"><button class="btn btn-default">
                                   <a href="myorders.php"> Back</a></button></span></div>
	<div class="panel-body p20 mt-4" id="invoice-item">                   
                    <div class="row pb-4 border-bottom" id="invoice-info">
                        <div class="col-md-4 border-right mb-3">
                            <div class="panel panel-alt">
                                <div class="panel-heading pb-3">
                                    <span class="card-title font-weight-bold"> Bill To: </span>

                                    
                                </div>
                                <div class="panel-body">
                                    <b><div id="b_name">'.$row['b_name'].'</div></b>
                                    <div><b>Phone: </b><span id="b_phone">'.$row['b_phone'].'</span></div>
                                    <div><b>Email: </b><span id="email">'.$row['email'].'</span></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 border-right mb-3">
                            <div class="panel panel-alt">
                                <div class="panel-heading pb-3">
                                    <span class="card-title  font-weight-bold"> Ship To:</span>

                                </div>
                                <div class="panel-body">
                                   <b><div id="s_name">'.$row['s_name'].'</div></b>
								   <div><span id="s_area">'.$row['s_area'].'</span>,
                                    <span id="s_city">'.$row['s_city'].'</span></div>
									<div><span id="s_state">'.$row['s_state'].'</span>,
									<span id="s_pin">'.$row['s_pincode'].'</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 border-right">
                            <div class="panel panel-alt">
                                <div class="panel-heading pb-3 font-weight-bold">
                                    <span class="card-title"> Invoice Details: </span>

                                    <div class="panel-btns pull-right ml10"></div>
                                </div>
                                <div class="panel-body">
                                    <div><b>Order ID #:</b><span id="order_id">'.$row['order_id'].'</span></div>
                                    <div><b>Date:</b> <span class="date">'.$row['order_date'].'</span></div>
                                    <div><b>Delievered Date:</b> </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="row py-1" id="invoice-table">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th class="text-right pr10">Total</th>
                                </tr>
                                </thead>';
$query = "select * from order_items left join products on products.id=order_items.product_id where order_items.order_id='".$row['order_id']."'";																
$result1 = mysqli_query($con, $query);
while($row1 = mysqli_fetch_assoc($result1))
  {	 							
 	$output .=          '<tbody>
                            <tr>
                                   
                                    <td>'.$row1["name"].'</td>
                                  
                                    <td class="">'.$row1["quantity"].'</td>
                                    <td class="">$'.$row1["price"].'</td>
                                    <td class="text-right pr10">$'.$row1["total"].'</td>
                                </tr>
                                
                                </tbody>';

  }
	$output .=			'</table>
                        </div>
                    </div>
                    <div class="row" id="invoice-footer">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <table class="table" id="basic-invoice-result">
                                    <thead>
                                    <tr>
                                        <th>
                                            <b>Sub Total:</b>
                                        </th>
                                        <th>$<span id="sub">'.$row['sub_total'].'</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <b>Discount</b>
                                        </td>
                                        <td>$<span id="discount">'.$row['discount'].'</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Total</b>
                                        </td>
                                        <td>$<span id="total">'.$row['total'].'</span></td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>

                </div>';

	echo $output;
	
}
?>