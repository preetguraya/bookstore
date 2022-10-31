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
		
		<!-- Start New Products Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
<?php 
$sql="select * from products order BY id desc LIMIT 8" ;
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)) 
			{


?>					
					
					<!-- Start Single Product -->
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href=" product.php?id=<?php echo $row['id'];?>">
								<img src="../myadmin/uploads/<?php echo $row['image'];?>"
								 width="200px" height="300px" alt="product image">
								</a>
								<ul class="prize position__right__bottom d-flex">
								  <li>$<?php echo $row["sales_price"];?></li>				  
								  <li class="old_prize">$<?php echo $row["regular_price"];?></li>				  
								</ul>
								<div class="hot__box">
									<span class="hot-label">NEW</span>
								</div>
							</div>
							<div class="mt-3 text-center">
								<a href="product.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
							</div>
							<div class="my-1 text-center">
								<a onclick="addcart(<?php echo $row['id']; ?>)" href="javascript:void(0);" class="btn-dark px-4" style="padding:6px;">
								<i class="bi bi-shopping-cart-full mr-2"></i>
								Add to Cart</a>				
							</div>
						</div>
					</div>
					<!-- End Single Product -->
	<?php   } ?>					
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- End New Products Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2><span id="congo">Stay With Us</span></h2>
						</div>
						<div  id="subscribe" class="newsletter__block text-center">
							<p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
							<form action="javascript:void(0);">
								<div class="newsletter__box">
									<input type="email" id="mail" placeholder="Enter your e-mail" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>">
									<button onclick="subscribe()">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		
		<!-- Start All Products Area -->
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab" onclick="location.reload()">ALL</a>
                            <?php
												
                                                
												$sql="select * from categories where Parent_ID=0";
												$result=mysqli_query($con,$sql);

												 while($row = mysqli_fetch_assoc($result)) 
											{ ?>
							 
											
											<a href="#<?php echo $row['Name'] ;?>"  class="nav-item nav-link" data-toggle="tab" role="tab">									
											<?php echo $row['Name']; ?>
											</a>           
											<?php } ?>
                        </div>
					</div>
				</div>
			
				<div class="tab__container mt--60">
				
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active mx-2" id="nav-all" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
<?php 

$sql="select * from products";
$result=mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) 
			{
				
?>
					<div class="single__product">

					
						<!-- Start Single Product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product product__style--3">
								<div class="product__thumb">
									<a class="first__img" href=" product.php?id=<?php echo $row['id'];?>">
									<img src="../myadmin/uploads/<?php echo $row['image'];?>"
									 width="200px" height="300px" alt="product image">
									</a>
									<ul class="prize position__right__bottom d-flex">
									  <li>$<?php echo $row["sales_price"];?></li>				  
									  <li class="old_prize">$<?php echo $row["regular_price"];?></li>				  
									</ul>
									<div class="hot__box">
										<span class="hot-label"><?php echo $row["description"];?></span>
									</div>
								</div>
								<div class="mt-3 text-center">
									<a href="product.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
								</div>
								<div class="my-1 text-center">
									<a onclick="addcart(<?php echo $row['id']; ?>)" href="javascript:void(0);" class="btn-dark px-4" style="padding:6px;">
									<i class="bi bi-shopping-cart-full mr-2"></i>
									Add to Cart</a>				
								</div>
							</div>
						</div>
						<!-- End Single Product -->	
	
					
					</div>
					
	<?php   } ?>		
							
						</div>
					</div>
					<!-- End Single Tab Content -->
<?php 
$ss="select * from categories where Parent_ID=0";
$record=mysqli_query($con,$ss);

while($ro = mysqli_fetch_assoc($record)) 
			{

?>
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade" id="<?php echo $ro['Name'];?>" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
<?php 

$sql="select * from products where cat_id=".$ro['ID'];
$result=mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) 
			{
				
?>
					<div class="single__product">

					
						<!-- Start Single Product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product product__style--3">
								<div class="product__thumb">
									<a class="first__img" href=" product.php?id=<?php echo $row['id'];?>">
									<img src="../myadmin/uploads/<?php echo $row['image'];?>"
									 width="200px" height="300px" alt="product image">
									</a>
									<ul class="prize position__right__bottom d-flex">
									  <li>$<?php echo $row["sales_price"];?></li>				  
									  <li class="old_prize">$<?php echo $row["regular_price"];?></li>				  
									</ul>
									<div class="hot__box">
										<span class="hot-label"><?php echo $row["description"];?></span>
									</div>
								</div>
								<div class="mt-3 text-center">
									<a href="product.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
								</div>
								<div class="my-1 text-center">
									<a onclick="addcart(<?php echo $row['id']; ?>)" href="javascript:void(0);" class="btn-dark px-4" style="padding:6px;">
									<i class="bi bi-shopping-cart-full mr-2"></i>
									Add to Cart</a>				
								</div>
							</div>
						</div>
						<!-- End Single Product -->	
	
					
					</div>
					
	<?php   } ?>		
							
						</div>
					</div>
					<!-- End Single Tab Content -->
<?php   } ?>
				</div>
			</div>
		</section>
		<!-- End All Products Area -->
		
		
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Our <span class="color--theme">Blog</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
        					
<?php	
				
$sql1="select * from blog  where status=1 order by id desc limit 3";
$record1=mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_assoc($record1))
        {			
?>					
				
				
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="blog-details.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['title'];?></a></h3>
								<p><?php echo substr($row1['description'],0,149);?></p>
								<div class="post__time">
									<span class="day"><?php echo $row1['modified_at'];?></span>
									<div class="post-meta">
										<ul>
											<li><a href="#"><i class="bi bi-love"></i>72</a></li>
											<li><a href="#"><i class="bi bi-chat-bubble"></i>27</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php  } ?>   					
					
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
		
		
	<!----- Best Sale Area ------>
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Best <span class="color--theme">Seller</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				
			
				<div class="tab__container mt--60">
				
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active mx-2" id="nav-all" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
<?php 

$sql1="select name,regular_price,sales_price, price,total,image,product_id, sum(quantity) as totalquantity
from order_items  left join products on products.id=order_items.product_id 
group by product_id       
ORDER BY SUM(Quantity) DESC limit 6";    //.....CONTINUE BESTSELLER..........//
$result1=mysqli_query($con,$sql1);

while($row2 = mysqli_fetch_assoc($result1)) 
			{
			
?>
					<div class="single__product">

					
						<!-- Start Single Product -->
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product product__style--3">
								<div class="product__thumb">
									<a class="first__img" href=" product.php?id=<?php echo $row2['product_id'];?>">
									<img src="../myadmin/uploads/<?php echo $row2['image'];?>"
									 width="200px" height="300px" alt="product image">
									</a>
									<ul class="prize position__right__bottom d-flex">
									  <li>$<?php echo $row2["sales_price"];?></li>				  
									  <li class="old_prize">$<?php echo $row2["regular_price"];?></li>				  
									</ul>
									<div class="hot__box">
										<span class="hot-label">BEST SELLER</span>
									</div>
								</div>
								<div class="mt-3 text-center">
									<a href="product.php?id=<?php echo $row2['product_id'];?>"><?php echo $row2['name'];?></a>
								</div>
								<div class="my-1 text-center">
									<a onclick="addcart(<?php echo $row2['product_id']; ?>)" href="javascript:void(0);" class="btn-dark px-4" style="padding:6px;">
									<i class="bi bi-shopping-cart-full mr-2"></i>
									Add to Cart</a>				
								</div>
							</div>
						</div>
						<!-- End Single Product -->	
	
					
					</div>
					
			<?php   } ?>		
							
						</div>
					</div>


				</div>
			</div>
		</section>
	<!------ End Best Sale Area---- -->
<script>
function addcart(id)
{
	$.ajax({
	url: "manage_cart.php",
	type: "POST",
	data:{action:'add',qty:1,id:id}
	}).done(function(data){
	location.reload();
	})
		
}
function subscribe()
{
var email=$('#mail').val();	
	$.ajax({
	url: "books_dashboard.php",
	type: "POST",
	data:{action_type:'subscribe',email:email},
	success:function(data){
		if(data==1)
		{
			$('#congo').html('Congratulations!');
			$('#subscribe').html('You have been successfully subscribed!!');
		}
		else
		{
			alert(data);
		}
	}
	});
		
}
</script>		
		
		
<?php
require "footer.php";
?>	