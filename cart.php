<?php
session_start();

if( !isset($_SESSION['id']))
{
require "header.php";       //....Without login...//
}
else
{
require "header2.php";      //....User Logged in...// 	
}
/////////////////////////////////////////////////////////

?>  

<!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Buy <span>your </span></h2>
		            				<h2>favourite <span>Book </span></h2>
		            				<h2>from <span>Here </span></h2>
				                   	<a class="shopbtn" href="books1.php">shop now</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide --> 	
        </div>
        <!-- End Slider area -->

<?php if(!isset($_SESSION['products']) || count($_SESSION['products']) == 0 ) 
      {	echo "<div class='text-center my-5 py-5'>
      <div>No items in your cart!</div>
      <div class='btn btn-light mt-2'><a href='books1.php'>Get back to shopping!</a></div>
       
 	   </div>";	  }
      else
	  {
?>
<div class="cart-main-area section-padding--lg bg--white">
      <!-- -------------------Message area------------ -------->	
<div class="text-center">	
<div id="success" class="btn btn-success w-50 mb-3" style="display:none;"> Message
</div>
<div id="error" class="btn btn-danger w-50 mb-3" style="display:none;"> Message
</div>
</div>
     <!-------------------End Message Area--------------------->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									require('db.php');
									$_SESSION['total']=0;	
									foreach($_SESSION['products'] as $data)
									{
										
									$sql= "select * from products where id=". $data['id'];
									
									$result=mysqli_query($con,$sql);
									$row=mysqli_fetch_array($result);	
									
									?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="product.php?id=<?php echo $row['id']; ?>"><img width="100px" height="80px" src="../myadmin/uploads/<?php echo $row['image']; ?>" alt="product img"></a></td>
                                            <td class="product-name"><a href="product.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                                            <td class="product-price"><span class="amount">$<?php echo $row['sales_price']; ?></span></td>
                                            <td class="product-quantity">
											<input min="1" type="number" onchange="edit(<?php echo $row['id']; ?>,$(this).val())" 
											class="quantity" value="<?php echo $data['qty'] ; ?>">
											</td>
                                            <td class="product-subtotal">$<?php echo $row['sales_price']*$data['qty'] ;?></td>
                                            <td> <span class="btn btn-danger btn-lg" onclick="del(<?php echo $row['id']; ?>)">
                                               <i class="fa fa-trash"></i> 
											    </span>
											</td>
                                        </tr>
										 <?php $_SESSION['total']=$_SESSION['total'] + $row['sales_price']*$data['qty']; ?>
										
									<?php } ?>   
                                    </tbody>
                                </table>
                            </div>
                        </form> 
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li id="code"><a href="javascript:void(0);" onclick="code()">Coupon Code</a></li>
                                <li id="apply" ><a href="javascript:void(0);" onclick="applycode()">Apply Code</a></li>
                                <li id="remove" style="display:none;"><a href="javascript:void(0);" onclick="removecode()">Remove Code</a></li>
                                <li><a href="javascript:void(0);" onclick="empty()">Empty Cart</a></li>
                                <li><a href="checkout.php">Check Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                             <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>Discount</li>
                                </ul>
                             <ul class="cart__total__tk">
                                    <li>$<span id="sub"><?php echo $_SESSION['total'] ; ?></span></li>
                                    <li>$<span id="discount">
									<?php if(isset($_SESSION['discount'])){
									echo $_SESSION['discount']; }
                                    else{ echo 0; } ?>
									</span></li> 
                                </ul>								
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>$<span id="total">
								<?php if(isset($_SESSION['discount'])){
									echo $_SESSION['total'] - $_SESSION['discount'];}
                                    else{ echo $_SESSION['total']; } ?>
								</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
<?php } ?>
<script>
////........  DELETE PRODUCT .........////
function del(del_id){
		$.ajax({
		url: "manage_cart.php",
		type: "POST",
		data:{action:'del',id:del_id},
		success:function(response){
		    if(response==1)
			{
				location='cart.php';
			}				
			else{ alert('Error');}
			
		}
		});
}
/////.......EDIT QUANTITY.......//////
function edit(edit_id,qty){


	    $.ajax({
		url: "manage_cart.php",
		type: "POST",
		data:{action:'edit',id:edit_id,qty:qty},
		success:function(response){
		    if(response==1)
			{
				setTimeout(function(){
				  location='cart.php';},2000);
			}				
			else{ alert('Error');}
			
		}
		});
	

}

/////......EMPTY CART.......//////
function empty(){
$.ajax({
		url: "manage_cart.php",
		type: "POST",
		data:{action:'empty'},
		success:function(response){
		   	  location='cart.php';
			
		}
		});
}

function code(){
$('#code').html('<input class="py-3 pl-2 border-0" id="demo" placeholder="Enter Code">');		
}

/////......APPLY COUPON CODE.......//////
function applycode(){
var code=$('#demo').val();


	
if(code!='')
{
			$.ajax({
					type: 'POST',
					url: 'checkout_dashboard.php',
					data:{action:'check_code',code:code},
					success: function(response){
						var response = JSON.parse(response);
                    	if(response.statusCode==1)
						{		
                                $('#discount').html(response.discount);					
                                $('#total').html(<?php echo $_SESSION['total'];?> - response.discount);					
							    $('#remove').show();
							    $('#apply').hide();
                                $('#demo').attr('readonly',true);	
                                $('#error').hide(); 								
                                $('#success').show(); 								
								$('#success').html("Promocode applied successfully !");	
						}
						else if(response.statusCode==0)
						{
						 $('#success').hide(); 								
						 $('#error').show(); 								
						 $('#error').html("Invalid promocode!");	
						}
					}
			});
}
else
{
	
	$('#success').hide(); 								
	$('#error').show(); 								
    $('#error').html("Promocode can't be blank!");	
}

}


/////......ReMOVE COUPON CODE.......//////
function removecode(){
var code=$('#demo').val();
	
			$.ajax({
					type: 'POST',
					url: 'checkout_dashboard.php',
					data:{action:'remove_code',code:code},
					success: function(response){
						
                    	if(response==1)
						{
							    location.reload();	
								$('#error').hide(); 								
                                $('#success').show(); 								
								$('#success').html("Promocode removed successfully !");	
						}
						else
						{
						 $('#success').hide(); 								
						 $('#error').show(); 								
						 $('#error').html("Error!");
						}
					}
			});

}
</script>
<?php
require "footer.php";
?>			
	