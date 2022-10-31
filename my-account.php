<?php
require "header.php";         //header file without logged in//

?>

		
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">My Account</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="index.html">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">My Account</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		
		 <!--Success Message Area -->
		
		 <div class="btn btn-dark btn-block text-center " >
		Congratulations! You've been registered successfully!
		</div>
		<div class="btn btn-danger btn-block text-center " >
		Error!
		</div>
		 <!-- End Message area -->
		 
		
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form action="#">
								<div class="account__form">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										 <input type="email" id="id1" class="form-control" placeholder="Email" required
										  value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>" >
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										 <input type="password" id="id2" class="form-control" placeholder="Password"  required
										  value="<?php if(isset($_COOKIE['pswd'])){echo $_COOKIE['pswd'];} ?>">
									</div>
									<div class="form__btn">
										<button type="button" id="login">Login</button>
										<label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" type="checkbox" value="yes">
											<span>Remember me</span>
										</label>
									</div>
									<a class="forget_pass forgot" href="forgot.php">Forgot your password?</a>
									<a class="forget_pass verify" href="verify.php">Not verified?</a>
								</div>
							</form>
						</div>
					</div>
					
				<div class="col-lg-6 col-12 reg">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							    <form action="#">
								<div class="account__form">
								
								  <div class="register">
								  <div class="input__box">
										<label>Name<span>*</span></label>
										<input type="text" id="id3" class="form-control"  placeholder="Name" required>
									</div>
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email" id="id4" class="form-control"  placeholder="Email" required>
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password" id="id5" class="form-control" placeholder="Password" required>
									</div>
									<div class="form__btn">
										<button type="button" id="register">Register</button>
									</div>
									</div>
<!-- ******OTP div ***** -->	<div class="otp">
	  				                <div class="input__box">
										<label>OTP<span>*</span></label>
										<input type="number" min="100000" max="999999" name="otp" id="id9" 
										placeholder="Enter OTP" class="form-control" required><br>
									</div>
									<div class="form__btn  text-center">
										<button type="button" id="otp">Submit</button>
									</div><br>							
<!-- *****OTP end*******  -->   </div>

							     </form>
						        </div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
   <script>
$(document).ready(function(){
	$('.otp').hide();
	$('.btn-dark').hide();
	$('.btn-danger').hide();
	$('.verify').hide();
//********** LOGIN FORM ******************//
    $("#login").click(function(){
        var email = $("#id1").val();
        var pswd = $("#id2").val();
		
		//..........REMEMBER_ME CHECKING..........//
		var check =$("#rememberme:checked").val();
        if(check=='yes')
		{var remember= 'checked';}
    	else{var remember= 'unchecked';};
		//...................................//
		
        if(email!="" && pswd!=""){
            $.ajax({
                url:'Login_dashboard.php',
                type:'post',
                data:{action_type:'login',email:email,pswd:pswd,check:remember},
                success:function(response){
					 if(response==1)
					 {
						location="index.php";
					 }
					 else if(response==0)
					 {
						$('.btn-danger').html('Verify your account to log in!');
					    $('.btn-danger').show();
					   	$('.verify').show();			
					   	$('.forgot').hide();			
					 }
					else
				    {
					$('.btn-danger').text(response);
					$('.btn-danger').show();
					$('.btn-dark').hide();
				    }		
				}
            });
		}
		else{
			$('.btn-danger').text('Fill the fields!');
			$('.btn-danger').show();
			$('.btn-dark').hide();
		}
    });
	
//********** REGISTER FORM ******************//	
	$("#register").click(function(){
		var name= $('#id3').val(); 
		var email=$('#id4').val(); 
		var pswd= $('#id5').val(); 
        if(name!="" && email!="" && pswd!=""){
			$.ajax({
				url:'Login_dashboard.php',
				type:'POST',	
				data:{action_type:'register',name:name,email:email,pswd:pswd},
				success:function(response){
					if(response=="1")
					{
					$('.btn-dark').text('Enter the OTP sent to email to complete registration!');	
					$('.btn-dark').show();	
					$('.btn-danger').hide();
					$('.register').hide();
					$('.otp').show();
					
					}
					else
					{
						$('.btn-danger').text(response);
						$('.btn-danger').show();
						$('.btn-dark').hide();	
					}
				}
			}); 
		}
		else{
			$('.btn-danger').text('Fill the fields!');
			$('.btn-danger').show();
			$('.btn-dark').hide();
		}
    });
	

	//......OTP Verification.......//
$('#otp').click(function(){
var otp=$('#id9').val();
    if(otp>=100000&&otp<=999999){
        $.ajax({
		        url:'Login_dashboard.php',
				type:'POST',	
				data:{action_type:'otp',user_otp:otp},
				success:function(response){
				    if(response==1)
					{
					$('.btn-dark').text('Congratulations!You have been successfully registered!');	
					$('.btn-dark').show();	
					$('.btn-danger').hide();
					$('.register').show();
					$('.otp').hide();
					$('#id1').val(''); 
					$('#id2').val(''); 
					$('#id3').val(''); 
					$('#id4').val(''); 
					$('#id5').val(''); 
					$('#id9').val(''); 
					
					}
				    else{
						$('.btn-danger').text(response);
						$('.btn-danger').show();
						$('.btn-dark').hide();	
				    }	
				}	
        });
	}
	
    else{
	$('.btn-danger').text('Fill 6 digit OTP!');
	$('.btn-danger').show();
	$('.btn-dark').hide();		
	}
});
	
	
});
</script> 


<?php
require "footer.php";
?>