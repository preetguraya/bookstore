<?php
require "header.php";
?>

		
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title"></h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html"></a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active"></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		
		 <!--Start Message Area -->
		 		
		 <div class="btn btn-dark btn-block text-center " >
		Congratulations!
		</div>
		<div class="btn btn-danger btn-block text-center " >
		Error!
		</div>
		 <!-- End Message area -->
		 
		
		
		<!-- Start Reset Password Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			
				<div class="row justify-content-center">
				
					<div class="col-lg-6 col-10">
						<div class="my__account__wrapper">
							<h3 class="account__title text-center">Reset Your Password</h3>
							<form action="#">
								<div class="account__form">
								
								<div class="email">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" id="id1" class="form-control"  placeholder="Email" required>
									</div>
										<div class="form__btn text-center">
										<button type="button" id="sendOTP">Send OTP</button>
									</div><br>
								</div>
								<div class="otp">
									<div class="input__box">
										<label>OTP<span>*</span></label>
										<input type="number" min="100000" max="999999" name="otp" id="id2" 
										placeholder="Enter OTP" class="form-control" required><br>
									</div>
									<div class="form__btn  text-center">
										<button type="button" id="otp">Submit</button>
									</div><br>
								</div>	
								<div class="pswd">
									<div class="input__box">
										<label>Set New Password<span>*</span></label>
										<input type="password" id="id3" class="form-control" placeholder="Password" required>
									</div>
									<div class="form__btn  text-center">
										<button type="button" id="save">Save</button>
									</div>
								</div>	
									
								</div>
							</form>
						</div>
					</div>
				</div>
			
		</section>
		
   <script>
$(document).ready(function(){
	$('.btn-danger').hide();
	$('.btn-dark').hide();
	$('.otp,.pswd').hide();
	//....Email Verification.........//
$('#sendOTP').click(function(){
var email=$('#id1').val();
    if(email!=""){
        $.ajax({
		        url:'Login_dashboard.php',
				type:'POST',	
				data:{action_type:'forgot',email:email},
				success:function(response){
					if(response==1)
					{    $('.otp').show(); $('.email').hide();  $('.btn-danger').hide(); }
				    else
					{  
				       $('.btn-danger').text(response);
                       $('.btn-danger').show(); 
					}
				}	
        });
	}
    else{alert("Fill Email");}	
});


	//......OTP Verification.......//
$('#otp').click(function(){
var otp=$('#id2').val();
    if(otp>=100000&&otp<=999999){
        $.ajax({
		        url:'Login_dashboard.php',
				type:'POST',	
				data:{action_type:'otp',user_otp:otp},
				success:function(response){
				    if(response==1)
					{    $('.otp').hide(); $('.pswd').show();   $('.btn-danger').hide();}
				    else
					{       
				       $('.btn-danger').text(response);
                       $('.btn-danger').show(); 
				    }
				}	
        });
	}
    else{
		$('.btn-danger').text("Fill 6 digit OTP");
        $('.btn-danger').show();}	
});


	//........Setting New Password..........//
$('#save').click(function(){
var pswd=$('#id3').val();
    if(pswd!=""){
        $.ajax({
		        url:'Login_dashboard.php',
				type:'POST',	
				data:{action_type:'reset_pswd',pswd:pswd},
				success:function(response){
					
				if(response==1)
					{ 
                    $('.btn-danger').hide(); 				
 				    $('.btn-dark').html('Resetting Password.....!!'); 
 				    $('.btn-dark').show();  
					setTimeout( function(){location="my-account.php";}, 3000 );
					
					}
				    else{
				       $('.btn-danger').text(response);
                       $('.btn-danger').show(); 
                    }
				}	
        });
	}
    else{
		 $('.btn-danger').text("Fill Password");
		 $('.btn-danger').show(); 
	}	
});

});
</script> 


<?php
require "footer.php";
?>