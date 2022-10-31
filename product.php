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
if(isset($_GET['id']))
{$id = $_GET['id'];}
else{$id = 0;}
require('db.php');
    $s= "select * from products where id=$id";
    $record=mysqli_query($con,$s);		
	$row = mysqli_fetch_array($record);
		$id=$row['id']; 	
		$name=$row['name']; 	
		$sales_price=$row['sales_price']; 	
		$regular_price=$row['regular_price']; 	
		$description=$row['description']; 	
		$image=$row['image']; 	
		
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
				                   	<a class="shopbtn" href="#">shop now</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide --> 	
        </div>
        <!-- End Slider area -->
	  <!-- Start Shop Page -->
   <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Product Categories</h3>
        						<ul>
        							
        						<?php
												require('db.php');
												if(!$con)
												{echo "DB not connected"; die;}

												$sql="select * from categories where Parent_ID=0";
												$result=mysqli_query($con,$sql);

												 while($roww = mysqli_fetch_assoc($result)) 
											{
							                    $sq="select * from products where cat_id=". $roww['ID'];
												$res=mysqli_query($con,$sq);
												$total=mysqli_num_rows($res);       //*****getting no. of products of category********//
								 ?>
											<li><a href="books1.php?bookid=<?php echo $roww['ID']; ?>"> 
											       <?php echo $roww['Name']; ?>
										    <span> <?php echo '('.$total.')'; ?>
											</span></a></li>            
								<?php } ?>	
									
									
        						</ul>
        					</aside>
        					
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        						<img src="../myadmin/uploads/<?php echo $image; ?>" class="border-1" 
								style="width: 419.735px; height: 527px; left: 0.132743px; top: 0px;">	
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1> <?php echo $name; ?> </h1>
        								<div class="product-info-stock-sku d-flex">
        									<p>Availability:<span> In stock</span></p>
        									<p>SKU:<span> MH01</span></p>
        								</div>
        								<div class="product-reviews-summary d-flex">
        									<ul class="rating-summary d-flex">
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
    											<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
        									</ul>
        									<div class="reviews-actions d-flex">
        										<a href="#">(1 Review)</a>
        										<a href="#">Add Your Review</a>
        									</div>
        								</div>
										
        								<div class="pricebox">
											<span><b> $<?php echo $sales_price; ?> </b>
											<del class="ml-2"> $<?php echo $regular_price; ?></del>
											</span>
        								</div>
        								<div class="product-color-label">
        									<span>Color</span>
        									<div class="color__attribute d-flex">
        										<div class="swatch-option color" style="background: #000000 no-repeat center; background-size: initial;"></div>
        										<div class="swatch-option color" style="background: #8f8f8f no-repeat center; background-size: initial;"></div>
        									</div>
        								</div> 
        								<div class="box-tocart d-flex">
										<form class="product-form" action="javascript:void(0);">
        									<span>Qty</span>
        									<input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
											<input id="product_id" name="product_id" type="hidden" value="<?php echo $row['id']; ?>">
        									<div class="addtocart__actions">
        										<button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
        									</div>
											</form>
        								</div>
        								<div class="product-addto-links clearfix">
        									<a class="wishlist" href="#"></a>
        									<a class="compare" href="#"></a>
        									<a class="email" href="#"></a>
        								</div>
        								<div class="product__overview">
        									<?php echo $description;?>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
                     <div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
	                           
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<?php echo $description;?>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->

	                        </div>
        				</div>
						
        			</div>
        		</div>
			
			</div>
        </div>	
		 <!-- End Shop Page -->
<script>
$(".product-form").submit(function(){
var qty=$('#qty').val();
var id=$('#product_id').val();
var button_content = $(this).find('button[type=submit]');
button_content.html('Adding...');
$.ajax({
url: "manage_cart.php",
type: "POST",
data:{action:'add',qty:qty,id:id}
}).done(function(data){
location.reload();
})

});




</script>
<?php
require "footer.php";
?>			
		
		