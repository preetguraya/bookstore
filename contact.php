<?php
session_start();

if( !isset($_SESSION['id']))
{
require "header.php";       //....Without login...//
$name='';
$email='';
}
else
{
require "header2.php";      //....User Logged in...// 	
require('db.php');
$sql="select * from register_user where ID=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$name=$row['Name'];
$email=$row['Email'];
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


        <!-- Start Contact Area -->
        <section class="wn_contact_area bg--white pt--80 pb--80">
			
        	<div class="container">
        		<div class="row">
				     
        			<div class="col-lg-7 col-12">
					<div id="message" class="bg--gray font-weight-light h4 p-5 mt-5">
                     Thank you for being so nice!
				     We'll be in touch with you shortly!
				
				
				    </div>
        				<div class="contact-form-wrap"  id="demo">
        					<h2 class="contact__title">Get in touch</h2>
        					<p class="text-muted">If you have any query, feel free to talk to us!<br> We are always here to help you!</p>
                            <form id="contact-form" action="javascript:void(0);" onsubmit="send()">
                                <div class="single-contact-form space-between">
                                    <input type="text" id="id1" name="name" placeholder="Name*" value="<?php echo $name; ?>" required>
                                   
                                </div>
                                <div class="single-contact-form space-between">
                                    <input type="email" id="id2" name="email" placeholder="Email*" value="<?php echo $email; ?>" required>
                                 
                                </div>
                                <div class="single-contact-form">
                                    <input type="text" id="id3" name="subject" placeholder="Enquiry for*" required>
                                </div>
                                <div class="single-contact-form message">
                                    <textarea id="id4" name="message" placeholder="Type your message here.." required></textarea>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit">Send Message</button>
                                </div>
                            </form>
                        </div> 
                       
        			</div>
        			<div class="col-lg-5 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__address">
        					<h2 class="contact__title">Get office info.</h2>
        					<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. </p>
        					<div class="wn__addres__wreapper">

        						<div class="single__address">
        							<i class="icon-location-pin icons"></i>
        							<div class="content">
        								<span>address:</span>
        								<p>666 5th Ave New York, NY, United</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-phone icons"></i>
        							<div class="content">
        								<span>Phone Number:</span>
        								<p>716-298-1822</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-envelope icons"></i>
        							<div class="content">
        								<span>Email address:</span>
        								<p>bookstor@gmail.com</p>
        							</div>
        						</div>

        						<div class="single__address">
        							<i class="icon-globe icons"></i>
        							<div class="content">
        								<span>website address:</span>
        								<p>www.bookstor.com</p>
        							</div>
        						</div>

        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Contact Area -->
		
			
<script>
$('#message').hide();
/****************....SEND MESSAGE.....*****************/
function send(){
var name=   $('#id1').val();	
var email=  $('#id2').val();	
var subject=$('#id3').val();	
var msg=    $('#id4').val();	
    $.ajax({
        type: 'POST',
        url: 'contact_action.php',
        data: {name:name,email:email,subject:subject,msg:msg},
        success:function(data){
			if(data==1)	
			{
				$('#demo').hide();
				$('#message').show();
			}	
            else
			{alert(data);}     		
		}	
    });
}

</script>		
	
				
		
		
				
<?php
require "footer.php";
?>	
	