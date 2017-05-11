<?php 
	@include 'admin/include/config.php';
	$curs_id =  $_GET['curs_nam'];
	
	$sql_curs = mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `course_details` WHERE `course_id`='$curs_id'"));
	$clg_id = $sql_curs['college_id'];
	$sql_clg = mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `college` WHERE `college_id`='$clg_id'"));
	//$sql_clg_img = mysqli_fetch_array(mysqli_query($bd,"SELECT `image` FROM `college_image` WHERE `college_id`='$clg_id'"));
	?>
<!doctype html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>Winya Education</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="BanyanInfoTech">
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
		<?php include'header.php'; ?>

		<!-- start Main Wrapper -->
		<div class="main-wrapper">
			<!-- start hero-header -->
			<div class="breadcrumb-wrapper mar_top">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="index.php">Home</a></li>
						<?php /* <li><a href="#"><?php echo $sql_clg['college_name']; ?></a></li> */ ?>
						<li><span><?php echo $sql_curs['course_name']; ?></span></li>
					</ol>
					
				</div>
				
			</div>
			<!-- end hero-header -->
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-sm-5 col-md-4">
							
								<div class="company-detail-sidebar">
										<a href="college_details.php?pass=<?php echo $sql_clg['college_id']; ?>">
									<div class="image">
										<img src="http://epictech.in/winya/admin/images/colleges/<?php echo $sql_clg['college_photo']; ?>" alt="image"/>
									</div>
									
									<h2 class="heading mb-15"><?php echo $sql_clg['college_name']; ?></h2></a>
								
									<p class="location"><i class="fa fa-map-marker"></i> <?php echo $sql_clg['college_address']; ?></p>
									
									<ul class="meta-list clearfix">
											<li>
												<h4 class="heading">Founded Year:</h4>
												<?php echo $sql_clg['founded_year']; ?>
											</li>
											<li>
												<h4 class="heading">Type:</h4>
												<?php echo $sql_clg['type'];  ?>
											</li>
											<li>
												<h4 class="heading">Intakes:</h4>
												<?php 
												$course_intak = $sql_clg['intake'];
												$course_timearray=explode(",",$course_intak);
												$typecount=count($course_timearray);
												 for($i=0;$i<$typecount;$i++)
												 { ?>
												<button class="btn btn-sm btn-rad"> 
												 <?php  echo $course_timearray[$i] ?></button><?php  }  ?>
												
											</li>
											<li>
												<a href="<?php echo $sql_clg['college_website']; ?>" target="_blank"><h4 class="heading">Website: </h4>
												<?php echo $sql_clg['college_website']; ?>
											</li></a>
										</ul>
									
								</div>
					
					
							</div>
							
							<div class="col-sm-7 col-md-8">
							
								<div class="company-detail-wrapper">

									<div class="company-detail-company-overview mt-0 clearfix">
										<h3><?php echo $sql_curs['course_name']; ?> (<?php echo $sql_curs['course_short_name']; ?>) </h3>
										<?php 
										$type=$sql_curs['course_type'];
										$course_time=$sql_curs['course_time'];
										$course_fee=$sql_curs['course_fees'];
										$course_fee=explode(",",$course_fee);
										$course_timearray=explode(",",$course_time);
										$typearray=explode(",",$type);
										$typecount=count($typearray);
											for($i=0;$i<$typecount;$i++){ ?>
											<span class="curs" href="javascript:vod(0);" data-toggle="tooltip" title="<?php echo $course_timearray[$i]; ?> , ( Fee :<?php echo $course_fee[$i]; ?> )"> <?php echo $typearray[$i]; ?></span>
											<?php } ?>
										<p><?php 
											$cur_detail = $sql_curs['course_details'];
											$cur_details = preg_replace("/[^A-Za-z0-9\-]/", " ", $cur_detail);
											echo $cur_details; ?></p>
									</div>
									
									
								<h3> Requirements</h3>
									<ul class="list-with-icon alt mt-20 mb-25">
									<?php
										$requirements=$sql_curs['requirements'];
										$requirements_array =explode(",",$requirements);
											$req_count = count($requirements_array);
											for($i=0;$i<$req_count;$i++){
										?>
								<li><i class="text-primary ion-android-checkmark-circle"></i><?php echo $requirements_array[$i];  ?> </li><?php } ?>
								
							</ul>
							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>

		<?php include 'footer.php'; ?>
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