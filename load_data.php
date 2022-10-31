<?php
require('db.php');
if(!$con)
{echo "DB not connected"; die;}

//////connection set////////

$perPage = 6;
if (isset($_POST['page'])) { 
	$page = $_POST['page']; 
    $id=  $_POST['id'];    
$startFrom = ($page-1) * $perPage;  
if($id==0)
{
$sqlQuery = "select * from categories where Parent_ID!=0 LIMIT $startFrom, $perPage";
}
else
{
$sqlQuery = "select * from categories where Parent_ID=$id LIMIT $startFrom, $perPage";	
}	
$result = mysqli_query($con, $sqlQuery); 
$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) {  
echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			<div class="product__thumb">									
				<a class="first__img" href="javascript:void(0);" onclick="product('.$row['ID'].')"> 
				<img src="../myadmin/uploads/'.$row['Image'].'" 
				 width="200px" height="300px" alt="product"></a>	
			</div><br>
			<div class="text-center">
				<a href="javascript:void(0);" onclick="product('.$row['ID'].')">
				'.$row["Name"].'</a>					
			</div>
			</div>'; 
} 
}
?>