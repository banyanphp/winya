<?php
include ("session/session.php");
include ("include/config.php");
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
        <link rel="shortcut icon" href="images/img.jpg">
        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- starrr -->
        <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
        <style>
            .icheckbox_flat-green.checked.disabled{
                background-color: #1ABC9C !important;
            }
        </style>
    </head>


    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><span>Winya Education</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->

                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <?php include'sidebar.php' ?>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->

                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <?php include'top.php' ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Application Status</h3>
                            </div>
  <div class="pull-right">		   
                                <button type="button" data-toggle="modal" data-target=".bs-example-modal-form" class="btn btn-info">+ Add Amount</button> 
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <?php
                                    $id = $_GET['id'];
                                    $fetch_application = mysqli_fetch_array(mysqli_query($bd, "select * from tbl_application where applicant_id=$id"));
                                    $country_id = $fetch_application['applicant_stdy_cuntry'];
                                    $college_id = $fetch_application['applicant_univercity'];
                                    $course_id = $fetch_application['applicant_course_id'];
                                    $user_id = $fetch_application['applicant_firstname'];
                                    $invoice_id = $fetch_application['applicant_invoice'];
                                    $applicant_course_amt = $fetch_application['applicant_course_amt'];
                                    $applicant_paymnt = $fetch_application['applicant_paymnt'];
                                    $fetch_college = mysqli_fetch_array(mysqli_query($bd, "select * from college where college_id= $college_id"));
                                    $fetch_country = mysqli_fetch_array(mysqli_query($bd, "select * from country where country_id= $country_id"));
                                    $fetch_course = mysqli_fetch_array(mysqli_query($bd, "select * from course_details where course_id= $course_id"));
                                    ?>
                                    <div class="x_content">
                                        <br />
                                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Applicant Name </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="applicant" class="form-control" disabled="disabled" placeholder="Disabled Input" value="<?php echo $user_id; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Country Name </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" value="<?php echo $fetch_country['country_name']; ?>" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">College Name </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" value="<?php echo $fetch_college['college_name']; ?>" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" disabled="disabled" placeholder="Disabled Input" value="<?php echo $fetch_course['course_name']; ?>" >
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>
                                            <div class="page-title">
                                                <div class="title_left">
                                                    <h3>Status</h3>
                                                </div>



                                            </div>
                                            <div class="col-md-12 text-center">
                                                <span id="error" style="color:#ff0000;text-align: center" ></span>   
                                            </div>

                                            <?php
                                            $fetch_query1 = mysqli_query($bd, "select * from process_table where application_id=$invoice_id and is_completed=1");

                                            while ($fetch_timeline1 = mysqli_fetch_array($fetch_query1)) {
                                                $ids = $fetch_timeline1['time_line_id'];
                                                $ids2[] = $fetch_timeline1['time_line_id'];
                                                $fetch_query2 = mysqli_query($bd, "select * from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id and timeline_id= $ids ");
                                                while ($fetch_data = mysqli_fetch_array($fetch_query2)) {
                                                    $timeline_name = $fetch_data['timeline_name'];
                                                    ?>
                                                    <div class="form-group" id="grid_GridHeader">

                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="squaredTwo"><?php echo ucfirst($timeline_name) ?></label>


                                                        <div style="margin-top:10px">
                                                            <input type="checkbox"  class="flat" checked="checked" disabled="disabled" id="timelines" value="<?php echo $ids ?>">&nbsp;Completed
                                                            <span style="float:right">Completed on &nbsp;&nbsp;<?php echo $fetch_timeline1['completed_date'] ?></span>
                                                        </div>

                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?> 
                                            <?php
                                            $q1 = mysqli_query($bd, "select * from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id ");
                                            $timeline_count = mysqli_num_rows($q1);

                                            $q2 = mysqli_query($bd, "select * from process_table where application_id=$invoice_id and is_completed=1");
                                            $process_table_count = mysqli_num_rows($q2);
                                            if ($process_table_count != $timeline_count) {
                                                ?>
                                                <div class="form-group" id="grid_GridHeader">                   
                                                    <?php
                                                    $q3="select * from process_table where `application_id`='$invoice_id'  and `is_completed`='0'";
                                                    $fetch_query1 = mysqli_query($bd, $q3);

                                                    while ($fetch_timeline1 = mysqli_fetch_array($fetch_query1)) {

                                                        $ids1 = $fetch_timeline1['time_line_id'];
                                                        $date = $fetch_timeline1['expected_date'];
                                                    }
                                                    // print_r($ids1);
                                                   $q = "select * from timeline where `status`='1' and `country_id`='$country_id' and college_id='$college_id' and `course_id`='$course_id' and `timeline_id` ='$ids1'";
                                                    $fetch_query2 = mysqli_query($bd, $q);
                                                    $fetch_data = mysqli_fetch_array($fetch_query2);
                                                    ?>        <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="squaredTwo"><?php echo ucfirst($fetch_data['timeline_name']); ?></label>



                                                    <input type="checkbox" name="timeline_id" style="width:20px;height:20px"  id="timeline" value="<?php echo $fetch_data['timeline_id'] ?>" class="input-assumpte"> &nbsp;<span>Completed</span>


                                                    <?php if ($date == "0000-00-00") { ?>


                                                        <div class="col-md-3 xdisplay_inputx form-group has-feedback" style="float:right" id="dates">
                                                            <input type="text" class="form-control has-feedback-left" onmouseover="bigimg()" id="single_cal1" name="expected_end"  placeholder="Expected End Date" aria-describedby="inputSuccess2Status">
                                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                        </div>


                                                    <?php } else { ?>
                                                        <span style="float:right;">Expected To complete on &nbsp;&nbsp;<?php echo $date ?></span>

                                                    <?php } ?>
                                                    <span id="view_application" style="float:right"></span>    
    <span id="expecteddate" style="float:right"></span>      <span id="currentdate" ></span>   
                                                </div>




                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 pull-right">
                                                        <input type="hidden" value="<?php echo $country_id ?>" name="country_id" id="country_id">
                                                        <input type="hidden" value="<?php echo $college_id ?>" name="college_id" id="college_id">
                                                        <input type="hidden" value="<?php echo $course_id ?>" name="course_id" id="course_id">
                                                        <input type="hidden" value="<?php echo $invoice_id ?>" name="applicant_id" id="applicant_id">
                                                        <?php
                                                        $count = count($ids2);
                                                        for ($i = 0; $i < $count; $i++) {
                                                            ?>      
                                                            <input type="hidden" value="<?php echo $ids2[$i] ?>" name="test[]" id="test">
                                                        <?php } ?>


                                                        <button type="button" class="btn btn-primary">Cancel</button><?php if ($date == "0000-00-00") { ?>
                                                            <button type="button" class="btn btn-success proceed" id="submit-hide">Submit</button><?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                   <div tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade bs-example-modal-form" id="modal">
                            <div role="document" class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        <h4 id="modalWithForm" class="modal-title">Add Amount</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="store.php?action=add_amount" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                                         
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Total Amount </label>
                                                <input name="types" id="types" disabled="disabled" value="<?PHP ECHO $applicant_course_amt; ?>"  class="form-control">

                                            </div>  
                                               <div class="form-group">
                                                <label for="exampleInputEmail1">Already Payed Amount </label>
                                                <input name="types" id="typesT" disabled="disabled" value="<?PHP ECHO $applicant_paymnt; ?>"  class="form-control">

                                            </div> 
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">To Pay </label>
                                                <input name="types" id="typesTT" disabled="disabled" value="<?PHP ECHO $applicant_course_amt-$applicant_paymnt; ?>"  class="form-control">

                                            </div> 
                                           
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Amount in Rs. </label>
                                                <input name="amount" id="amount" type="text" placeholder="Enter Amount" class="form-control">

                                            </div>  
                                            <div class="pull-right">
                                                <input type="hidden" name="id" value="<?php  echo $_GET['id']?>">
                                                <button type="submit" class="btn btn-success">Submit</button>

                                            </div>
                                            <div style="text-align:center;">
                                                <span id="error_logins" style="text-align:center;color:#ff0000"></span>
                                                <span id="success" style="color:#26B99A"></span>
                                            </div>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>  
                <!-- /page content -->

                <!-- footer content -->
                <?php include 'footer.php' ?>
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
        <!-- bootstrap-progressbar -->
        <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="vendors/iCheck/icheck.min.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="js/moment/moment.min.js"></script>
        <script src="js/datepicker/daterangepicker.js"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="vendors/google-code-prettify/src/prettify.js"></script>
        <!-- jQuery Tags Input -->
        <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!-- Switchery -->
        <script src="vendors/switchery/dist/switchery.min.js"></script>
        <!-- Select2 -->
        <script src="vendors/select2/dist/js/select2.full.min.js"></script>
        <!-- Parsley -->
        <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="vendors/starrr/dist/starrr.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>

        <script src="js/timeline.js"></script>
        <!-- bootstrap-daterangepicker -->




        <script>
                                                        $(document).ready(function () {



                                                            $('#single_cal1').daterangepicker({
                                                                singleDatePicker: true,
                                                                calender_style: "picker_1",
                                                            }, function (start, end, label) {
                                                                console.log(start.toISOString(), end.toISOString(), label);
                                                            });

                                                        });
        </script>


        <!-- /bootstrap-daterangepicker -->


        <!-- Cropper -->

        <!-- /Starrr -->
    </body>

</html>