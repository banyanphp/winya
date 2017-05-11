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
						<div class="multiple-sticky hidden-sm hidden-xs">
						<div class="multiple-sticky-inner">
						<div class="multiple-sticky-container">
						<div class="multiple-sticky-item clearfix">
						<ul class="nav navbar-nav" id="responsive-menu multiple-sticky-menu">
						
							<li>
							
								<a href="#">Home</a>
								
								
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

						</ul>
				
					</div>
					</div>
					</div>
					</div>
					</div><!--/.nav-collapse -->

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
							<li><a data-toggle="modal" href="#loginModal">login</a></li>
							<!--<li><a data-toggle="modal" href="#registerModal">register</a></li>-->
						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

			<!-- start Sign-in Modal -->
			<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Sign-in into your account</h4>
				</div>
				
				<div class="modal-body">
					<div class="row gap-20">
					
					
						
						<div class="col-sm-12 col-md-12">
				
							<div class="form-group"> 
								<label>Username</label>
								<input class="form-control" placeholder="Enter Username" type="text"> 
							</div>
						
						</div>
						
						<div class="col-sm-12 col-md-12">
						
							<div class="form-group"> 
								<label>Password</label>
								<input class="form-control" placeholder="Enter Password" type="password"> 
							</div>
						
						</div>
						
						<div class="col-sm-6 col-md-6">
							<div class="checkbox-block"> 
								<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
								<label class="" for="remember_me_checkbox">Remember me</label>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-6">
							<div class="login-box-link-action">
								<a data-toggle="modal" href="#forgotPasswordModal">Forgot password?</a> 
							</div>
						</div>
						
						<div class="col-sm-12 col-md-12">
							<div class="login-box-box-action">
								No account? <a data-toggle="modal" href="#registerModal">Register</a>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-primary">Log-in</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				
			</div>
			<!-- end Sign-in Modal -->
			
			<!-- start Forget Password Modal -->
			<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
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
								<input class="form-control" placeholder="Enter your email address" type="text"> 
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
					<button type="button" class="btn btn-primary">Submit</button>
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				
			</div>
			<!-- end Forget Password Modal -->
			
		</header>