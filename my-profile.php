<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Profile</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">
	<link href="css/style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">
	  <?php include 'header.php'; ?>

		<!-- start Main Wrapper -->
		<div class="main-wrapper">
		
					
			<div class="admin-container-wrapper">

				<div class="container">
				
					<div class="GridLex-gap-15-wrappper">
					
						<div class="GridLex-grid-noGutter-equalHeight">
						
							<div class="GridLex-col-3_sm-4_xs-12">
							
								<div class="admin-sidebar">
										
									<div class="admin-user-item">
										
										<div class="image">
											<img src="WinYa-Education-logo.png" alt="image" class="img-circle" />
										</div>
										
										<h4>Banyan</h4>
										<p class="user-role">Professional</p>
										
									</div>
									
									
									<ul class="admin-user-menu clearfix">
										<li class="active">
											<a href="#"><i class="fa fa-tachometer"></i> Dashboard</a>
										</li>
										<li>
											<a href="#"><i class="fa fa-user"></i> Profile</a>
										</li>
										<li>
											<a href="#"><i class="fa fa-key"></i> Change Password</a>
										</li>
										<li>
											<a href="#"><i class="fa fa-bell"></i>Application Status</a>
										</li>
										<li>
											<a href="#"><i class="fa fa-sign-out"></i> Logout</a>
										</li>
									</ul>
									
								</div>

							</div>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">

									<div class="admin-section-title">
									
										<h2>Profile</h2>
										
									</div>
									
									<form class="post-form-wrapper">
								
											<div class="row gap-20">
										
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>First Name</label>
														<input type="text" class="form-control" value="Christine">
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" class="form-control" value="Gateau">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Born</label>
														<div class="row gap-5">
															<div class="col-xs-3 col-sm-3">
																<select class="selectpicker form-control" data-live-search="false">
																	<option value="0">day</option>
																	<option value="1">01</option>
																	<option value="2" selected>02</option>
																	<option value="3">03</option>
																</select>
															</div>
															<div class="col-xs-5 col-sm-5">
																<select class="selectpicker form-control" data-live-search="false">
																	<option value="0">month</option>
																	<option value="1">Jan</option>
																	<option value="2" selected>Feb</option>
																	<option value="3">Mar</option>
																</select>
															</div>
															<div class="col-xs-4 col-sm-4">
																<select class="selectpicker form-control" data-live-search="false">
																	<option value="0">year</option>
																	<option value="1">1985</option>
																	<option value="2" selected>1986</option>
																	<option value="3">1987</option>
																</select>
															</div>
														</div>
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Email</label>
														<input type="email" class="form-control" value="banyaninfotech@gmail.com">
													</div>
													
												</div>
												
												<div class="clear"></div>

												<div class="form-group">
												
													<div class="col-sm-12">
														<label>Education</label>
													</div>
													
													<div class="col-sm-6 col-md-4">
														<select class="selectpicker show-tick form-control mb-15" data-live-search="false">
															<option value="0">Select</option>
															<option value="1">Diploma</option>
															<option value="2" selected>Bachelor</option>
															<option value="3">Master</option>
															<option value="4">Doctoral </option>
															<option value="5">Certificate</option>
														</select>
													</div>
													
													<div class="col-sm-6 col-md-4">
														<input type="text" class="form-control mb-15" value="Engineering">
													</div>
														
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Address</label>
														<input type="text" class="form-control" value="254">
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>City/town</label>
														<input type="text" class="form-control" value="">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Province/State</label>
														<input type="text" class="form-control" value="">
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Street</label>
														<input type="text" class="form-control" value="">
													</div>
													
												</div>

												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Zip Code</label>
														<input type="text" class="form-control" value="">
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Country</label>
														<select class="selectpicker show-tick form-control" data-live-search="false">
															<option value="0">Select</option>
															<option value="1">Thailand</option>
															<option value="2">France</option>
															<option value="3">China</option>
															<option value="4">Malaysia </option>
															<option value="5">Italy</option>
															<option value="5" selected>India</option>
														</select>
													</div>
													
												</div>

												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Phone Number</label>
														<input type="text" class="form-control" value="">
													</div>
													
												</div>

												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group bootstrap3-wysihtml5-wrapper">
														<label>About me</label>
														<textarea class="bootstrap3-wysihtml5 form-control" style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>

												<div class="col-sm-12 mt-10">
													<a href="#" class="btn btn-primary">Save</a>
													<a href="#" class="btn btn-primary btn-inverse">Cancel</a>
												</div>

											</div>
											
										</form>
									
								</div>

							</div>
							
						</div>

					</div>

				</div>
			
			</div>

			<?php include'footer.php'; ?>
			
		</div>
		<!-- end Main Wrapper -->

	</div> <!-- / .wrapper -->
	<!-- end Container Wrapper -->
 
 
<!-- start Back To Top -->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->


<!-- JS -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>

<script type="text/javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" src="js/customs-fileinput.js"></script>
</body>
</html>