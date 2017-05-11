<?php
include ("session/session.php");
include ("include/config.php");
if (($_SESSION['permission'] != '1') && ($_SESSION['permission'] != '2')) {
    header('location:page_403.php');
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Winya Add Timeline </title>
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
<?php
$id=$_GET['id'];


$q=  mysqli_query($bd,"select COUNT(timeline_id) as time,country_id,college_id,course_id,timeline_id from timeline where status='1' and course_id='$id' ");
        
        
           while ($fetch_timeline = mysqli_fetch_array($q)) {
                                                    $country_id = $fetch_timeline['country_id'];
                                                    $college_id = $fetch_timeline['college_id'];
                                                    $course_id = $fetch_timeline['course_id'];
 $timeline_id= $fetch_timeline['timeline_id'];
                                                    $fetch_college = mysqli_fetch_array(mysqli_query($bd,"select * from college where college_id= $college_id"));
                                                    $fetch_country = mysqli_fetch_array(mysqli_query($bd,"select * from country where country_id= $country_id"));
                                                    $fetch_course = mysqli_fetch_array(mysqli_query($bd,"select * from course_details where course_id= $course_id"));
                                                    
           } ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Add TimeLine</h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_content">
                                        <br />
                                        <form id="add_timeline" action='store.php?action=timelineadd' method='post' data-parsley-validate  class="form-horizontal form-label-left">


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" disabled id="course_amt" name="course_amt" value="<?php echo $fetch_country['country_name'];?>" class="form-control col-md-7 col-xs-12"  required="required"> 
    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">College/University Name <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                           <input type="text" disabled id="course_amt" name="course_amt" value="<?php echo $fetch_college['college_name'];?>" class="form-control col-md-7 col-xs-12"  required="required"> 
 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Course Name <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" disabled id="course_amt" name="course_amt" value="<?php echo $fetch_course['course_name'];?>" class="form-control col-md-7 col-xs-12"  required="required"> 

                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary add_button"  style="float:right" value="ADD+" ><i class="icon-plus-sign"></i> Add</button>
                                            </div>
                                         <?php  
                                         
                                          $t="select country_id,college_id,course_id,timeline_id from timeline where status='1' and course_id='$id'";
                                         $s=  mysqli_query($bd,"$t");
        
        
           while ($fetch_timeline = mysqli_fetch_array($s)) {?>
                                            <div class="form-group">                                                       

                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">TimeLine</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="text" class="form-control col-md-7 col-xs-12" name="field_name[]"  required value="" />


                                                        
                                                    
                                                </div>
                                            </div> <div class="form-group">                                                       

                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">TimeLine Description</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea class="form-control " name="field_area[]" rows="5" cols="5" required/></textarea>


                                                        
                                                    
                                                </div>
                                            </div>
           <?php } ?>
                                             <div class="form-group">                                                       

<div class="field_wrapper">                                                       
</div>
</div>
                                            

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 pull-right">
                                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                                    <button id="add_colleges"  class="btn btn-success">Submit</button>
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
        <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
        <!-- Autosize -->
        <script src="vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="vendors/starrr/dist/starrr.js"></script>
        <script src="vendors/validator/validator.min.js"></script>
        <script src="vendors/timeline/get_college.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>
        <script src="jquery.validate.min.js"></script>

        <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            var maxField = 1000; //Input fields increment limitation
                                                            var addButton = $('.add_button'); //Add button selector
                                                            var wrapper = $('.field_wrapper'); //Input field wrapper
                                                           var fieldHTML = '<br><div style="margin-left:13px">   \n\
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" \n\
 style="">TimeLine</label><input type="text"  class="form-control" required name="field_name[]"\n\
 value="" style="width: 495px;margin-left: 13px;"/>\n\
\n\   <label class="control-label col-md-3 col-sm-3 col-xs-12" \n\
 style="">TimeLine Description</label><br><textarea rows="5" cols="5" style="width:495px"class="form-control" required name="field_area[]"\n\
 />\n\
<button type="button" class="btn btn-danger remove_button" style="float:right;margin-right: 157px;margin-top: -183px;" value="ADD+" ><i class=""></i> Remove</button></div>'; //New input field html 
                                                 var x = 1; //Initial field counter is 1
                                                            $(addButton).click(function () { //Once add button is clicked
                                                                if (x < maxField) { //Check maximum number of input fields
                                                                    x++; //Increment field counter
                                                                    $(wrapper).append(fieldHTML); // Add field html
                                                                }
                                                            });
                                                            $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                                                                e.preventDefault();
                                                                $(this).parent('div').remove(); //Remove field html
                                                                x--; //Decrement field counter
                                                            });
                                                        });
                                                        function getNewVals(id)
                                                        {
                                                            //alert(id);

                                                            $.ajax({
                                                                type: 'POST',
                                                                url: 'get_clg.php',
                                                                data: {
                                                                    id: id,
                                                                },
                                                                success: function (response) {

                                                                    $("#college_name").html("");
                                                                    $("#college_name").append(response);
                                                                }
                                                            });
                                                        }
        </script>

        <script>




            // just for the demos, avoids form submit
            $('#add_timeline').validate({
                rules: {
                    country: {
                        required: true,
                    },
                    college_names: {
                        required: true,
                    },
                    app_course: {
                        required: true,
                    },
                    "field_name[]": {
                        required: true,
                    },
                },
                messages: {
                    country: {
                        required: 'Select Country',
                    },
                    college_names: {
                        required: 'Select College',
                    },
                    app_course: {
                        required: 'Select Course',
                    },
                    "field_name[]": {
                        required: 'Enter TimeLine',
                    },
                },
            });

        </script>
        <script>
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();

                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {

                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();

                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {
            }
        </script>

    </body>

</html>