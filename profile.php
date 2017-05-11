<?php 
session_start();
include("admin/include/config.php");

$usr_id = $_SESSION['register_id'];
$usr_mail =$_SESSION['user'];
$usr_name = $_SESSION['usr_name'];
if($_SESSION['register_id']= ''){
	echo "<script>window.location.href='index.php'</script>";
}
$sq_usrdata=mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `tbl_application` WHERE `applicant_mail` ='$usr_mail'"));
 $aplicnt_id = $sq_usrdata['applicant_invoice'];
//exit();
$sq_register=mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `registration` WHERE `email`='$usr_mail'"));
$photos = $sq_register['photo'];
$cntry = $sq_usrdata['applicant_stdy_cuntry'];
$curse_id = $sq_usrdata['applicant_course_id'];
$clg_id = $sq_usrdata['applicant_univercity'];
$sq_cntry=mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `country` WHERE `country_id`='$cntry'"));
$sq_curse=mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `course_details` WHERE `course_id`='$curse_id' AND `college_id`='$clg_id'"));
$sq_clg =mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `college` WHERE `college_id`='$clg_id' AND `country_id`='$cntry'"));

?>
<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>Winya Education | Profile </title>
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
	<style>
		#error_login{
			color:red;
		}
	</style>
</head>

<body class="not-transparent-header">

	<!-- start Container Wrapper -->
	<div class="container-wrapper">

		<!-- start Header -->
		<?php include 'profile_header.php'; ?>
		<!-- start Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- start breadcrumb -->
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="javascript:void(0);">Profile</a></li>
						<li><span>View</span></li>
						<li></li>
					</ol>
					
				</div>
				
			</div>
			<!-- end breadcrumb -->
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-sm-5 col-md-4">
							
								<div class="employee-detail-sidebar">
										
									<div class="section-title mb-30">
								
									</div>
									
									<center>
									<?php
										if($photos == ''){
											?>
											<div class="image">
										<img src="applicant_img/img.png" alt="image" class="img-circle" />
									</div>
									<?php 
										} else{
									?>
									<div class="image">
										<img src="<?php echo $photos; ?>" alt="image" class="img-circle" />
										</div><?php } ?></center>
									
									<h3 class="heading mb-15"><?php echo $usr_name; ?></h3>
								
									<p class="location"><i class="fa fa-map-marker"></i> <?php echo $sq_usrdata['applicant_addr1']; ?> ,<?php echo $sq_usrdata['applicant_addr2'];  ?><span class="block"><i class="fa fa-phone"></i> <?php echo $sq_register['phone_no']; ?></span></p>
									
									<ul class="meta-list clearfix">
										<li>
											<h4 class="heading">Country:</h4>
											<?php echo $sq_usrdata['applicant_cuntry']; ?>
										</li>
										<li>
											<h4 class="heading">Applied Country:</h4>
											<?php echo $sq_cntry['country_name']; ?>
										</li>
										<li>
											<h4 class="heading">Course:</h4>
											<?php echo $sq_curse['course_name']; ?>
										</li>
										<li>
											<h4 class="heading">Email:</h4>
											<?php echo $usr_mail; ?>
										</li>
									</ul>
									
									
									<a href="#profile" data-toggle="modal" class="btn btn-primary mt-5"><i class="fa fa-pencil-square-o mr-5"></i>Edit</a>
									
								</div>
								<!-- modal -->
			<div id="profile" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
				<form enctype="multipart/form-data" method="POST" name="theform" enctype="multipart/form-data" onsubmit="return validateForm()">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center" style="text-transform:uppercase;font-weight: 500;">update Your Image</h4>
				</div>
			
				<div class="modal-body">
					<div class="row gap-20">
						<div class="col-sm-12 col-md-12">
							 <?php 
										
											if(isset($_POST['img_submit'])){
												
												
												move_uploaded_file($_FILES['file']['tmp_name'],"applicant_img/".$_FILES['file']['name']);
												$upl="applicant_img/".$_FILES['file']['name'];
												
													$sql= mysqli_query($bd,"UPDATE `registration` SET `photo`='$upl' WHERE `email`='$usr_mail'");
														if($sql){
															echo "<script>window.location.href='profile.php'</script>";
													}
											}
										if($photos == ''){
											?>
											<div class="form-group">
								<label for="form-register-photo-2">Photo</label>
								<img src="applicant_img/img.png" class="img-responsive" width="100px" height="100px" alt="upload Your photo"><br>
									<input type="file" name="file" id="file" onchange="return validate_small()">
							</div>
							<?php } 
							else { ?>
							
							<div class="form-group">
								<label for="form-register-photo-2">Photo</label>
								<img src="<?php echo $photos; ?>" class="img-responsive" width="100px" height="100px" alt="upload Your photo"><br>
									<input type="file" name="file" id="file" onchange="return validate_small()">
							</div>
							<?php } ?>
							<center> <span id="error_login"></span></center>
						</div>
					</div>
				</div>
				
				<div class="modal-footer text-center">
					<button type="submit" name="img_submit" id="img_submit" class="btn btn-primary">Save</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				
				</form>
			</div>
			<!-- modal -->
					
					
							</div>
							
							<div class="col-sm-7 col-md-8">
							
								<div class="company-detail-wrapper">

									<h3><?php echo $sq_clg['college_name']; ?></h3>
									
									<p style="text-align:justify;"><?php  $clg_detail=$sq_clg['college_details'];
											echo $clg_detail = preg_replace("/[^A-Za-z0-9\-]/", " ", $clg_detail); ?> </p>
									<div class="row">
									
										<div class="col-sm-6">
										
											<h3>Progressing Your Detais</h3>
											<ul class="employee-detail-list">
											<?php
                                            $fetch_query1 = mysqli_query($bd,"select * from process_table where application_id=$aplicnt_id and is_completed=1");
                                            while ($fetch_timeline1 = mysqli_fetch_array($fetch_query1)) {
                                                $ids = $fetch_timeline1['time_line_id'];
                                                $ids2[] = $fetch_timeline1['time_line_id'];
                                            $fetch_query2 = mysqli_query($bd,"select * from timeline where status='1' and country_id=$cntry and college_id=$clg_id and course_id=$curse_id and timeline_id= $ids");
                                                while ($fetch_data = mysqli_fetch_array($fetch_query2)) {
                                                    $timeline_name=$fetch_data['timeline_name'];
                                                    
                                                    ?>
												<li>
													<h5 style="font-size: 16px;"><?php echo ucfirst($timeline_name) ?> </h5>
													<p class="text-muted font-italic">Completed on &nbsp;&nbsp; <span class="font600 text-primary"> <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;<?php echo $fetch_timeline1['completed_date'] ?></span></p>

												</li>
												   <?php
                                                }
                                            }
                                            ?> 
											
<?php
$q1=mysqli_query($bd,"select * from timeline where status='1' and country_id=$cntry and college_id=$clg_id and course_id=$curse_id ");
$timeline_count=  mysqli_num_rows($q1);

 $q2=mysqli_query($bd,"select * from process_table where application_id=$aplicnt_id and is_completed=1");
$process_table_count=  mysqli_num_rows($q2);
if($process_table_count!=$timeline_count){
                                                $fetch_query1 = mysqli_query($bd,"select * from process_table where application_id=$aplicnt_id  and is_completed=0");
												//echo "select * from process_table where application_id=$aplicnt_id  and is_completed=0";
                                                while ($fetch_timeline1 = mysqli_fetch_array($fetch_query1)) {
                                                    //     $ids1=     $fetch_timeline1['time_line_id'];

                                                    $ids1 = $fetch_timeline1['time_line_id'];
                                                    $date = $fetch_timeline1['completed_date'];
													
                                                
                                                // print_r($ids1);
                                                $q = "select * from timeline where status='1' and country_id=$cntry and college_id=$clg_id and course_id=$curse_id and timeline_id =$ids1";
												//echo "select * from timeline where status='1' and country_id=$cntry and college_id=$clg_id and course_id=$curse_id and timeline_id =$ids1";
                                                $fetch_query2 = mysqli_query($bd,$q);
                                                while($fetch_data = mysqli_fetch_array($fetch_query2)){
                                                ?> 
												<li>
													<h5 style="color:"><?php echo  ucfirst($fetch_data['timeline_name']); ?></h5>
													
													<?php 
														
													if ($date == "0000-00-00") { ?>
													<p class="text-muted font-italic">Expected To complete on &nbsp;<span class="font600 text-primary"><i class="fa fa-calendar" aria-hidden="true" style="color:#ed8439;"></i> <?php echo $fetch_timeline1['expected_date']; ?></span></p>
													 <?php } ?>
												</li>
<?php } } }?>
												
											</ul>
											
										</div>
										
									</div>
									
								</div>

							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>
	<?php include('footer.php'); ?>
		
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
<script>
function validateForm() {
    var x = document.forms["theform"]["file"].value;
    if (x == "") {
        $('#error_login').html('Choose Image');
        return false;
    }
}
</script>

		<script type="text/javascript">
function validate_small() {
    //Get reference of FileUpload.
    var fileUpload = document.getElementById("file");
 
    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    //alert(height+"-"+width);
 
                    if (height != 600 || width != 600) {
                        $('#error_login').html('please upload a image as width is 200 and height is 300');
						document.getElementById('file').value='';
                        return false;
                    }
                //    alert("Uploaded image has valid Height and Width.");
                  //  return true;
                };
 
            }
        } else {
            alert("This browser does not support HTML5.");document.getElementById('file').value='';
            return false;
        }
    } else {
        alert("Please select a valid Image file.");document.getElementById('file').value='';
        return false;
    }
}
</script>




</body>



</html>