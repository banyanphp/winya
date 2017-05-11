<?php error_reporting('0'); ?><style>
.error_login{
	color:red;
}.error_login1{
	color:red;
}.error_login2{
	color:red;
}
.errors{
	color:red;
}
</style>
<header id="header">
			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="index.php"><img src="WinYa-Education-logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
								<a href="index.php">Home</a>
							</li>
							
							
							<li>
								<a href="#">Courses</a>
								
							</li>
							<li>
								<a href="#">How We Work</a>
								
							</li>
							
							<li>
								<a href="#">Services</a>
								
							</li>
							
							<li>
								<a href="#">Online Enquiry</a>
						
							</li>
							<li>
								<a href="#">Contact</a>
						
							</li>

						</ul>
				
					</div><!--/.nav-collapse -->

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
<?php session_start();if(!isset($_SESSION['user'])){ ?>
							<li><a data-toggle="modal" href="#loginModal">login</a></li><?php } 
else{ ?><li><a href="profile.php">My Account</a></li><li><a href="logout.php">log out</a></li><?php } ?>
							<!--<li><a data-toggle="modal" href="#registerModal">register</a></li>-->
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->
		<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			<form name="from_login" id="from_login">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center" style="text-transform:uppercase;font-weight: 500;">Sign-in into your account</h4>
				</div>
				
				<div class="modal-body">
					<div class="row gap-20">
					
					
						
						<div class="col-sm-12 col-md-12">
				
							<div class="form-group"> 
								<label>Email</label>
								<input class="form-control" placeholder="Enter Mail" name="usr_name" id="usr_name" type="text"> 
							</div>
							<span class="error_login1"></span>
						
						</div>
						
						<div class="col-sm-12 col-md-12">
						
							<div class="form-group"> 
								<label>Password</label>
								<input class="form-control" placeholder="Enter Password" name="usr_pass" id="usr_pass" type="password"> 
							</div>
							<span class="error_login2"></span>
						
						</div>
						
						
						<div class="col-sm-8 col-md-8">
							<div class="login-box-link-action">
								<a data-toggle="modal" href="#forgotPasswordModal">Forgot password?</a> 
							</div>
						</div>
						
					</div>
				</div>
				<center><span class="error_login" id="error_login"></span></center>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-primary" name="login_submit" id="login_submit">Login</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				</form>
			</div>
			
			<!-- start Sign-in Modal -->
			
			<!-- start Forget Password Modal -->
			<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
				<form action="snd_mail.php" name="forgot_pass_form" id="forgot_pass_form" method="POST" onsubmit="return validateForm()">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Restore your forgotten password</h4>
				</div>
				
				<div class="modal-body">
					<div class="row gap-20">
						
						<div class="col-sm-12 col-md-12">
							<p class="mb-20"></p>
						</div>
						
						<div class="col-sm-12 col-md-12">
				
							<div class="form-group"> 
								<label>Email Address</label>
								<input class="form-control" placeholder="Enter your email address" name="mail" id="mail" type="text"> 
								<span class="errors" id="errors"></span>
							</div>
							
						
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="login-box-box-action">
								Return to <a data-toggle="modal" href="#loginModal">Log-in</a>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="modal-footer text-center">
					<button type="submit" class="btn btn-primary" id="forgot_passwdes" name="forgot_passwdes">Submit</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				</form>
				
			</div>
			<!-- end Forget Password Modal -->
			
		</header>
			<script type="text/javascript">
function validateForm() {
    var x = document.forms["forgot_pass_form"]["mail"].value;
    if (x == "") {
        $('#errors').html('Enter E-mail address');
        return false;
    }
	if (x != '') {
       var y = $("#mail").val();
            var atpos = y.indexOf("@");
            var dotpos = y.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                $('#errors').html('Enter vaild Email address');
                $("#mail").focus();
                return false;
            }
    }
		
}
	</script>