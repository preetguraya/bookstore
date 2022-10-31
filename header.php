<?php

require('db.php');
$sql="select * from website where status=1";
$record=mysqli_query($con,$sql);               //----Fetch LOGO From Backend-----//
$roww=mysqli_fetch_array($record);
$image=$roww['image'];

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Home | Bookshop Responsive Bootstrap4 Template</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="css/custom.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Modernizer js -->
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="books.js"></script>
	<script src="simple-bootstrap-paginator.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="../myadmin/uploads/<?php echo $image; ?>" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="index.php">Home</a></li>
								
								<li class="drop"><a href="javascript:void(0)">Books</a>
									<div class="megamenu dropdown">
										<ul class="item item03">
											<li class="title">Categories</li>
											<?php
												require('db.php');
												if(!$con)
												{echo "DB not connected"; die;}
                                                $s="select * from categories where Name='Kids'";
												$re=mysqli_query($con,$s);
												$r= mysqli_fetch_assoc($re);
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
								<!--	<ul class="item item03">
											<li class="title">Customer Favourite</li>
											<li><a href="shop-grid.html">Mystery</a></li>
											<li><a href="shop-grid.html">Religion & Inspiration</a></li>
											<li><a href="shop-grid.html">Romance</a></li>
											<li><a href="shop-grid.html">Fiction/Fantasy</a></li>
											<li><a href="shop-grid.html">Sleeveless</a></li>
										</ul>
										<ul class="item item03">
											<li class="title">Collections</li>
											<li><a href="shop-grid.html">Science </a></li>
											<li><a href="shop-grid.html">Fiction/Fantasy</a></li>
											<li><a href="shop-grid.html">Self-Improvemen</a></li>
											<li><a href="shop-grid.html">Home & Garden</a></li>
											<li><a href="shop-grid.html">Humor Books</a></li>
										</ul>        -->
									</div>
								</li>
								<li class="drop"><a href="books1.php?bookid=<?php echo $r['ID']; ?>">Kids</a>
									
								</li>
								<li class="drop"><a href="#">Pages</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="index.php">Home Page</a></li>				
											<li><a href="about.php">About Page</a></li>				
											<li><a href="contact.php">Contact Page</a></li>				
											<li><a href="cart.php">Cart Page</a></li>
											<li><a href="books1.php">Shop Page</a></li>
											
										</ul>
									</div>
								</li>
								<li class="drop"><a href="blog.php">Blog</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="blog.php">Blog Page</a></li>
											
										</ul>
									</div>
								</li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							
							
							<li class="shopcart"><a href="cart.php"><span class="product_qun">
							<?php if (isset($_SESSION['products'])) 
							{ echo count($_SESSION['products']); }
							else
							{echo 0;}
						    ?>
							</span></a></li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">										
														<span><a href="my-account.php">Log In</a></span>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="index.php">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="index.php">Home Page</a></li>				
											<li><a href="about.php">About Page</a></li>				
											<li><a href="contact.php">Contact Page</a></li>				
											<li><a href="cart.php">Cart Page</a></li>
											<li><a href="books1.php">Shop Page</a></li>
									</ul>
								</li>
								<li><a href="books1.php">Books</a>
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
								</li>
								<li><a href="books1.php?bookid=<?php echo $r['ID']; ?>">Kids</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		
		