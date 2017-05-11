<?php
include("fckeditor.php");
include ("session/session.php");
include ("include/config.php");
if ($_SESSION['permission'] != 1) {
    header('location:page_403.php');
}
$id = $_REQUEST['id'];
$course_query = mysqli_query($bd, "select * from course_details where status='1' and course_id='$id'");
$sno = 1;
while ($fetch_course = mysqli_fetch_array($course_query)) {
    $college_id = $fetch_course['college_id'];
    $country_id = $fetch_course['country_id'];
    $course_id = $fetch_course['course_id'];
    $course_name = $fetch_course['course_name'];
    $course_details = $fetch_course['course_details'];
    $course_type = $fetch_course['course_type'];
    $course_type_explode = explode(",", $course_type);
    $course_type_explode_count = count($course_type_explode);
    $course_fees = $fetch_course['course_fees'];
    $course_fees_explode = explode(",", $course_fees);
    $course_time = $fetch_course['course_time'];
    $course_time_explode = explode(",", $course_time);
    $course_criteria = $fetch_course['requirements'];
    $course_criteria_explode = explode(",", $course_criteria);
    $course_criteria_explode_count = count($course_criteria_explode);
    $course_intake = $fetch_course['course intake'];
    $course_intake_explode = explode(",", $course_intake);
    $course_intake_explode_count = count($course_intake_explode);
    error_reporting('0');
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

        <title>Winya Update Courses </title>
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
        <link href="css/editor.css" type="text/css" rel="stylesheet"/>

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
                                <h3>Add Colleges</h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_content">
                                        <br />
                                        <form id="add_college" action="store.php?action=add_courses" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Course Name <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="coursename" class="form-control col-md-7 col-xs-12" name="coursenames" value="<?php echo $course_name; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="form-control" id="country" name="country" onchange="getNewVal(this.value);" required>

                                                        <option value="">Choose option</option>     
                                                        <?php
                                                        $fetch_query = mysqli_query($bd, "select * from country where status='1'");
                                                        while ($fetch_country = mysqli_fetch_array($fetch_query)) {
                                                            ?>

                                                            <option value="<?php echo $ids = $fetch_country['country_id'] ?>"<?php
                                                            if ($country_id == $ids) {
                                                                echo "selected";
                                                            }
                                                            ?>><?php echo $fetch_country['country_name'] ?></option>
                                                                <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">College/University Name <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="form-control" id="college_name" name="college_names" required>
                                                        <option value="">Choose Your College </option>
                                                        <?php
                                                        $fetch_query_course = mysqli_query($bd, "select * from college where status='1' and country_id=$country_id");
                                                        while ($fetch_course = mysqli_fetch_array($fetch_query_course)) {
                                                            ?>

                                                            <option value="<?php echo $ids_course = $fetch_course['college_id'] ?>"<?php
                                                            if ($course_id == $ids_course) {
                                                                echo "selected";
                                                            }
                                                            ?>><?php echo $fetch_course['college_name'] ?></option>
                                                                <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Course Type <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">Part Time<?php
                                                  $course_type_1 = $course_type_explode[0];
                                                                                                      
                                                        ?>
                                                        <input type="checkbox" checked id="part_time" name="chkbox" onclick="ShowHideDiv()" value="yes"> 
                                                                                              

                                                    Full Time  
                                                   <input type="checkbox" checked id="full_time" name="chkbox"  onclick="ShowHideDivs()" value="yes"> 
                                                     
                                                        <input type="checkbox" checked id="part_time" name="chkbox" onclick="ShowHideDiv()" value="yes"> 
                                                       

                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">

                                                </div>
                                            </div>


                                            <div id="parttime" style="<?php if ($course_type_1 == "Part Time") { ?> display: block "><?php } else {
                                                        ?>    display: none  ">
                                                <?php } ?>
                                                <div class="form-group" >
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Part Time Course Duration<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" class="form-control" id="part_duration" name="part_duration" value="<?php echo $course_time_explode[0] ?>" required>  
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Part Time Course  fees<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" class="form-control" id="part_fees" name="part_fees" value="<?php echo $course_fees_explode[0] ?>" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="fulltime" style="<?php if ($course_type_2 == "Full Time") { ?> display: block "><?php } else {
                                                    ?>    display: none  ">
                                                <?php } ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Full  Time Course Duration<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" class="form-control" id="full_duration" name="full_duration" value="<?php echo $course_time_explode[1] ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Full Time Course  fees<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" class="form-control"  id="full_fees" name="full_fees" value="<?php echo $course_fees_explode[1] ?>" required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Add College Logo/Image</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="files" class=" col-md-7 col-xs-12" type="file" name="files" onchange="return ValidateFileUploads()">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="txtProductName" class="col-sm-3 control-label">Add Criteria </label>

                                                <div class="col-sm-9">
                                                    <?php
                                                    for ($i = 0; $i < $course_criteria_explode_count; $i++) {
                                                        $course_criteria_explodes = $course_criteria_explode[$i];
                                                        if ($i == 0) {
                                                            ?>

                                                            <div class="field_wrappers">
                                                                <div>
                                                                    <input type="text" class="form-control" name="field_name[]" value="<?php echo $course_criteria_explodes ?>"  style="width: 50%;float: left;margin-right:14px;"/>

                                                                    <button type="button" class="btn btn-primary add_button"
                                                                            value="" ><i class="icon-plus-sign"></i>    ADD                                                 
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="field_wrapper">
                                                                <div>
                                                                    <input type="text" class="form-control" name="field_name[]" value="<?php echo $course_criteria_explodes ?>"  style="width: 50%;float: left;margin-right:14px;"/>

                                                                    <button type="button" class="btn btn-danger remove_button"
                                                                            value="" ><i class="icon-plus-sign"></i>    Remove                                                 
                                                                    </button>

                                                                </div>
                                                            </div>

                                                        <?php }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Intake</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select class="select2_multiple form-control" id="name" multiple="multiple" name="name[]" required> 
                                                        <?php
                                                        $intake_query = mysqli_query($bd, "select * from tbl_intake");
                                                        while ($row = mysqli_fetch_array($intake_query)) {
                                                            ?>
                                                            <option value="<?php echo $sname = $row['short_name'] ?>" 
                                                            <?php
                                                            for ($i = 0; $i < $course_intake_explode_count; $i++) {
                                                                $course_intake_explodes = $course_intake_explode[$i];
                                                                if ($course_intake_explodes == $sname) {
                                                                    echo "selected";
                                                                }
                                                            }
                                                            ?>
                                                                    ><?php echo $row['full_name'] ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course Details</label>
                                                <br/> <br/>
                                                <div class="col-md-12 col-sm-12 col-xs-12">                  <?php
// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

                                                    $sBasePath = $_SERVER['PHP_SELF'];

                                                    $sBasePath = substr($sBasePath, 0, strpos($sBasePath, "_samples"));



                                                    $oFCKeditor = new FCKeditor('coursedetail');

                                                    $oFCKeditor->BasePath = $sBasePath;
                                                    $oFCKeditor->Value = $course_details;


                                                    $oFCKeditor->Create();
                                                    ?>   
                                                </div>
                                            </div>
                                            <div class="ln_solid" style="text-align:center;color:#ff0000"> 
                                                <span id="success" style="color:#26B99A">  </span>
                                                <span id="errorid" ></span></div>

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

        <!-- Autosize -->
        <script src="vendors/autosize/dist/autosize.min.js"></script>
        <!-- jQuery autocomplete -->
        <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!-- starrr -->
        <script src="vendors/starrr/dist/starrr.js"></script>
        <script src="vendors/courses/addcourses.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>
        <script src="js/editor.js"></script>
        <script src="jquery.validate.min.js"></script>





        <script>




                                                        // just for the demos, avoids form submit
                                                        $('#add_college').validate({
                                                            rules: {
                                                                coursenames: {
                                                                    required: true,
                                                                },
                                                                "name[]": {
                                                                    required: true,
                                                                    errorClass: "error2",
                                                                },
                                                                country: {
                                                                    required: true,
                                                                },
                                                                college_names: {
                                                                    required: true,
                                                                },
                                                                part_duration: {
                                                                    required: true,
                                                                },
                                                                part_fees: {
                                                                    required: true,
                                                                },
                                                                full_duration: {
                                                                    required: true,
                                                                },
                                                                full_fees: {
                                                                    required: true,
                                                                },
                                                                "field_name[]": {
                                                                    required: true,
                                                                },
                                                                chkbox: {
                                                                    required: true,
                                                                },
                                                            },
                                                            messages: {
                                                                coursenames: {
                                                                    required: 'Please enter the Course Name',
                                                                },
                                                                "name[]": {
                                                                    required: 'Select atleast One Month',
                                                                },
                                                                country: {
                                                                    required: 'Select Country.',
                                                                },
                                                                college_names: {
                                                                    required: 'Select College.',
                                                                },
                                                                part_duration: {
                                                                    required: 'Enter Duration.',
                                                                },
                                                                part_fees: {
                                                                    required: 'Enter Fees.',
                                                                },
                                                                field_name: {
                                                                    required: 'Enter Criteria.',
                                                                },
                                                                full_fees: {
                                                                    required: 'Enter Fees.',
                                                                },
                                                                full_fees : {
                                                                    required: 'Enter Fees.',
                                                                },
                                                                        chkbox: {
                                                                            required: 'Please Select Atleast one type of duration',
                                                                        },
                                                            },
                                                        });

        </script>
        <script>
            $(document).ready(function () {
                $("#txtEditor").Editor();
            });
        </script>
        <!-- bootstrap-daterangepicker -->
        <script>
            $(document).ready(function () {
                $('#birthday').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_4"
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
            });
        </script>
        <!-- /bootstrap-daterangepicker -->

        <!-- bootstrap-wysiwyg -->
        <script>
            $(document).ready(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                        'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                        'Times New Roman', 'Verdana'
                    ],
                            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                        return false;
                    })
                            .change(function () {
                                $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                            })
                            .keydown('esc', function () {
                                this.value = '';
                                $(this).change();
                            });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                                target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });

                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();

                        $('.voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('.voiceBtn').hide();
                    }
                }

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                }

                initToolbarBootstrapBindings();

                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });

                window.prettyPrint;
                prettyPrint();
            });
        </script>
        <!-- /bootstrap-wysiwyg -->

        <!-- Select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 12,
                    placeholder: "Select Month",
                    allowClear: true
                });
            });
        </script>
        <!-- /Select2 -->

        <!-- jQuery Tags Input -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(document).ready(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /jQuery Tags Input -->

        <!-- Parsley -->

        <!-- /Parsley -->

        <!-- Autosize -->
        <script>
            $(document).ready(function () {
                autosize($('.resizable_textarea'));
            });
        </script>
        <!-- /Autosize -->

        <!-- jQuery autocomplete -->
        <script>
            $(document).ready(function () {
                var countries = {AD: "Andorra", A2: "Andorra Test", AE: "United Arab Emirates", AF: "Afghanistan", AG: "Antigua and Barbuda", AI: "Anguilla", AL: "Albania", AM: "Armenia", AN: "Netherlands Antilles", AO: "Angola", AQ: "Antarctica", AR: "Argentina", AS: "American Samoa", AT: "Austria", AU: "Australia", AW: "Aruba", AX: "Åland Islands", AZ: "Azerbaijan", BA: "Bosnia and Herzegovina", BB: "Barbados", BD: "Bangladesh", BE: "Belgium", BF: "Burkina Faso", BG: "Bulgaria", BH: "Bahrain", BI: "Burundi", BJ: "Benin", BL: "Saint Barthélemy", BM: "Bermuda", BN: "Brunei", BO: "Bolivia", BQ: "British Antarctic Territory", BR: "Brazil", BS: "Bahamas", BT: "Bhutan", BV: "Bouvet Island", BW: "Botswana", BY: "Belarus", BZ: "Belize", CA: "Canada", CC: "Cocos [Keeling] Islands", CD: "Congo - Kinshasa", CF: "Central African Republic", CG: "Congo - Brazzaville", CH: "Switzerland", CI: "Côte d’Ivoire", CK: "Cook Islands", CL: "Chile", CM: "Cameroon", CN: "China", CO: "Colombia", CR: "Costa Rica", CS: "Serbia and Montenegro", CT: "Canton and Enderbury Islands", CU: "Cuba", CV: "Cape Verde", CX: "Christmas Island", CY: "Cyprus", CZ: "Czech Republic", DD: "East Germany", DE: "Germany", DJ: "Djibouti", DK: "Denmark", DM: "Dominica", DO: "Dominican Republic", DZ: "Algeria", EC: "Ecuador", EE: "Estonia", EG: "Egypt", EH: "Western Sahara", ER: "Eritrea", ES: "Spain", ET: "Ethiopia", FI: "Finland", FJ: "Fiji", FK: "Falkland Islands", FM: "Micronesia", FO: "Faroe Islands", FQ: "French Southern and Antarctic Territories", FR: "France", FX: "Metropolitan France", GA: "Gabon", GB: "United Kingdom", GD: "Grenada", GE: "Georgia", GF: "French Guiana", GG: "Guernsey", GH: "Ghana", GI: "Gibraltar", GL: "Greenland", GM: "Gambia", GN: "Guinea", GP: "Guadeloupe", GQ: "Equatorial Guinea", GR: "Greece", GS: "South Georgia and the South Sandwich Islands", GT: "Guatemala", GU: "Guam", GW: "Guinea-Bissau", GY: "Guyana", HK: "Hong Kong SAR China", HM: "Heard Island and McDonald Islands", HN: "Honduras", HR: "Croatia", HT: "Haiti", HU: "Hungary", ID: "Indonesia", IE: "Ireland", IL: "Israel", IM: "Isle of Man", IN: "India", IO: "British Indian Ocean Territory", IQ: "Iraq", IR: "Iran", IS: "Iceland", IT: "Italy", JE: "Jersey", JM: "Jamaica", JO: "Jordan", JP: "Japan", JT: "Johnston Island", KE: "Kenya", KG: "Kyrgyzstan", KH: "Cambodia", KI: "Kiribati", KM: "Comoros", KN: "Saint Kitts and Nevis", KP: "North Korea", KR: "South Korea", KW: "Kuwait", KY: "Cayman Islands", KZ: "Kazakhstan", LA: "Laos", LB: "Lebanon", LC: "Saint Lucia", LI: "Liechtenstein", LK: "Sri Lanka", LR: "Liberia", LS: "Lesotho", LT: "Lithuania", LU: "Luxembourg", LV: "Latvia", LY: "Libya", MA: "Morocco", MC: "Monaco", MD: "Moldova", ME: "Montenegro", MF: "Saint Martin", MG: "Madagascar", MH: "Marshall Islands", MI: "Midway Islands", MK: "Macedonia", ML: "Mali", MM: "Myanmar [Burma]", MN: "Mongolia", MO: "Macau SAR China", MP: "Northern Mariana Islands", MQ: "Martinique", MR: "Mauritania", MS: "Montserrat", MT: "Malta", MU: "Mauritius", MV: "Maldives", MW: "Malawi", MX: "Mexico", MY: "Malaysia", MZ: "Mozambique", NA: "Namibia", NC: "New Caledonia", NE: "Niger", NF: "Norfolk Island", NG: "Nigeria", NI: "Nicaragua", NL: "Netherlands", NO: "Norway", NP: "Nepal", NQ: "Dronning Maud Land", NR: "Nauru", NT: "Neutral Zone", NU: "Niue", NZ: "New Zealand", OM: "Oman", PA: "Panama", PC: "Pacific Islands Trust Territory", PE: "Peru", PF: "French Polynesia", PG: "Papua New Guinea", PH: "Philippines", PK: "Pakistan", PL: "Poland", PM: "Saint Pierre and Miquelon", PN: "Pitcairn Islands", PR: "Puerto Rico", PS: "Palestinian Territories", PT: "Portugal", PU: "U.S. Miscellaneous Pacific Islands", PW: "Palau", PY: "Paraguay", PZ: "Panama Canal Zone", QA: "Qatar", RE: "Réunion", RO: "Romania", RS: "Serbia", RU: "Russia", RW: "Rwanda", SA: "Saudi Arabia", SB: "Solomon Islands", SC: "Seychelles", SD: "Sudan", SE: "Sweden", SG: "Singapore", SH: "Saint Helena", SI: "Slovenia", SJ: "Svalbard and Jan Mayen", SK: "Slovakia", SL: "Sierra Leone", SM: "San Marino", SN: "Senegal", SO: "Somalia", SR: "Suriname", ST: "São Tomé and Príncipe", SU: "Union of Soviet Socialist Republics", SV: "El Salvador", SY: "Syria", SZ: "Swaziland", TC: "Turks and Caicos Islands", TD: "Chad", TF: "French Southern Territories", TG: "Togo", TH: "Thailand", TJ: "Tajikistan", TK: "Tokelau", TL: "Timor-Leste", TM: "Turkmenistan", TN: "Tunisia", TO: "Tonga", TR: "Turkey", TT: "Trinidad and Tobago", TV: "Tuvalu", TW: "Taiwan", TZ: "Tanzania", UA: "Ukraine", UG: "Uganda", UM: "U.S. Minor Outlying Islands", US: "United States", UY: "Uruguay", UZ: "Uzbekistan", VA: "Vatican City", VC: "Saint Vincent and the Grenadines", VD: "North Vietnam", VE: "Venezuela", VG: "British Virgin Islands", VI: "U.S. Virgin Islands", VN: "Vietnam", VU: "Vanuatu", WF: "Wallis and Futuna", WK: "Wake Island", WS: "Samoa", YD: "People's Democratic Republic of Yemen", YE: "Yemen", YT: "Mayotte", ZA: "South Africa", ZM: "Zambia", ZW: "Zimbabwe", ZZ: "Unknown or Invalid Region"};

                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });

                // initialize autocomplete with custom appendTo
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>
        <!-- /jQuery autocomplete -->

        <!-- Starrr -->
        <script>
            $(document).ready(function () {
                $(".stars").starrr();

                $('.stars-existing').starrr({
                    rating: 4
                });

                $('.stars').on('starrr:change', function (e, value) {
                    $('.stars-count').html(value);
                });

                $('.stars-existing').on('starrr:change', function (e, value) {
                    $('.stars-count-existing').html(value);
                });
            });
        </script>
        <script type="text/javascript">
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode;
                if (charCode == 32) {
                    return true;
                } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                } else {
                    return true;
                }
            }
        </script>
        <script type="text/javascript">
            function ShowHideDiv() {
                var part_time = document.getElementById("part_time");
                var parttime = document.getElementById("parttime");
                parttime.style.display = part_time.checked ? "block" : "none";
            }
        </script>
        <script type="text/javascript">
            function getNewVal(id)
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
        <script type="text/javascript">
            function ShowHideDivs() {
                var part_time = document.getElementById("full_time");
                var parttime = document.getElementById("fulltime");
                parttime.style.display = part_time.checked ? "block" : "none";
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                var maxField = 1000; //Input fields increment limitation
                var addButton = $('.add_button');
                //Add button selector
                var wrapper = $('.field_wrappers');
                var wrappers = $('.field_wrapper');
                var fieldHTML = '<div><br><input type="text" class="form-control" name="field_name[]" value=""  required style="float:left;width:50%;margin-right:14px;"/>\n\
        <button type="button" class="btn btn-danger remove_button" value="ADD+" ><i class=""></i> Remove</button></div>'; //New input field html 
                var x = 1; //Initial field counter is 1
                $(addButton).click(function () { //Once add button is clicked
                    if (x < maxField) { //Check maximum number of input fields
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); // Add field html
                    }
                });


                $(wrappers).on('click', '.remove_button', function (e) { //Once remove button is clicked
                    e.preventDefault();

                    $(this).parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
                $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                    e.preventDefault();

                    $(this).parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });

            });

        </script>




        <!-- /Starrr -->
    </body>

</html>