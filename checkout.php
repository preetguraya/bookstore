<?php
session_start();
if( !isset($_SESSION['id']))
{
require 'my-account.php';      //....Without login...//
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
<div class="container" id="container">		
<div class="row mt--60">
		
 <div class="col-lg-9 col-12">		
 <div class="my__account__wrapper bg--gray">
	
	
	<form action="#">
		<div class="account__form">
	<div class="row">
	    <div class="col-sm-4 col-12 pt-4">
		<h4 style="color:#e37868;" class="pb-4">Billing Address</h4>
			<div class="input__box">
				<label>Full Name<span>*</span></label>
				 <input type="text" id="id1" class="form-control" placeholder="John Doe" required="">
			</div>
			<div class="input__box">
				<label>Mobile No.<span>*</span></label>
				 <input type="tel" id="id2" class="form-control" placeholder="8989886677" required>
			</div>
            <div class="input__box">
				<label>Pincode<span>*</span></label>
				 <input type="text" id="id3" class="form-control" placeholder="10001" required>
			</div>
            <div class="input__box">
				<label>Flat, House no. <span>*</span></label>
				 <input type="text" id="id4" class="form-control" placeholder="542 W. 15th Street" required>
			</div>
            <div class="input__box">
				<label>Area,Colony,Village<span>*</span></label>
				 <input type="text" id="id5" class="form-control" placeholder="Sector-11" required>
			</div>	
            <div class="input__box">
				<label>Town/City<span>*</span></label>
				 <input type="text" id="id6" class="form-control" placeholder="Chandigarh" required>
			</div>
            <div class="input__box">
				<label>State<span>*</span></label>
				 <input type="text" id="id7" class="form-control" placeholder="Punjab" required>
			</div>
          
         </div>
		 <div class="col-sm-4 col-12 pt-4">
		<h4 style="color:#e37868;" class="pb-4">Shipping Address</h4>
			<div class="input__box">
				<label>Full Name<span>*</span></label>
				 <input type="text" id="id11" class="form-control" placeholder="John Doe" required="">
			</div>
			<div class="input__box">
				<label>Mobile No.<span>*</span></label>
				 <input type="tel" id="id12" class="form-control" placeholder="8989886677" required>
			</div>
            <div class="input__box">
				<label>Pincode<span>*</span></label>
				 <input type="text" id="id13" class="form-control" placeholder="10001" required>
			</div>
            <div class="input__box">
				<label>Flat, House no. <span>*</span></label>
				 <input type="text" id="id14" class="form-control" placeholder="542 W. 15th Street" required>
			</div>
            <div class="input__box">
				<label>Area,Colony,Village<span>*</span></label>
				 <input type="text" id="id15" class="form-control" placeholder="Sector-11" required>
			</div>	
            <div class="input__box">
				<label>Town/City<span>*</span></label>
				 <input type="text" id="id16" class="form-control" placeholder="Chandigarh" required>
			</div>
            <div class="input__box">
				<label>State<span>*</span></label>
				 <input type="text" id="id17" class="form-control" placeholder="Punjab" required>
			</div>
          
         </div>
		 <div class="col-sm-4 col-12 pt-4">
			<h4 style="color:#e37868;" class="pb-4">Payment</h4>
			<label for="fname">Accepted Cards</label>
            <div class="cards mb-4">	
             <i class="fa fa-cc-visa mx-1" style="font-size: 25px;color:navy;"></i>
              <i class="fa fa-cc-amex mx-1" style="font-size: 25px;color:blue;"></i>
              <i class="fa fa-cc-mastercard mx-1" style="font-size: 25px;color:red;"></i>
              <i class="fa fa-cc-discover mx-1" style="font-size: 25px;color:orange;"></i>
            </div>			
			<div class="input__box">
				<label>Name on Card<span>*</span></label>
				 <input type="text" id="id21" class="form-control" placeholder="John More Doe" required="">
			</div>
			<div class="input__box">
				<label>Credit card number<span>*</span></label>
				 <input type="text" id="id22" class="form-control" placeholder="1111-2222-3333-4444" required>
			</div>
            <div class="input__box">
				<label>Exp Month<span>*</span></label>
				 <input type="text" id="id23" class="form-control" placeholder="September" required>
			</div>
            <div class="input__box">
				<label>Exp Year<span>*</span></label>
				 <input type="text" id="id24" class="form-control" placeholder="2018" required>
			</div>
            <div class="input__box">
				<label>CVV<span>*</span></label>
				 <input type="text" id="id25" class="form-control" placeholder="352" required>
			</div>	
          
         </div>
    </div>	
	        <div>	                		
				 <input type="checkbox" name="ship" id="check" value="same" checked>
				 Shipping address same as Billing	
			</div>
            <div class="form__btn text-center my-4">
				<button type="button" id="submit">Continue to Checkout</button>		
			</div>	
		</div>
	</form>
	
</div>			
  </div>		
  <div class="col-lg-3 col-12">		
    <div class="my__account__wrapper"> 
	
	<div class="cartbox__total__area mt-5">
	<div class="cart__total__amount">
	<span>Cart</span>
	<span><i class="fa fa-shopping-cart"></i>
	    <?php if (isset($_SESSION['products'])) 
			{ echo count($_SESSION['products']); }
			else
			{echo 0;}?>
	</span>
	
	</div>
                            <div class="cartbox-total d-flex justify-content-between">
							
							
                             <ul class="cart__total__list">
							
							 <?php
									require('db.php');
										
									foreach($_SESSION['products'] as $data)
									{
										
									$sql= "select * from products where id=". $data['id'];
									
									$result=mysqli_query($con,$sql);
									$row=mysqli_fetch_array($result);	
									echo '<li>'.$row['name'].' ('.$data['qty'].')</li>';
									}
									?>                      
                              </ul>
                              <ul class="cart__total__tk">
                              <?php
									require('db.php');
										
									foreach($_SESSION['products'] as $data)
									{
										
									$sql= "select * from products where id=". $data['id'];
									
									$result=mysqli_query($con,$sql);
									$row=mysqli_fetch_array($result);	
									echo '<li>$'.$row['sales_price']*$data['qty'].'</li>';
									}
									?>       
                              </ul>								
                            </div>
                        
    </div>			
  </div>
  <div class="my__account__wrapper">  
	<div class="cartbox__total__area mt-5">
                            <div class="cartbox-total d-flex justify-content-between">
                             <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>Discount</li>
                                    <li>Delivery Charges</li>
                                </ul>
                             <ul class="cart__total__tk">
                                    <li>$<span id="sub">
									<?php echo $_SESSION['total'] ; ?>	
									</span></li>
									 <li>$<span id="discount">
									<?php if(isset($_SESSION['discount'])){
									echo $_SESSION['discount']; }
                                    else{ echo 0; } ?>
									</span></li> 
                                    <li>$<span id="delivery">0</span></li> 
                                </ul>								
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>$<span id="total">
								
									<?php if(isset($_SESSION['discount'])){
									echo $_SESSION['total'] - $_SESSION['discount'];}
                                    else{ echo $_SESSION['total']; }		?>
									
								</span></span>
                            </div>
    </div>			
  </div>			
  </div>					
		
</div>		
</div>		
<script>
$('#submit').click(function(){

var b_name=$('#id1').val();
var b_phone=$('#id2').val();
var b_pincode=$('#id3').val();
var b_street=$('#id4').val();
var b_area=$('#id5').val();
var b_city=$('#id6').val();
var b_state=$('#id7').val();

var cname=$('#id21').val();
var cno=$('#id22').val();
var month=$('#id23').val();
var year=$('#id24').val();
var cvv=$('#id25').val();
if($('#check').is(':checked'))            ////
{
    $('#id11').val( b_name    );
    $('#id12').val( b_phone   );
    $('#id13').val( b_pincode );    //..BILLING ADDRESS SAME AS SHIPPING..//
    $('#id14').val( b_street  );
    $('#id15').val( b_area    );
    $('#id16').val( b_city    );
    $('#id17').val( b_state   );          ////            
}                                        
var s_name=$('#id11').val();
var s_phone=$('#id12').val();
var s_pincode=$('#id13').val();
var s_street=$('#id14').val();
var s_area=$('#id15').val();
var s_city=$('#id16').val();
var s_state=$('#id17').val(); 

if( b_name=='' || b_phone=='' || b_pincode=='' || b_street=='' || b_area==''|| b_city==''|| b_state=='' || 
s_name=='' || s_phone=='' || s_pincode=='' || s_street=='' || s_area==''|| s_city==''|| s_state=='' ||
cname=='' || cno==''|| month=='' || year=='' || cvv=='' )
{
	alert('Fill all fields!');
}
else
{
	$.ajax({
		url: "checkout_dashboard.php",
		type: "POST",
		
		data:{action:'order',b_name:b_name,b_phone:b_phone,b_pincode:b_pincode,
		b_street:b_street,b_area:b_area,b_city:b_city,b_state:b_state,
		s_name:s_name,s_phone:s_phone,s_pincode:s_pincode,s_street:s_street,
		s_area:s_area,s_city:s_city,s_state:s_state},
		
		success:function(response){
		    if(response==1)
			{
				$('#container').html('<div class="text-center my-5 py-5"><div>Your order has been placed successfully!!</div></div>');
			}				
			else{ alert(response);}
			
		}
		});
		

}

});	
</script>	
<?php
require "footer.php";
?>	