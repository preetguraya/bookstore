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
		
		
		<!-- ********* **********TABLE AREA START ******* *********   -->	
<div class="cart-main-area section-padding--lg bg--white">
      <!-- -------------------Message area------------ -------->	
<div class="text-center">	
<div id="success" class="btn btn-success w-50 mb-3" style="display:none;"> Message
</div>
<div id="error" class="btn btn-danger w-50 mb-3" style="display:none;"> Message
</div>
</div>
     <!-------------------End Message Area--------------------->
            <div class="container" id="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                                      
                            <div class="table-content wnro__table table-responsive">
                                <table class="table-hover">
                                    <thead>
                                        <tr class="title-top">
                                            <th class="">Order ID</th>
                                            <th class="">Dated</th>
                                            <th class="">Amount</th>
                                            <th class="">Discount</th>
                                            <th class="pr-4">Net Amount</th>
                                            <th class="pr-4">Details</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
require('db.php');
$sql="select * from orders where customer_id=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_assoc($result)) 
	{ 


?>									
									    <tr>
                                            <td class=""><?php echo $row['order_id']; ?></td>
                                            <td class=""><?php echo $row['order_date']; ?></td>
                                            <td class="">$<?php echo $row['sub_total']; ?></td>
                                            <td class="">$<?php echo $row['discount']; ?></td>
                                            <td class="product-subtotal">$<?php echo $row['total']; ?></td>
                                            <td>
											 <a href="javascript:void(0)" class= "btn btn-primary btn-sm"  
											 onclick="view(<?php echo $row['id']; ?>)">View Details</a> 
										    </td>           
                                        </tr>
										 										
<?php 
    }
}
else
{
echo "<div class='text-center my-5 py-5'>
      <div>No orders by you!</div>
      <div class='btn btn-light mt-2'><a href='books1.php'>Get back to shopping!</a></div>
       
 	   </div>";	
}
 ?>									   
                                    </tbody>
                                </table>
                            </div>
                        
                       
                    </div>
                </div>
                
            </div>  
        </div>
	<!-- ********* **********TABLE AREA END ******* *********   -->			
		
			
<script>
$('.alert').hide();
$('#content').hide();
/****************....VIEW DETAILS FORM.....*****************/
function view(id){
$('#showTable').hide();	
$('#content').show();	
    $.ajax({
        type: 'POST',
       
        url: 'order_action.php',
        data: {id:id},
        success:function(data){
		$('#container').html(data);		
		}	
    });
}

</script>		
	
		
<?php
require "footer.php";
?>	
		