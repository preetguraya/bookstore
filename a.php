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
		
	 <!------ Start Blog Area------>
        <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="blog-page">
        					<div class="page__header">
        						<h2>RECENT POSTS BY ADMIN</h2>
        					</div>
						<div class="demo">
<?php	
				
$sql="select * from blog  where status=1 order by id desc";
$record=mysqli_query($con,$sql);
$totalRecords = mysqli_num_rows($record);
$perPage = 3;
$totalPages = ceil($totalRecords/$perPage);
    while($row=mysqli_fetch_assoc($record))
        {			
?>							
        					<!-- Start Single Post -->
        					<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="blog-details.php?id=<?php echo $row['id']; ?>">
        								<img width="305px" height="235px" src="../myadmin/uploads/<?php echo $row['image'];?> " alt="blog images">
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
        							<ul class="post__meta">
        								<li>Posts by : road theme</li>
        								<li class="post_separator">/</li>
        								<li><?php echo $row['modified_at']; ?></li>
        							</ul>
        							<p><?php echo substr($row['description'],0,149); ?>.......</p>
        							<div class="blog__btn">
        								<a href="blog-details.php?id=<?php echo $row['id']; ?>">read more</a>
        							</div>
        						</div>
        					</article>
        					<!-- End Single Post -->
 <?php  } ?>      
                        </div> 
						<!--........ ......PAGINATION..................  -->
						<div class="justify-content-center mt-4">
						<div id="pagination"></div>    
					   <input type="hidden" id="totalPages" value="<?php echo $totalPages; ?>">
                        </div>	
							
        				</div>
        				
        			</div>

<div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__sidebar">
        					
        					<!-- Start Single Widget -->
        					<aside class="widget recent_widget pt-4">
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
        					<aside class="widget category_widget pt-3">
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
<script>		
		
///........Pagination..........//
$(document).ready(function(){

	
function pagin(){
	var totalPage = parseInt($('#totalPages').val());	
	var pag = $('#pagination').simplePaginator({             //.....Inserting pagination row here........//
		totalPages: totalPage,
		maxButtonsVisible: 5,
		currentPage: 1,
		nextLabel: 'Next',
		prevLabel: 'Prev',
		firstLabel: 'First',
		lastLabel: 'Last',
		clickCurrentPage: true,
		pageChange: function(page) {		
			
            $.ajax({
				url:"blog_action.php",
				method:"POST",			
				data:{page:	page},
				success:function(response){
					$('.demo').html(response);                 //.....Inserting products here........//
				}
			});
		}
	});
}
pagin();

});
//....................................................///		
		
</script>	
		
		
		
		
		
		
		
<?php
require "footer.php";
?>			