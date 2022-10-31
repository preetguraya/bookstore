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

												 while($row = mysqli_fetch_assoc($result)) 
											{
							                    $sq="select * from products where cat_id=". $row['ID'];
												$res=mysqli_query($con,$sq);
												$total=mysqli_num_rows($res);       //*****getting no. of products of category********//
								 ?>
											<li><a href="javascript:void(0);" onclick="subcat(<?php echo $row['ID']; ?>)"> 
											       <?php echo $row['Name']; ?>
										    <span> <?php echo '('.$total.')'; ?>
											</span></a></li>            
								<?php } ?>	
									
									
        						</ul>
        					</aside>
        					<aside class="wedget__categories pro--range">
        						<h3 class="wedget__title">Filter by price</h3>
        						<div class="content-shopby">
        						    <div class="price_filter s-filter clear">
        						        <form action="#" method="GET">
        						            <div id="slider-range"></div>
        						            <div class="slider__range--output">
        						                <div class="price__output--wrap">
        						                    <div class="price--output">
													<input type="hidden" id="hidden_min" value="10" />
                                                    <input type="hidden" id="hidden_max" value="500" />
        						                        <span>Price :</span><input type="text" id="amount" readonly="">
        						                    </div>
        						                    <div class="price--filter">
        						                        <a href="javascript:void(0);" onclick="price_filter()">Filter</a>
        						                    </div>
        						                </div>
        						            </div>
        						        </form>
        						    </div>
        						</div>
        					</aside>
        					
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
			                        <p>Showing <span id="count"></span> results</p>
			                        <div class="orderby__wrapper">
			                        	<span>Sort By</span>
			                        	<select id="select" class="shot__byselect" onchange="sort()">
			                        		<option value="0">Default sorting</option>
			                        		<option value="1">Category</option>
			                        		<option value="2">Price</option>                		
			                        	</select>
			                        </div>
		                        </div>
        					</div>
        				</div>
						<div class="tab__container">
						
						<!--************Grid view start**************-->
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row demo">
						<?php  
						if(isset($_GET['bookid']))
						{
						$bookid=$_GET['bookid'];
                        $query="select * from categories where Parent_ID=".$bookid;
						}
						else
						{$query="select * from categories where Parent_ID!=0";}
							$record=mysqli_query($con,$query);
                            while($roww = mysqli_fetch_assoc($record)) 
                            {
						 ?>
						
	        						<!-- Start single SUBCAT -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">									
											<a class="first__img" href="javascript:void(0);" onclick="product(<?php echo $roww['ID']; ?>)"> 
											<img src="../myadmin/uploads/<?php echo $roww['Image'];?>" 
											 width="200px" height="300px" alt="product"></a>	
										</div><br>
										<div class="text-center">
											<h5><a href="javascript:void(0);" onclick="product(<?php echo $roww['ID']; ?>)">
											<?php echo $roww['Name']; ?></a></h5>					
										</div>
		        					</div>
		        					<!-- End single SUBCAT -->
							<?php  } ?>	 	
	        					</div>
	        				</div>
							
						<!--***************LIST VIEW START******************-->
							<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
	        					<div class="list__view__wrapper" id="list">
	                            
	        					 	<!-- Start Single Product -->
	        						<div class="list__view mt--40">
	        							<div class="thumb">
	        								<a class="first__img" href="single-product.html"><img src="images/product/2.jpg" alt="product images"></a>
	        								<a class="second__img animation1" href="single-product.html"><img src="images/product/4.jpg" alt="product images"></a>
	        							</div>
	        							<div class="content">
	        								<h2><a href="javascript:void()">Blood In Water</a></h2>
	        								<ul class="rating d-flex">
	        									<li class="on"><i class="fa fa-star-o"></i></li>
	        									<li class="on"><i class="fa fa-star-o"></i></li>
	        									<li class="on"><i class="fa fa-star-o"></i></li>
	        									<li class="on"><i class="fa fa-star-o"></i></li>
	        									<li><i class="fa fa-star-o"></i></li>
	        									<li><i class="fa fa-star-o"></i></li>
	        								</ul>
	        								<ul class="prize__box">
	        									<li>$111.00</li>
	        									<li class="old__prize">$220.00</li>
	        								</ul>
	        								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
	        								<ul class="cart__action d-flex">
	        									<li class="cart"><a href="cart.html">Add to cart</a></li>
	        									<li class="wishlist"><a href="cart.html"></a></li>
	        									<li class="compare"><a href="cart.html"></a></li>
	        								</ul>

	        							</div>
	        						</div>
	        						<!-- End Single Product -->
	        						
	        					</div>
	        				</div>					
					<!--...........END LIST VIEW..................-->	
        				</div>					
        			</div>					
        		</div>
        	
			</div>
        </div>
		
		 <!-- End Shop Page -->
		 
		 
	 		
<script>

$(".nav-item").hide();
function subcat(id){
	 	
   $.ajax({
			url:'books_dashboard.php',
			type:'POST',	
			data:{action_type:'sub',id:id},
			success:function(response){	     
				$('.demo').html(response);	
          /*=========Number of products===================*/
			var count=$('.product__thumb').length;
			$('#count').text(count);
			$(".nav-item").hide();				
			}
	}); 	
}
function product(id)
{
    $.ajax({
			url:'books_dashboard.php',
			type:'POST',	
			dataType:'JSON',
			data:{action_type:'pro',id:id},
			success:function(response){	     
			alert(response.name)[0];
            /*=========Number of products===================*/
			var count=$('.product__thumb').length;
			$('#count').text(count);
			$(".nav-item").show();					
			}
	}); 
}
function price_filter()
{
var min = $('#hidden_min').val();
var max = $('#hidden_max').val();	
    $.ajax({
			url:'books_dashboard.php',
			type:'POST',	
			data:{action_type:'price',min:min,max:max},
			success:function(response){	     
				$('.demo').html(response);	
           /*=========Number of products===================*/
			var count=$('.product__thumb').length;
			$('#count').text(count);
			$(".nav-item").show();			
			}
	}); 
}

function sort()
{
var x=$('#select').val();
	if(x==0||x==1)
	{
		location='books.php';
	}
	else
	{
        $.ajax({
			url:'books_dashboard.php',
			type:'POST',	
			data:{action_type:'sort',type:x},
			success:function(response){	     
				$('.demo').html(response);		
                /*=========Number of products===================*/
			var count=$('.product__thumb').length;
			$('#count').text(count);
			$(".nav-item").show();				
			}
	    });
	}	
}
</script>		
<?php
require "footer.php";
?>	