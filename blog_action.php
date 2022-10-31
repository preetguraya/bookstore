<?php
require('db.php');
if(!$con)
{echo "DB not connected"; die;}

//////connection set////////

$perPage = 3;
if (isset($_POST['page'])) { 
	$page = $_POST['page']; 
      
$startFrom = ($page-1) * $perPage;  
$sqlQuery = "select * from blog where status=1 order by id desc LIMIT $startFrom, $perPage";
	
$result = mysqli_query($con, $sqlQuery); 
$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) {  
echo '<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="blog-details.php?id='.$row['id'].'">
        								<img width="305px" height="235px" src="../myadmin/uploads/'.$row['image'].' " alt="blog images">
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="blog-details.php?id='.$row['id'].'">'. $row['title'].'</a></h4>
        							<ul class="post__meta">
        								<li>Posts by : road theme</li>
        								<li class="post_separator">/</li>
        								<li>'. $row['modified_at'].'</li>
        							</ul>
        							<p>'. substr($row['description'],0,149).'.......</p>
        							<div class="blog__btn">
        								<a href="blog-details.php?id='. $row['id'].'">read more</a>
        							</div>
        						</div>
        					</article>'; 
} 
}
?>