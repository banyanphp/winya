<?php
//error_reporting('0');

?><!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Winya Education </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">
  <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="formlogin">
              <h1>Login Form</h1>
              <div>
                <input type="text" id="email_log" name="email" class="form-control" placeholder="Username"/>
              </div>
              <div>
                <input type="password" id="password_log" name="password" class="form-control" placeholder="Password"/>
              </div>
              <div>
                  <div class="error_login" style="color:#ff0000"></div>
                  <button  type="button" class="btn btn-default login_button" id="login_button">Log in</button>
                 
<!--                <a class="reset_pass" href="#">Lost your password?</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
<!--                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Winya Education </h1>
                  <p>©2016 All Rights Reserved. Winya Education </p>
                </div>
              </div>
            </form>
          </section>
        </div>

       
      </div>
    </div>
          <script src="js/form/login_validation.js"></script>
  </body>

</html>

