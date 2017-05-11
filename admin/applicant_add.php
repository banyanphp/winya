<?php
include("fckeditor.php");

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

        <title>Winya Add Courses </title>
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
            .errors{
                color:red;
            }
            .success{
                color:green;
            }
            label[for=gender]
            {
            }
        </style>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"> <span>Winya Education</span></a>
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
                                <h3>Add Application</h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_content">
                                        <br />
                                        <form id="applicant" data-parsley-validate class="form-horizontal form-label-left" action="add_applicant_process.php" method="post" >
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Select Country  <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">


                                                    <select id="app_cuntry" class="form-control" name="app_cuntry"  required="required" onchange="getclgVal(this.value);">	
                                                        <option value=""> Select Country</option>
                                                        <?php
                                                        $sqls = mysqli_query($bd, "SELECT * FROM `country`");
                                                        while ($cuntry = mysqli_fetch_array($sqls)) {
                                                            $cuntry_name = $cuntry['country_name'];
                                                            $cuntry_id = $cuntry['country_id'];
                                                            ?>

                                                            <option value="<?php echo $cuntry_id; ?>"> <?php
                                                                echo $cuntry_name;
                                                            }
                                                            ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">University Name <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                    <select id="university_name" class="form-control" name="university_name" onchange="getNewVal(this.value);" required="required">
                                                        <option value=""> Select University</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Course <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="form-control" id="app_course" name="app_course" onchange="getcourseVal(this.value);" required="required">
                                                        <option value="">Choose Your Course </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Type of Duration <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="form-control" id="type_course" name="type_course" onchange="getcourseAmt(this.value);" required="required">
                                                        <option value="">Choose Your Course Type</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="test">

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Amount</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="course_amt" name="course_amt" class="form-control col-md-7 col-xs-12"  required="required"> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Initial Payment</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="initial_amt" name="initial_amt" class="form-control col-md-7 col-xs-12" required="required"> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" > First Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Last Name <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="last_name" name="last_name"  required="required"  class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Email <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="mail" name="mail"  required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Gender <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="check-box">
                                                        <input type="radio" value="Male" class=""  name="gender"> Male
                                                        <input type="radio" value="Female"   class="" required="required"  name="gender">Female
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Contact Number <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="cont_no" name="cont_no"  required="required"  class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">secondary Contact Number <span class="required"></span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="sec_cont_no" name="sec_cont_no" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Address Line 1 <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="addr1" name="addr1"  required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Address Line 2</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="addr2" name="addr2" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div><div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">City <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="city" name="city" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div><div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">State <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="stat" name="stat"  required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Pin Contact <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="pin" name="pin" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Resident Country <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="resident_count"  required="required" name="resident_count" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <?php
                                            $sql = mysqli_query($bd, "SELECT * FROM `tbl_add_fields`");
                                            $count = mysqli_num_rows($sql);
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $post = $row['field_name'];
                                                ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country"> <?php echo $post; ?><span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" required="required" name="<?php echo $post; ?>" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="ln_solid"></div>
                                            <center> <span id="errors" class="errors"></span><br>
                                                <span id="success" class="success"></span></center><br><br>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 pull-right">

                                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                                    <button id="add_colleges" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php include 'footer.php'; ?>
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

        <!-- Autosize -->
        <script src="vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="vendors/starrr/dist/starrr.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>
        <script src="js/editor.js"></script>
        <script src="jquery.validate.min.js"></script>
        <script src="js/application/get_college.js"></script> 


        <script type="text/javascript">
                                                                $().ready(function () {
                                                                    $.validator.addMethod("alphabetOnly", function (value, element) {
                                                                        return this.optional(element) || /^[a-z\-\s]+$/i.test(value);
                                                                    }, "Text must contain only alphabets.");

                                                                    $.validator.addMethod("alphabnumeric", function (value, element) {

                                                                        return this.optional(element) || /^[A-Za-z0-9\s]*$/.test(value) // consists of only these
                                                                                && /[a-z]/.test(value) // has a lowercase letter
                                                                                && /\d/.test(value) // has a digit;
                                                                    }, "Text must contain only alphabnumeric");

                                                                    $.validator.addMethod("numberOnly", function (value, element) {
                                                                        return this.optional(element) || /^[0-9\s]+$/i.test(value);
                                                                    }, "Text must contain only numbers.");

                                                                    $.validator.addMethod("mobile", function (value, element) {
                                                                        return this.optional(element) || /^[0-9\-\+\s]+$/i.test(value);
                                                                    }, "Plese give the correct patten number");

                                                                    jQuery.validator.addMethod("laxEmail", function (value, element) {
                                                                        // allow any non-whitespace characters as the host part
                                                                        return this.optional(element) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,123})$/.test(value);
                                                                    }, 'Please enter a valid email address.');


                                                                    $("#applicant").validate({
                                                                        rules: {
                                                                            first_name: {
                                                                                required: true,
                                                                                alphabetOnly: true
                                                                            },
                                                                            cont_no: {
                                                                                required: true,
                                                                                mobile: true,
                                                                                maxlength: 12,
                                                                                minlength: 10,
                                                                            },
                                                                            sec_cont_no: {
                                                                                required: true,
                                                                                mobile: true,
                                                                                maxlength: 12,
                                                                                minlength: 10,
                                                                            },
                                                                            pincode: {
                                                                                required: true,
                                                                                numberOnly: true,
                                                                                maxlength: 10
                                                                            },
                                                                            course_amt: {
                                                                                required: true,
                                                                                numberOnly: true,
                                                                            },
                                                                            initial_amt: {
                                                                                required: true,
                                                                                numberOnly: true,
                                                                            }

                                                                        },
                                                                    });
                                                                });


        </script>

