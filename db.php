<?php 
                                                    
$con=mysqli_connect('localhost','gkguraya5','Bs2503047575','bookstore');  
                                                   //DB_CONNECTION FILE//
if(!$con)	{
    die("Connection failed" . mysqli_connect_error())
 }   else{
echo "connected successfully";
    }
										   
?>   												   