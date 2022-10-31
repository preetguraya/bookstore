<?php
session_start();
require "header2.php";

require('db.php');

		    $sql="select * from register_user where id=". $_SESSION['id'];
	        $result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
				
				$pswd=$row['Password'];
		    echo $_SESSION['id'];
			echo $pswd;
			
	
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
                              <span class="brd-separetor"></span>
                              <span class="breadcrumb_item active"></span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Message area -->
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
				
					<div class="col-lg-5 col-10">
						<div class="my__account__wrapper">
							<h3 class="account__title text-center">Change Your Password</h3>
							<form  id="myForm">
								<div class="account__form">
								
								<div class="email">
									<div class="input__box">
										
										<input type="password" id="id0" class="form-control"  placeholder="Old Password" required>
									</div>
										
								</div>
								<div class="otp">
									<div class="input__box">
										
										<input type="password" id="id1" class="form-control"  placeholder="New Password" required>
									</div>
									
								</div>	
								<div class="pswd">
									<div class="input__box">
										
										 <input type="password" id="id2" class="form-control" placeholder="Confirm New Password" required>
									</div>
									<div class="form__btn  text-center">
										 <button type="button" id="submit" class="btn login-form__btn submit">Submit</button>
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
	$('.btn-dark').hide();
	$('.btn-danger').hide();
	
	$("#submit").click(function(){	
	var old=  $("#id0").val();
	var new1= $("#id1").val();
	var new2= $("#id2").val();
	
		if(new1!=new2)
		{
		 $('.btn-danger').text("Fill same passwords!");
		 $('.btn-danger').show();
		  return false;
		}
		
		else{
	       $.ajax({
			url:'Login_dashboard.php',
			type:'post',
			data:{action_type:'password',old:old,pswd:new2},
		
			success:function(response){
				if(response==1){
					
					$('.btn-dark').text('Password changed successfully!');	
					$('.btn-dark').show();
					$('.btn-danger').hide();
					document.getElementById("myForm").reset();
				}
				else
				{
					$('.btn-danger').text(response);
				    $('.btn-danger').show();
				}
	        }
	        });
		}
	});
	});
	</script>

<?php
require "footer.php";
?>