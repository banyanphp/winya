<?php 
	@include 'admin/include/config.php';
	
	$country = $_GET['val'];
	$course = $_GET['curs_nam'];
	
if ($country == 0) {
    $country = "";
}
if ($course == "0") {
    $course = "";
}
	$sql_clg = mysqli_fetch_array(mysqli_query($bd,"SELECT `country_name` FROM `country` WHERE `country_id`='$country'"));

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
						<li><span><?php echo $sql_clg['country_name']; ?></span></li>
					</ol>
					
				</div>
				
			</div>
			<!-- end hero-header -->
			
			<div class="section sm">
			
				<div class="container">									
					
					<div class="result-wrapper">
					
						<div class="row">
						
							<div class="col-sm-8 col-md-9 mt-25">
							<?php if ($country != '' && $course == '') {
								
    $authentication_checks = "SELECT * FROM `college` WHERE country_id='$country'";
    $result2 = mysqli_query($bd, $authentication_checks);
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
          
            $college_name = $row2["college_name"]; 
			$college_ids = $row2["college_id"];
            $country_id = $row2["country_id"];
            $authentication_checks1 = "SELECT * FROM `country` WHERE country_id='$country_id'";


            $result3 = mysqli_query($bd, $authentication_checks1);
            $row3 = mysqli_fetch_assoc($result3);
            $country_name = $row3["country_name"];

           $country_image = "http://epictech.in/winya/admin/images/country/" . $row3["flag"];
            $college_photo = "http://epictech.in/winya/admin/images/colleges/" . $row2["college_photo"];

            $college_address = $row2["college_address"];
            $founded_year = $row2["founded_year"];
            $type = $row2["type"];
            $type = $row2["type"];
            $intake = $row2["intake"];
            $college_details = $row2["college_details"];
            $user = preg_replace("/[^A-Za-z0-9\-]/", " ", $college_details);

       ?>
								<div class="result-list-wrapper">
									<div class="job-item-list featured">
										<div class="image">
											<img src="<?php echo $college_photo; ?>" alt="college logo" />
										</div>
										<div class="content">
											<div class="job-item-list-info">
												<div class="row">
													<div class="col-sm-7 col-md-8">
														<h4 class="heading"><?php echo $college_name; ?></h4>
														<div class="meta-div clearfix mb-25">
															<span>at <a href="javascript:void(0);"> <?php echo $country_name; ?> </a></span>
															<span class="job-label label label-success"><a href="javascript:void(0);" style="color: #fff;"><?php echo $type; ?></a></span>
														</div>
														<p class="texing" style="text-align: justify;"><?php echo $college_details = substr($college_details, 0, 200); ?>...</p>
													</div>
												</div>
											</div>
											<div class="job-item-list-bottom">
												<div class="row">
												<div class="col-sm-7 col-md-8">
												<div class="sub-category">
												<?php 
													$sql_curs =mysqli_query($bd,"SELECT `course_name`,`course_short_name`,`course_type` FROM `course_details` WHERE `college_id`='$college_ids'");
													while($query_res=mysqli_fetch_array($sql_curs)){
												?>
													<a href="javascript:void(0);" data-toggle="tooltip" title="<?php echo $query_res['course_type'];?>"><?php echo $query_res['course_short_name']; ?></a>	
												<?php } ?>															
														</div>
														</div>

													
													<div class="col-sm-5 col-md-4">
														<a href="college_details.php?pass=<?php echo $college_ids; ?>" class="btn btn-primary">View More</a>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
<?php 
 }
     $response["success"] = 1;
    }
else{
		echo "<script>window.location.href='nodetails_found.php'</script>";
}
}
 else {
    if ($country != '' && $course != '') {
        $authentication_check = "SELECT college_id FROM `course_details` WHERE country_id='$country' AND course_name='$course'";
    } elseif ($country != '') {
        $authentication_check = "SELECT college_id FROM `course_details` WHERE country_id='$country'";
    } elseif ($course != '') {
        $authentication_check = "SELECT college_id FROM `course_details` WHERE course_name='$course'";
    }
    $result1 = mysqli_query($bd, $authentication_check);

    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $colleges = $row1["college_id"];
            $authentication_checks = "SELECT * FROM `college` WHERE college_id='$colleges'";
            $result2 = mysqli_query($bd, $authentication_checks);
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $college_name = $row2["college_name"];
                    $country_name = $row2["country_id"];
                    $authentication_checks1 = "SELECT * FROM `country` WHERE country_id='$country_name'";
					
                    $result3 = mysqli_query($bd, $authentication_checks1);
                    $row3 = mysqli_fetch_assoc($result3);
                    $country_name = $row3["country_name"];
                    $country_image = "http://epictech.in/winya/admin/images/country/" . $row3["flag"];
                    $college_photo = "http://epictech.in/winya/admin/images/colleges/" . $row2["college_photo"];
                    $college_address = $row2["college_address"];
                    $founded_year = $row2["founded_year"];
                    $type = $row2["type"];
                    $intake = $row2["intake"];
					
                    $college_detail = $row2["college_details"];
                    $college_detaile = preg_replace("/[^A-Za-z0-9\-]/", " ", $college_detail);
					?>
						<div class="result-list-wrapper">
									<div class="job-item-list featured">
										<div class="image">
											<img src="<?php echo $college_photo; ?>" alt="college logo" />
										</div>
										<div class="content">
											<div class="job-item-list-info">
												<div class="row">
													<div class="col-sm-7 col-md-8">
														<h4 class="heading"><?php echo $college_name; ?></h4>
														<div class="meta-div clearfix mb-25">
															<span>at <a href="javascript:void(0);"> <?php echo $country_name; ?> </a></span>
															<span class="job-label label label-success"><a href="javascript:void(0);" style="color: #fff;"><?php echo $type; ?></a></span>
															
														</div>
														<p class="texing" style="text-align: justify;"><?php echo $college_detaile = substr($college_detaile, 0, 200); ?>...</p>
													</div>
												</div>
											</div>
											<div class="job-item-list-bottom">
												<div class="row">
													<div class="col-sm-7 col-md-8">
														<div class="sub-category">
														
															<?php 
													$sql_curs =mysqli_query($bd,"SELECT `course_name`,`course_short_name`,`course_type` FROM `course_details` WHERE `college_id`='$colleges'");
													while($query_res=mysqli_fetch_array($sql_curs)){
												?>
													<a href="javascript:void(0);" data-toggle="tooltip" title="<?php echo $query_res['course_type'];?>"><?php echo $query_res['course_short_name']; ?></a>	
												<?php } ?>
														</div>
													</div>
													<div class="col-sm-5 col-md-4">
														<a href="college_details.php?pass=<?php echo $colleges; ?>" class="btn btn-primary">View More</a>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
					<?php

                } 
				}
            }
        
        $response["success"] = 1;
    } else {

      
        echo "<script>window.location.href='nodetails_found.php'</script>";
    }
} 
?>								
								
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

</body>

</html>