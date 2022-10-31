<?php
session_start();
require('db.php');

//.............DB NOT CONNECTED............//
if(!$con)
{echo "DB not connected"; die;}




//..............DB CONNECTED..............//
else
{	
$action_type = $_POST['action_type'];
     

     /****************......LOGIN FORM.....*****************/
		if($action_type=='login') 
		{	
           	 $email = $_POST['email'];
	         $pswd = $_POST['pswd'];
			 $pswdMD= md5($pswd);
             $check= $_POST['check'];			 
	    	 //..............SAVE COOKIES..........//
				if($check=="checked")
				{
					 setcookie("user",$email,time()+3600000);
					 setcookie("pswd",$pswd, time()+3600000);
				}
				else{
					 setcookie("user","");
					 setcookie("pswd","");	
				}
		  //..................COOKIES END.......................//
		  
		    $sql="select * from register_user where email='$email' ";
	        $result=mysqli_query($con,$sql);
				if(mysqli_num_rows($result)>0)
				{
					$row=mysqli_fetch_array($result);
					if($pswdMD==$row['Password'])
					{
						if( $row['Verified']==1 )
						{
							echo "1";
							$_SESSION['id']=$row['ID'];
							$_SESSION['email']=$row['Email'];
						}
						else
						{
						    echo "0";
						}
					}
					else{echo "Wrong Password!";}
					
				}
				
				else
			    {echo "Invalid Email!";}
	    }
		
	 /***********........REGISTERATION FORM .....***********/	
		if($action_type=='register') 
		{	 
	         $email = $_POST['email'];
            $query="select * from register_user where email='$email' "; 
	        $result=mysqli_query($con,$query);     
			if(mysqli_num_rows($result)>0)                 //......Checking if EMAIL already exists....//
			{                       
                echo "This Email already exists!";			
			}             
			else                                          //..Doesn't exist...Registeration proceed..//
			{
		    $pswd = $_POST['pswd'];
			$pswdMD= md5($pswd);
		    $name = $_POST['name'];
			$_SESSION['email']=$email;
			$_SESSION['otp'] = rand(100000,999999);  	 	//Generate OTP//
			$otp= $_SESSION['otp'];
		    $sql="insert into register_user(name,email,password,Active_Status,OTP) values('$name','$email','$pswdMD','1','$otp')";
				if(mysqli_query($con,$sql))
				{
					
				  //  mail($email,"Hello",$otp); //           //Send OTP via Email//
							echo "1";
							
				}
				else	
				{ echo"Something went wrong"; }			
			
		    }
        }		
     /***********.......UPDATE PROFILE FORM .....***********/	
		if($action_type=='update') 
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
		    $sql="update register_user 
			set Name='$name',Email='$email' where ID=".$_SESSION['id'] ;
			
		    if(mysqli_query($con,$sql))
			{echo "1";}
			else{echo "Not updated!";}	 
			
			
		}	
		
		/***********.......CHANGE PASSWORD FORM .......***********/	
		if($action_type=='password') 
		{
			$old = $_POST['old'];
			$oldMD = md5($old);      //..Encrypted Pswd...//
			$pswd = $_POST['pswd'];
			$pswdMD= md5($pswd);      //..Encrypted Pswd...//
			$query="select * from register_user where ID=".$_SESSION['id'];
			$result=mysqli_query($con,$query);
			$row=mysqli_fetch_array($result);
			if($oldMD!=$row['Password'])
			{
			 echo "Incorrect Old Password!";	
			}
		    else
			{
				 $sql="update register_user 
				 set Password='$pswdMD' where ID=".$_SESSION['id'] ;
				
				 if(mysqli_query($con,$sql))
				 {echo "1";}
				 else{echo "Not Changed!";}	 
		    }	
		}	
//.......................................................RESET PASSWORD START...............................................................................//		
	
	
      ////***********.......RESET PASSWORD FORM .......***********////	
		
		if($action_type=='forgot') 
		{
			$email = $_POST['email'];
			
            $query="select * from register_user where email='$email' "; 
	        $result=mysqli_query($con,$query);     
			if(mysqli_num_rows($result)<1)                 //......Checking if EMAIL exists....//
			{                       
                echo "Invalid Email!";			
			}
          //.........*******............//
			
			else
            {
				$_SESSION['email']=$email;
			    $_SESSION['otp'] = rand(100000,999999);  				//Generate OTP//
				$otp= $_SESSION['otp'];
        	    $sql="update register_user set OTP = $otp where email='$email'";    //Store OTP in Database//
			
				    if(mysqli_query($con,$sql))
					{	
					  //   mail($email,"Hello",$otp);    //   //Send OTP via Email//
						echo "1";
						 
						
					}
					 
					else	
					{ echo"Something went wrong"; }			

			}				   
		}		
		
			////.......OTP VERIFICATION.........../////
		if($action_type=='otp') 
		{
			$user_otp = $_POST['user_otp'];	
		    if($user_otp== $_SESSION['otp'])
		    {
				$sql="update register_user set Verified = 1 where OTP='".$_SESSION['otp']."'";
				if(mysqli_query($con,$sql)){
				 echo "1";}
				else{echo "Not verified!";}
			}
		    else
			 { echo "Wrong OTP!"; }
		 
		}
			
			////.......RESET NEW PASSWORD.........../////
		if($action_type=='reset_pswd') 
		{
			$pswd = $_POST['pswd'];
			$pswdMD= md5($pswd);
		    $sql="update register_user set password = '$pswdMD', verified=1 where email='".$_SESSION['email']."'";    //Store PSWD in Database//
			
				    if(mysqli_query($con,$sql))
					{	
						{echo "1";} 
					}
					 
					else	
					{ echo"Something went wrong"; }	
		 
		}
		
		
//..................................................RESET PASSWORD END..............................................................................//		
		
		
}
//////..........DB CONNECTED END.........///////
?>