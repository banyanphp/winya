<?php 
		@include 'admin/include/config.php';
		$country = $_GET['val'];
		
	if ($country == 0) {
    $country = "";
}

	$sql_cuntry = mysqli_fetch_array(mysqli_query($bd,"SELECT `country_name` FROM `country` WHERE `country_id`='$country'"));
?>
<!doctype html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>Winya Education</title>
	<meta name="description" content="HTML Responsive Landing Page Template for Job Portal Based on Twitter Bootstrap 3.x.x" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="crenoveative">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/ico/favicon.png">

	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<!-- CSS Font Icons -->
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

	<!-- CSS Custom -->
	<link href="css/style.css" rel="stylesheet">
	
</head>


<body class="not-transparent-header">

	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
			<?php include('header.php'); ?>
		<!-- start Main Wrapper -->
		<div class="main-wrapper">
			<!-- start breadcrumb -->
			<div class="breadcrumb-wrapper mar_top">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="index.php">Home</a></li>
						<li><span><?php echo $sql_cuntry['country_name']; ?></span></li>
					</ol>
					
				</div>
				
			</div>
			<!-- end breadcrumb -->
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-md-10 col-md-offset-1">
							
								<div class="company-detail-wrapper">
									<div class="section-title mb-40">
										<!--<h2 class="text-left">5 jobs offered</h2>-->
									</div>

									<div class="result-list-wrapper">
									
					<?php 	
						$sql_clg = mysqli_query($bd,"SELECT * FROM `college` WHERE `country_id`='$country'");
						while($sql_clg_res=mysqli_fetch_array($sql_clg)){
							$clg_id =$sql_clg_res['college_id'];
					?>
										<div class="job-item-list featured">
										
											<!--<div class="featured-label"><span>featured</span></div>-->
											
											<div class="image">
												<img src="http://epictech.in/winya1/admin/colleges/<?php echo $sql_clg_res['college_photo']; ?>" alt="image" />
											</div>
											
											<div class="content">
												<div class="job-item-list-info">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
														
															<h4 class="heading"><?php echo $sql_clg_res['college_name']; ?></h4>
															<div class="meta-div clearfix mb-25">
																<span>at <a href="javascript:void(0);"><?php echo $sql_cuntry['country_name']; ?></a></span>
																<span class="job-label label label-success"><?php echo $sql_clg_res['type']; ?></span>
															</div>
															
															<p class="texing" style="text-align: justify;><?php 
																	$clg_detail = $sql_clg_res['college_details'];
																	$clg_details = preg_replace("/[^A-Za-z0-9\-]/", " ", $clg_detail);
																		echo $clg_details = substr($clg_details,0,200); ?>...</p>
														</div>
														
													</div>
												
												</div>
											
												<div class="job-item-list-bottom">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
															<div class="sub-category">
																<?php
				$sql_curs = mysqli_query($bd,"SELECT * FROM `course_details` WHERE `college_id`='$clg_id' AND `country_id`='$country'");
				while($res_sql_curs=mysqli_fetch_array($sql_curs)){
														?>
					<a href="javascript:void(0);" data-toggle="tooltip" data-original-title="<?php echo $res_sql_curs['course_type']; ?>"><?php echo $res_sql_curs['course_short_name']; ?></a>
																<?php } ?>
															</div>
														</div>
														
														<div class="col-sm-5 col-md-4">
															<a href="college_details.php?pass=<?php echo $clg_id; ?>" class="btn btn-primary">Read more</a>
														</div>
														
													</div>
												
												</div>
				
											
											
											</div>
										
										</div>
									<?php } ?>
				
									</div>
									
							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>

<?php include('footer.php'); ?>
			
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


</body>



</html>