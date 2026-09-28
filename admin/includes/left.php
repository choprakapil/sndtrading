<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[3];


$sqqll ="SELECT `pro_id`, `pro_logo`,`pro_dark_logo`, `pro_favicon` , `pro_title`, `pro_keyword`, `pro_detail` FROM `tbl_profile`";
$resulltt = $conn->query($sqqll);
$rowww = $resulltt->fetch_assoc();
?>
<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image bg-light">
								<img src="../uploads/<?= $rowww['pro_favicon']; ?>" alt="<?= $adminrec['name'];?>" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								  <?= $adminrec['name'];?>
								<small><?= $adminrec['email'];?></small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="manage-profile.php"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="manage-contact.php"><i class="fa fa-edit"></i> Contact Setting</a></li>
							<li><a href="includes/logout.php" onClick="if(confirm('Are you sure you want to log out?')){ return true;} else { return false; }"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub <?php if($first_part=="index.php") { echo "active"; } ?>">
						<a href="index.php">
							<b class="caret"></b>
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
                     <li class="has-sub <?php if($first_part=="manage-banner.php" || $first_part=="add-banner.php" || $first_part=="edit-banner.php" || $first_part=="manage-acheivements.php" || $first_part=="add-acheivements.php" || $first_part=="edit-acheivements.php" || $first_part=="manage-clients.php" || $first_part=="add-clients.php" || $first_part=="edit-clients.php" || $first_part=="manage-testimonial-extra.php" || $first_part=="manage-catalog.php"){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Home Management</span> 
						</a>
						<ul class="sub-menu">
                        	<li><a href="manage-banner.php">Banner Management </a></li> 
                        	<!--<li><a href="manage-work-procces.php">Work Process Management </a></li>-->
                        	<li><a href="manage-acheivements.php">Achievements Manag..</a></li>
							<!--<li><a href="manage-clients.php">Clients Management </a></li> -->
							<li><a href="manage-home-extra.php">Home Extra Management </a></li>
							
						</ul>
					</li>
					 <li class="has-sub <?php if($first_part=="manage-about.php"){ echo "active"; } ?>">
						<a href="manage-about.php">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>About Us Management</span> 
						</a>
					</li>
					<li class="has-sub <?php if($first_part=="manage-testimonial-extra.php" ||  $first_part=="manage-testimonial.php" || $first_part=="add-testimonial.php" || $first_part=="edit-testimonial.php"){ echo "active"; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Testimonial manage..</span> 
						</a>
						<ul class="sub-menu">
						    <li  class=""><a href="manage-testimonial-extra.php">Testimonial Extra man...</a></li>  
                        	<li  class=""><a href="manage-testimonial.php">Testimonial management</a></li> 
						</ul>
					</li>
					
			     		<li class="has-sub <?php if($first_part=="uploadxl.php" || $first_part=="view-product-variations.php" || $first_part=="manage-redeem-products.php" || $first_part=="add-redeem-products.php" || $first_part=="edit-redeem-products.php" || $first_part=="manage-tags.php" || $first_part=="view-review.php" || $first_part=="manage-category.php" || $first_part=="add-category.php" || $first_part=="edit-category.php" || $first_part=="manage-subcategory.php" || $first_part=="add-subcategory.php" || $first_part=="edit-subcategory.php" || $first_part=="manage-product.php" || $first_part=="add-product.php" || $first_part=="edit-product.php" ) { echo "active"; } ?>">
                				<a href="javascript:;"> 
                					<b class="caret"></b>
                					<i class="fa fa-cogs "></i>
                					<span>Products Management</span> 
                				</a>
                				<ul class="sub-menu">
                					<li><a href="manage-category.php">Category Management</a></li>
                					<li><a href="manage-subcategory.php">Subcategory Mana..</a></li>
                					<!--<li><a href="manage-colors.php">Colors Manage..</a></li>-->
                					<!--<li><a href="manage-size.php">Size Management</a></li>-->
                					<li><a href="manage-product.php">Products Management</a></li>
                					
                				</ul>
                			</li>
					<!--<li class="has-sub <?php if($first_part=="manage-service-category.php" || $first_part=="edit-service-category.php" || $first_part=="manage-service.php" || $first_part=="add-service.php" || $first_part=="edit-service.php"){ echo "active"; } ?>">-->
					<!--	<a href="javascript:;">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-home"></i>-->
					<!--		<span>Service management</span> -->
					<!--	</a>-->
					<!--	<ul class="sub-menu">-->
						    <!--<li  class=""><a href="manage-service-category.php">Category Management</a></li>  -->
     <!--                   	<li  class=""><a href="manage-service.php">Service Management</a></li> -->
					<!--	</ul>-->
					<!--</li>-->
					
					<!--<li class="has-sub <?php if($first_part=="manage-turnkey-category.php" || $first_part=="manage-turnkey.php"){ echo "active"; } ?>">-->
					<!--	<a href="javascript:;">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-home"></i>-->
					<!--		<span>Turnkey management</span> -->
					<!--	</a>-->
					<!--	<ul class="sub-menu">-->
						    <!--<li  class=""><a href="manage-turnkey-category.php">Category Management</a></li>  -->
     <!--                   	<li  class=""><a href="manage-turnkey.php">Turnkey Management</a></li> -->
					<!--	</ul>-->
					<!--</li>-->
					
					<!-- <li class="has-sub <?php if($first_part=="manage-blogcategory.php" || $first_part=="add-blogcategory.php" || $first_part=="edit-blogcategory.php" || $first_part=="manage-blogs.php" || $first_part=="add-blogs.php" || $first_part=="edit-blogs.php" ){ echo "active"; } ?>">-->
					<!--	<a href="javascript:;">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-home"></i>-->
					<!--		<span>Blogs Management</span> -->
					<!--	</a>-->
					<!--	<ul class="sub-menu">-->
     <!--                   	<li><a href="manage-blogcategory.php">Blogs Category Mana.. </a></li> -->
     <!--                       <li><a href="manage-blogs.php">Blogs Management</a></li>-->
                            
					<!--	</ul>-->
					<!--</li>-->
					<!--<li class="has-sub <?php if($first_part=="manage-team.php" || $first_part=="add-team.php" || $first_part=="edit-team.php" ) { echo "active"; } ?>">-->
					<!--	<a href="manage-team.php">-->
					<!--		<b class="caret"></b>-->
					<!--		<i class="fa fa-users"></i>-->
					<!--		<span>Team Manag..</span>-->
					<!--	</a>-->
					<!--</li>-->
					<li class="has-sub <?php if($first_part=="manage-gallery-category.php" || $first_part=="add-gallery-category.php" || $first_part=="edit-gallery-category.php" || $first_part=="manage-gallery.php" || $first_part=="add-gallery.php" || $first_part=="edit-gallery.php" ){ echo "active"; } ?>">
						<a href="manage-gallery.php">
							<b class="caret"></b>
							<i class="fa fa-file-image-o"></i>
							<span>Gallery Management</span> 
						</a>
						<!--<ul class="sub-menu">-->
                        	<!--<li  class=""><a href="manage-gallery-category.php">Gallery Category Mana.. </a></li>   -->
      <!--                      <li><a href="manage-gallery.php">Gallery Management</a></li>-->
						<!--</ul>-->
					</li>
					
					
					<li class="has-sub <?php if($first_part=="manage-career.php"){ echo "active"; } ?>">
						<a href="manage-career.php">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Career Management</span> 
						</a>
					</li>
					<li class="has-sub <?php if($first_part=="manage-job-application.php"){ echo "active"; } ?>">
						<a href="manage-job-application.php">
							<b class="caret"></b>
							<i class="fa fa-home"></i>
							<span>Manage Job Application</span> 
						</a>
					</li>
                 
				
                    <li class="has-sub <?php if($first_part=="manage-breadcrumb.php" || $first_part=="edit-breadcrumb.php" ) { echo "active"; } ?>">
						<a href="manage-breadcrumb.php">
							<b class="caret"></b>
							<i class="fa fa-file-image-o"></i>
							<span>Breadcrumb Manag..</span>
						</a>
					</li>
				    
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
<div class="sidebar-bg"></div>

