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
$getid=$_GET['id'];
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
<?php
$sql1="select * from blog where id=".$_GET['id'];
$record1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($record1);
        	
?>

		
	 <!------ Start Blog Area------>
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
						<div class="blog-details content">
							<article class="blog-post-details">
								<div class="post-thumbnail">
									<img height="400px" width="800px" src="../myadmin/uploads/<?php echo $row1['image'];?> " alt="blog images">
								</div>
								<div class="post_wrapper">
									<div class="post_header">
										<h2><?php echo $row1['title']; ?></h2>
										<div class="blog-date-categori">
											<ul>
												<li><?php echo $row1['modified_at']; ?></li>
											
											</ul>
										</div>
									</div>
									<div class="post_content">
										<p>
										<?php echo $row1['description']; ?>
										</p>

									</div>
									
								</div>
							</article>
					
							
						</div>
        				
        			</div>
<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__sidebar">
        					
        					<!-- Start Single Widget -->
        					<aside class="widget recent_widget">
        						<h3 class="widget-title">Recent</h3>
        						<div class="recent-posts">
        							<ul>
<?php
$sql1="select * from blog where status=1 order by id desc";
$record1=mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_assoc($record1))
        {
?>									
									
        								<li>
        									<div class="post-wrapper d-flex">
        										<div class="thumb">
        											<a href="blog-details.php?id=<?php echo $row1['id']; ?>">
													<img width="50px" height="50px" src="../myadmin/uploads/<?php echo $row1['image'];?> " alt="blog images"></a>
        										</div>
        										<div class="content">
        											<h4><a href="blog-details.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['title']; ?></a></h4>
        											<p><?php echo $row1['modified_at']; ?></p>
        										</div>
        									</div>
        								</li>
 <?php } ?>       								
        								
        							</ul>
        						</div>
        					</aside>
        					<!-- End Single Widget -->
        					
        					<!-- Start Single Widget -->
        					<aside class="widget category_widget">
        						<h3 class="widget-title">Categories</h3>
        						<ul>
        							<?php												
												$sql="select * from categories where Parent_ID=0";
												$result=mysqli_query($con,$sql);

												 while($row = mysqli_fetch_assoc($result)) 
											{ ?>
							 
											<li>
											<a href="books1.php?bookid=<?php echo $row['ID']; ?>" >									
											<?php echo $row['Name']; ?>
											</a></li>            
											<?php } ?>
        						</ul>
        					</aside>
        					<!-- End Single Widget -->
        					
        				</div>
        			</div>


        		</div>
        	</div>
        </div>
        <!-- End Blog Area -->		
		
		
		
		
		
		
		
		
		
		
		
		
<?php
require "footer.php";
?>			