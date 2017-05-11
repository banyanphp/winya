<?php 
	@include 'admin/include/config.php';
	?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Winya Education</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/ico/favicon.png">

	<!-- CSS Font Icons -->
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

	</head>
<body class="home">
	<div id="introLoader" class="introLoading"></div>
	<div class="container-wrapper">
		<?php @include 'header.php'; ?>
		<div class="main-wrapper">
		
			<div class="hero" id="detail-content-sticky-nav-a" style="background-image:url('images/hero-header/01.jpg');">
				<div class="container">

					<h1>your future starts here now</h1>
					<p>Find  Cources more 1000+ available </p>

					<div class="main-search-form-wrapper">
					
						<form name="srch_clg" action="colleges.php">
					
							<div class="form-holder">
								<div class="row gap-0">
								
									<div class="col-xss-6 col-xs-6 col-sm-6">
										<div class="dropdown">
    <select class="form-control dropdown-toggle" name="val" id="cuntry_name" data-toggle="dropdown">
    <span class="caret"></span>
    <option style="color: #555;" value=""> Choose Country</option>
	<?php 
		$cuntry =mysqli_query($bd,"SELECT `country_name`,`country_id` FROM `country` WHERE `status`='1'"); 
			while($res=mysqli_fetch_array($cuntry)){
		?>
		<option style="color: #555;" value="<?php echo $res['country_id']; ?>"><?php echo $res['country_name']; ?></option>
     <?php } ?>
</select>
  </div>
  <style>
  .open > .dropdown-menu {
	width: 100%;
    background-color: #ff;
    opacity: 0.7;
	}
	.war{
		color:red;
	}
  </style>
									</div>
									
									<div class="col-xss-6 col-xs-6 col-sm-6">
									<input type="text"  class="form-control search-box" id="search-box" name="curs_nam" autocomplete="off" placeholder="Search for courses" />
									<span id="suggesstion-box"></span>
									</div>
									
									
									
								</div>
							</div>
							
							<div class="btn-holder">
								<button class="btn" type="button" id="srch_submit"><i class="ion-android-search"></i></button>
							</div>
							
						</form>
					
					</div>
				<center><span id="dialog" class="war"></span></center>

				</div>
				
			</div>
			
			<!-- end hero-header -->
			
			<div class="post-hero" id="detail-content-sticky-nav-b">
			
				<div class="container">
					
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							
							<div class="ticker-wrapper">
				
								<div class="latest-job-ticker ticker-inner">
									
									
									<ul class="ticker-list">
										<li>
											<a href="#">
												Not sure what course you want to study?
												<span class="labeling">Get Started</span>
												
											</a>
										</li>
										<li>
											<a href="#">
												<span class="labeling">Latest Cources</span>
												<span class="labeling">Get Started</span>
											</a>
										</li>
										<li>
											<a href="#">
												Not sure what course you want to study?
												<span class="labeling">Get Started</span>
												
											</a>
										</li>
										<li>
											<a href="#">
												Not sure what course you want to study?
												<span class="labeling">Get Started</span>
												
											</a>
										</li>
										<li>
											<a href="#">
												Not sure what course you want to study?
												<span class="labeling">Get Started</span>
												
											</a>
										</li>
									</ul>
								</div>
							</div>
							
							
						</div>
					
					</div>
				
				</div>
			
			</div>

			<div class="bg-light pt-40 pb-10" id="detail-content-sticky-nav-c">
			<div class="container">
				
					<div class="row">
						
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title mb-50">
							
								<h2>Where do you want to study?</h2>
								</div>
						
						</div>
					
					</div>
					
					<div class="post-grid-wrapper">
					
						<div class="row">
						
							<div class="col-sm-push-2 col-sm-4">
							
								<div class="post-grid-item">
								
									<div class="image">
									
										<div class="overlay-box">
										
											<a href="#">
												<img src="country/australia.jpg" alt="image" style="height:200px"/>
												<div class="image-overlay">
													<div class="overlay-content">
														<div class="overlay-icon">Australia</div>
													</div>
												</div>
											</a>
										
										</div>
										
										<div class="post-grid-meta clearfix text-center">
											<div class="text-center">Australia</div>
											
										</div>
										
									</div>
																
								</div>
								
							</div>
						
						
							<div class="col-sm-push-2 col-sm-4 col-sm-4">
							
								<div class="post-grid-item">
								
									<div class="image">
									
										<div class="overlay-box">
										
											<a href="#">
												<img src="country/New-Zealand.jpg" alt="Newzealand" style="height:200px"/>
												<div class="image-overlay">
													<div class="overlay-content">
														<div class="overlay-icon">New Zealand</div>
													</div>
												</div>
											</a>
										
										</div>
										
										<div class="post-grid-meta clearfix text-center">
											<div class="text-center">Newzealand</div>
											
										</div>
										
									</div>
																
								</div>
								
							</div>
						
						</div>
						
					</div>
					
				</div>
				</div>
				

			<div class="bg-light pt-80 pb-50" id="detail-content-sticky-nav-d">
			
				<div class="container">

					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							<h2>Top Courses</h2>
							</div>
						
						</div>
					
					</div>
					
					<div class="row">
				<style type="text/css">
				.img { height:200px; } .featured-icon-png { height:460px; } </style>				
						<div class="col-sm-4 mb-30">
							
							<div class="featured-icon-png">
								
								<div class="image">
									<img class="img" src="courses/hospitality.jpg" alt="Hospitality Management" />
								</div>
								
								<h5>Diploma in Applied Hospitality Management </h5>
<div class="pull-left">
<i class="fa fa-calendar"></i>
Feb, May, Aug, Nov
</div><div>
<i class="fa fa-clock-o"></i>
18 Months
</div>
								<a href="#">View</a>
								
							</div>
						
						</div>
						
						<div class="col-sm-4 mb-30">
							
							<div class="featured-icon-png">
								
								<div class="image">
									<img class="img" src="courses/NURSE.jpg" alt="Bachleor of Nursing" />
								</div>
								
								<h5>Bachleor of Nursing</h5>
				<div class="pull-left">
				<i class="fa fa-calendar"></i>
				Feb, July
				</div><div>
				<i class="fa fa-clock-o"></i>
				3 Years
				</div>
								<a href="#">View</a>
								
							</div>
						
						</div>
						
						<div class="col-sm-4 mb-30">
							
							<div class="featured-icon-png">
								
								<div class="image">
									<img class="img" src="courses/MBA.jpg" alt="Master of Management" />
								</div>
								
								<h5>Master of Management</h5>
								<div class="pull-left">
<i class="fa fa-calendar"></i>
Feb, May, Aug, Nov
</div><div>
<i class="fa fa-clock-o"></i>
18 Months
</div>
								<a href="#">View</a>
								
							</div>
						
						</div>
					
					</div>

				</div>

			</div>
			<div class="pt-40 pb-10" id="detail-content-sticky-nav-e">
				<div class="container">
<div class="row">
						
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title mb-50">
							
								<h2>How We Work</h2>
								
							</div>
						
						</div>
					
					</div>
				
				    <div class="work-expereince-wrapper">
				
											<div class="work-expereince-block">

												<div class="work-expereince-content">
													<h5>Search your course</h5>
													<p>Browse through the courses available and reach out to our counceller for a free appointment.</p>
												<div class="text-center">
<a class="btn btn-primary">Step 1</a>
</div></div> 
											</div> 
											
											<div class="work-expereince-block">

												<div class="work-expereince-content">
													<h5>Free Career Advice</h5>
													<p>Our counsellor will guide you select the right course, assist in loans, scholarships and filling the application. Our offshore team will followup on the application and keep you updated on the progress.</p>						
												<div class="text-center">
<a class="btn btn-primary">Step 2</a>
</div>
												</div> 
												
											</div> 
											
											<div class="work-expereince-block">

												<div class="work-expereince-content">
													<h5>Free Visa, Travel Assistance</h5>
													<p>Once the offer is issued by the institution, we provide free visa assistance, ticket booking, lodging and transport in India.</p>	
												<div class="text-center">
<a class="btn btn-primary">Step 3</a>
</div>
												</div> 
												
											</div> 
											
											<div class="work-expereince-block">

												<div class="work-expereince-content">
													<h5>Free Offshore Support Services</h5>
													<p>Once you have landed in New Zealand, our offshore team will support you on the airport pickup, accomodation & food assistance, job search assistance and alumni support..</p>
													<div class="text-center">
<a class="btn btn-primary">Step 4</a>
</div>
												</div> 
												
											</div> 
										</div>
										
										</div>
										</div>

			<?php include'footer.php'; ?>
			
		</div>
		
	</div>
 
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


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

<script type="text/javascript" src="js/jquery-multiple-sticky.js"></script>

<!-- auto complete -->
<script type="text/javascript" src="js/auto/autocomplete.js"></script>
<script type="text/javascript" src="js/auto/serch_submit.js"></script>

<script src="js/login_validation.js"></script>
</body>
</html>