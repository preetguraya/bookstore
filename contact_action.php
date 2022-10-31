<?php
require('db.php');
if(!$con)
{echo "DB not connected"; die;}
else
{
$name = $_POST['name'];	
$email = $_POST['email'];	
$subject = $_POST['subject'];	
$msg = $_POST['msg'];	

$sql="insert into queries(name,email,subject,msg) values('$name','$email','$subject','$msg')";
if(mysqli_query($con,$sql))
{
	echo 1;
}
else
{
	echo 'Something went wrong!';	
}






}