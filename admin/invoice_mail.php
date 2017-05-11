<?php
include ("session/session.php");
include ("include/config.php");
//$sql =mysqli_query($bd,"")
?>
<!DOCTYPE html>
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

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index-2.html" class="site_title"><i class="fa fa-paw"></i> <span>Winya Education</span></a>
                        </div>

                        <div class="clearfix"></div>
                        <!-- sidebar menu -->
                        <?php include 'sidebar.php'; ?>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <?php include 'top.php'; ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Invoice</h3>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-6 col-sm-6 col-xs-6" style="background-color: #221c1e;">
                                            <img src="images/logo_winya.png" class="img-responsive">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#3fb1c4;">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <p style="margin-top: 25px;float:right;color:#feffff;"><?php ?><br>
                                                    INVOICE.NO &nbsp; : #171004 </p>
                                            </div> 
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <h1 style="margin-top: 25px;margin-bottom: 35px;color:#feffff;">INVOICE</h1>
                                            </div> 
                                        </div> 
                                    </div> 

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="dashboard_graph">
                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                    <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                                                    <div style="width: 100%;margin-top:50px;">
                                                        <h2>INVOICE TO :</h2>
                                                        <p><b>Mr.Rahu</b><br>5563 cavetown<br> santa monica<br> Los Angeles, CA.</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4 bg-white" style="margin-top: 50px;">

                                                    <div class="col-md-12 col-sm-12 col-xs-6">
                                                        <div>
                                                            <p style="border: 1px solid #3fb1c4;"><i class="fa fa-map-marker" style="color:#feffff;content: '\f041';padding: 9px;background-color:#3fb1c4;font-size: 15px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"></i> 1/27, Buller Street, Te Aro Wellington 6011.</p>
                                                        </div>
                                                        <div>
                                                            <p style="border: 1px solid #3fb1c4;"><i class="fa fa-envelope-o" style="color:#feffff;padding: 6px;background-color:#3fb1c4;font-size: 15px;"></i> contact@winya.co.nz</p>
                                                        </div>
                                                        <div>
                                                            <p style="border: 1px solid #3fb1c4;"><i class="fa fa-phone"  style="color:#feffff;padding: 8px;background-color:#3fb1c4;font-size: 15px;"></i> +91-98846 21444</p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="dashboard_graph">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>College Name</th>
                                                            <th>Course</th>
                                                            <th>Total Fee</th>
                                                            <th>Paid Fee</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>2000</td>
                                                            <td>2000</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-8 col-sm-8 col-xs-8 pull-left">

                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-2 pull-left" style="border-bottom:1px solid #dddddd;">
                                                        <p>Total</p>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-xs-2 pull-right" style="border-bottom:1px solid #dddddd;">
                                                        <p>Rs.2000</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <br><br>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-10 col-sm-10 col-xs-10 pull-left">

                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-2 pull-left">
                                            <p>Authorized signature</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="col-md-6 col-sm-6 col-xs-6 pull-left">
                                            <p>Conditions apply.please check carefully.</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /page content -->

                <!-- footer content -->
                <?php include('footer.php'); ?>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="vendors/nprogress/nprogress.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>
    </body>

</html>
