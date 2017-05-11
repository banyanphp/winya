<?php 
	@include 'admin/include/config.php';
	$clg_id =  $_GET['pass'];
	
	$sql_clg = mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `college` WHERE `college_id`='$clg_id'"));
	
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
	<meta name="author" content="BanyanInfoTech" >
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
	
<!--load bootstrap3-->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--load fontawesome-->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--load hlRightPanel-->
    <link href="floating/hlRightPanel.css" rel="stylesheet">
    <script src="floating/hlRightPanel.js" type="text/javascript"></script>
    <style>
        .customIcon1 {
            width: 34px;
            height: 35px;
            margin-left: 1px;
            position: relative;
            z-index: 2;
            background-color: #7a6e6e;
            display: inline-block;
            color:#fff;
            text-align:center;
            line-height:35px;
        }

        .customIcon2 {
            background-position: -50px -50px;
            width: 34px;
            height: 35px;
            margin-left: 1px;
            position: relative;
            z-index: 2;
            background-color: #7a6e6e;
            display: inline-block;
            background-repeat: no-repeat;
        }

        .customIcon3 {
            background-position: -190px -150px;
            width: 34px;
            height: 35px;
            margin-left: 1px;
            position: relative;
            z-index: 2;
            background-color: #7a6e6e;
            display: inline-block;
            background-repeat: no-repeat;
        }

        .customIcon4 {
            background-position: -50px -100px;
            width: 34px;
            height: 35px;
            margin-left: 1px;
            position: relative;
            z-index: 2;
            background-color: #7a6e6e;
            display: inline-block;
            background-repeat: no-repeat;
        }


    </style>
	
</head>


<body class="not-transparent-header">


	<!-- start Container Wrapper -->
	<div class="container-wrapper">
    		<!-- start Header -->
		<?php include'header.php'; ?>		

		<!-- start Main Wrapper -->
		<div class="main-wrapper">
			<!-- start breadcrumb -->
			<div class="breadcrumb-wrapper mar_top">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="index.php">Home</a></li>
						<!--<li><a href="#">List Colleges</a></li>-->
						<li><span><?php echo $sql_clg['college_name']; ?></span></li>
					</ol>
					
				</div>
				
			</div>
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-md-10 col-md-offset-1">
							
								<div class="company-detail-wrapper">
								
									<div class="company-detail-header text-center">
										
										<div class="image">
											<img src="http://epictech.in/winya/admin/images/colleges/<?php echo $sql_clg['college_photo']; ?>" alt="College logo" />
										</div>
										
										<h2 class="heading mb-15"><?php echo $sql_clg['college_name']; ?></h2>
									
										<p class="location"><i class="fa fa-map-marker"></i> <?php echo $sql_clg['college_address']; ?> </p>
										
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
						
									<div class="company-detail-company-overview clearfix">
									
										<h3>About College</h3>
										
										<p style="text-align:justify;"><?php $college_details=$sql_clg['college_details'];									$college_details = preg_replace("/[^A-Za-z0-9\-]/", " ", $college_details);	
												echo $college_details; ?></p>
									</div>
									
									<div class="section-title">
									
									</div>	
									<div class="section-title">
									<h3>Course</h3>
									</div>

								<?php 
									$sql_curse=mysqli_query($bd,"SELECT `course_id`,`course_name`,`course_time`,`course_short_name` FROM `course_details` WHERE `college_id`='$clg_id'");
									while($fetch_curse=mysqli_fetch_array($sql_curse)){

									?>
												<div class="content col-md-3 col-sm-3 col-xs-3">
													<a href="course.php?curs_nam=<?php echo $fetch_curse['course_id']; ?>"><span class="curs"><?php echo $fetch_curse['course_name']; ?></span></a>
												</div>
													<?php } ?>
								
									
										
										
									
								
									
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

      

    </script>
    
 </div>
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