<?php
session_start();
require "header2.php";

require('db.php');
$query="select * from register_user where id=". $_SESSION['id']; 
$result=mysqli_query($con,$query); 
$row=mysqli_fetch_array($result);
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
<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section__title text-center">
				<br><br>
				<h2 class="title__be--2"> <span class="color--theme">My Profile</span></h2>
				<p><?php echo $_SESSION['id']; ?></p>
				<p><?php echo $row['Name']; ?></p>
				<p><?php echo $row['Email']; ?></p>
				<br><br><br><br><br><br>
                </div>

            </div> 

        </div>
</div>







<?php
require "footer.php";
?>