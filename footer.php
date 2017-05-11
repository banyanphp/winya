<footer class="footer-wrapper" id="detail-content-sticky-nav-f">
			
				<div class="main-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-9">
							
								<div class="row">
								
									<div class="col-sm-6 col-md-4">
									
										<div class="footer-about-us">
											<h5 class="footer-title">About us</h5>
											<p><b>We are a subsidiary of WinYa Global</b><br/>

We focus of delivering quality education services to students seeking New University admission free of cos</p>
											<a href="javascript:void(0);">read more</a>
										</div>

									</div>
									
									<div class="col-sm-6 col-md-5 mt-30-xs">
										<h5 class="footer-title">Country</h5>
										<ul class="footer-menu clearfix">
										<?php
							$cuntry =mysqli_query($bd,"SELECT `country_name`,`country_id` FROM `country` WHERE `status`='1'"); 
								while($res=mysqli_fetch_array($cuntry)){
										?>
  
							<li><a href="serchby_country.php?val=<?php echo $res['country_id']; ?>"><?php echo $res['country_name']; ?></a></li>
										   <?php } ?>
										</ul>
									
									</div>

								</div>

							</div>
							
							<div class="col-sm-12 col-md-3 mt-30-sm">
							
								<h5 class="footer-title">Newsletter</h5>
								
								<p>Subsribe to get our latest updates and oeffers</p>
								
								<div class="footer-newsletter">
									
									<div class="form-group">
										<input class="form-control" placeholder="enter your email " />
										<button class="btn btn-primary">subsribe</button>
									</div>
																
								</div>

							</div>

							
						</div>
						
					</div>
					
				</div>
				
				<div class="bottom-footer">
				
					<div class="container">
					
						<div class="row">
						
							<div class="col-sm-3 col-md-3">
					
								<p class="copy-right">&#169; Copyright 2016 WinYa Education</p>
								
							</div>
							
							<div class="col-sm-5 col-md-5">
							
								<ul class="bottom-footer-menu">
									<li><a href="index.php">WinYa Global</a></li>
									<li><a href="index.php">Home</a></li>
									<li><a href="javascript:void(0);">Courses</a></li>
									<li><a href="javascript:void(0);">Services</a></li>
									<li><a href="javascript:void(0);">Contact Us</a></li>
								</ul>
							
							</div>
							
							<div class="col-sm-4 col-md-4">
								<ul class="bottom-footer-menu for-social">
									<li><a href="#"><i class="ri ri-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a></li>
									<li><a href="#"><i class="ri ri-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a></li>
									<li><a href="#"><i class="ri ri-google-plus" data-toggle="tooltip" data-placement="top" title="google plus"></i></a></li>
									<li><a href="#"><i class="ri ri-youtube-play" data-toggle="tooltip" data-placement="top" title="youtube"></i></a></li>
								</ul>
							</div>
						
						</div>

					</div>
					
				</div>
			
			</footer>