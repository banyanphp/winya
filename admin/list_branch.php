<?php
include ("session/session.php");
include ("include/config.php");
if ($_SESSION['permission'] != 1) {
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

        <title>Winya Education</title>
        <link rel="shortcut icon" href="images/img.jpg">
        <!-- Bootstrap -->
        <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- starrr -->
        <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
        <style>
            input.select2-search__field{
                width:165px !important;
            }
        </style>
    </head>



    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title"> <span>Winya Education</span></a>
                        </div>

                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                        <?php include 'sidebar.php'; ?>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                ?<?php include 'top.php'; ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">


                            <div class="pull-right">
                                <button type="button" data-toggle="modal" data-target=".bs-example-modal-form" class="btn btn-info">+ Add Branch</button>
                            </div>


                        </div>
                        <div tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade bs-example-modal-form" id="modal">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        <h4 id="modalWithForm" class="modal-title">Add Branch</h4>
                                    </div>
                                    <div class="modal-body">








                                        <form id="add_amount" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="username">Branch Name</label>
                                                <input name="branch_name" id="branch_name" type="text" placeholder="Enter Branch Name" class="form-control">
                                                <span id="error_login"></span>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Branch Head</label>

                                                <select class="form-control" id="branch_head" name="branch_head">
                                                    <?php
                                                    $fetch_query = mysqli_query($bd, "select * from admin where permission='3' and branch_id='0'");
                                                    if (mysqli_num_rows($fetch_query) > 0) {
                                                        ?>
                                                        <option value="0">Choose Branch Head</option>
                                                        <?php
                                                        $fetch_query = mysqli_query($bd, "select * from admin where permission='3' and branch_id='0'");

                                                        while ($fetch_country = mysqli_fetch_array($fetch_query)) {
                                                            ?>

                                                            <option value="<?php echo $fetch_country['admin_id'] ?>"><?php echo $fetch_country['user_name'] ?></option>
                                                        <?php }
                                                    } else {
                                                        ?>    <option value="0">No Results Found</option><?php } ?>
                                                </select>


                                            </div>
                                            <span id="error_login"></span>
                                            <div class="form-group">
                                                <label for="username">Branch Members</label>

                                                <select class="select2_multiple form-control " id="intake" multiple="multiple" name="name[]" style="width:100%">

                                                    <?php
                                                    $fetch_query = mysqli_query($bd, "select * from admin where permission='3' and branch_id='0'");
                                                    while ($fetch_country = mysqli_fetch_array($fetch_query)) {
                                                        ?>

                                                        <option value="<?php echo $fetch_country['admin_id'] ?>"><?php echo $fetch_country['user_name'] ?></option>
<?php } ?>
                                                </select>
                                                <div class="form-group">
                                                    <label for="username">Branch Amount</label>
                                                    <input name="branch_amount" id="branch_amount" type="text" placeholder="Enter Branch Amount" class="form-control">
                                                    <span id="error_login"></span>
                                                </div>


                                            </div>









                                            <div class="ln_solid" style="text-align:center;color:#ff0000">
                                                <span id="success" style="color:#26B99A">  </span>
                                                <span id="errorid" ></span></div>

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

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">

                                        <h2>List Branch</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>UserName</th>
                                                    <th>Branch Name</th>
                                                    <th>Total Amount</th>
                                                    <th>Credit Amount</th>
                                                    <th>Balance Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $admin_query = mysqli_query($bd, "select * from tbl_branch where branch_status='1'");
                                                $sno = 1;
                                                $branch_total_debit = 0;
                                                $branch_total_credit = 0;
                                                while ($fetch_admin = mysqli_fetch_array($admin_query)) {
                                                    $id = $fetch_admin['branch_id'];

                                                    $q2 = mysqli_query($bd, "SELECT * FROM `tbl_branch_amount` WHERE `branch_id`='$id'");
                                                    $total = 0;
                                                    while ($fetch_admin2 = mysqli_fetch_array($q2)) {
                                                        $total+=$fetch_admin2['branch_amt'];
                                                    }
                                                    $q23 = mysqli_query($bd, "SELECT * FROM `tbl_voucher` WHERE `branch_idfk`='$id' and `status`='1'");
                                                    $total1 = 0;
                                                    while ($fetch_admin23 = mysqli_fetch_array($q23)) {
                                                        $total1+=$fetch_admin23['amttowards'];
                                                    }
                                                    $head = $fetch_admin['branch_head'];
                                                    $q32 = mysqli_query($bd, "SELECT * FROM `admin` WHERE `admin_id`='$head'");
                                                    $r = mysqli_fetch_array($q32);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sno++ ?></td>
                                                        <td><?php echo $r['user_name']; ?></td>
                                                        <td><?php echo $fetch_admin['branch_name']; ?></td>
                                                        <td><?php
                                                            $branch_total_credit+=$total;
                                                            echo $total;
                                                            ?></td>
                                                        <td><?php
                                                            $branch_total_debit+=$total1;
                                                            echo $total1;
                                                            ?></td>
                                                        <td><?php echo $total - $total1; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-success" onclick="window.location.href = 'view_branch_amount.php?id=<?php echo $id; ?>'"><i class="fa fa-eye"></i></button>
                                                        </td>

                                                    </tr>
<?php } ?>
                                        </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td> <td></td>
                                                    <td></td>
                                                    <td>Total Amount</td>
                                                    <td><?php echo $branch_total_credit ?></td><td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td> <td></td>
                                                    <td></td>
                                                    <td>Expenses Amount</td>
                                                    <td><?php echo $branch_total_debit ?></td><td></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td> <td></td>
                                                    <td></td>
                                                    <td>Balance Amount</td>
                                                    <td><?php echo $branch_total_credit - $branch_total_debit; ?></td><td></td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
<?php include'footer.php' ?>
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
        <!-- Datatables -->
        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.html"></script>
        <script src="vendors/jszip/dist/jszip.min.js"></script>
        <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="js/validate_image.js"></script>
        <script type="text/javascript" src="vendors/branchamount/addbranch.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>

        <!-- Datatables -->
        <script>
                                                            $(document).ready(function () {
                                                                var handleDataTableButtons = function () {
                                                                    if ($("#datatable-buttons").length) {
                                                                        $("#datatable-buttons").DataTable({
                                                                            dom: "Bfrtip",
                                                                            header: true,
                                                                            buttons: [
                                                                                {
                                                                                    extend: "copy",
                                                                                    className: "btn-sm",
                                                                                    footer: true,
                                                                                    exportOptions: {
                                                                                        columns: [0, 1, 2, 3, 4, 5]
                                                                                    }
                                                                                },
                                                                                {
                                                                                    extend: "csv",
                                                                                    className: "btn-sm",
                                                                                    footer: true,
                                                                                    exportOptions: {
                                                                                        columns: [0, 1, 2, 3, 4, 5]
                                                                                    }
                                                                                },
                                                                                {
                                                                                    extend: "excel",
                                                                                    className: "btn-sm",
                                                                                    footer: true,
                                                                                    exportOptions: {
                                                                                        columns: [0, 1, 2, 3, 4, 5],
                                                                                        stripNewlines: false,
                                                                                        format: {
                                                                                            footer: function (data, column, row) {
                                                                                                console.log(data.replace(/<br\s*[\/]?>/gi, '\n'));
                                                                                                return data.replace(/<br\s*[\/]?>/gi, '\n');
                                                                                            }
                                                                                        }
                                                                                    },
                                                                                },
                                                                                {
                                                                                    extend: "pdfHtml5",
                                                                                    className: "btn-sm",
                                                                                    footer: true,
                                                                                    exportOptions: {
                                                                                        columns: [0, 1, 2, 3, 4, 5]
                                                                                    },
                                                                                    customize: function (doc) {
                                                                                        doc.content.splice(1, 0, {
                                                                                            margin: [-12, -50, 0, 0],
                                                                                            alignment: 'left',
                                                                                            image: 'data:image/png;base64,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'
                                                                                        });
                                                                                    }
                                                                                },
                                                                                {
                                                                                    extend: "print",
                                                                                    className: "btn-sm",
                                                                                    footer: true,
                                                                                    exportOptions: {
                                                                                        columns: [0, 1, 2, 3, 4, 5]
                                                                                    },
                                                                                    customize: function (win) {
                                                                                        $(win.document.body)
                                                                                                .prepend(
                                                                                                        '<img src="http://winya.co.nz/img/logo.png" style="margin-right:100px" />'
                                                                                                        );



                                                                                    }
                                                                                }],
                                                                            responsive: true
                                                                        });
                                                                    }
                                                                };

                                                                TableManageButtons = function () {
                                                                    "use strict";
                                                                    return {
                                                                        init: function () {
                                                                            handleDataTableButtons();
                                                                        }
                                                                    };
                                                                }();

                                                                $('#datatable').dataTable();
                                                                $('#datatable-keytable').DataTable({
                                                                    keys: true
                                                                });

                                                                $('#datatable-responsive').DataTable();

                                                                $('#datatable-scroller').DataTable({
                                                                    ajax: "js/datatables/json/scroller-demo.json",
                                                                    deferRender: true,
                                                                    scrollY: 380,
                                                                    scrollCollapse: true,
                                                                    scroller: true
                                                                });

                                                                var table = $('#datatable-fixed-header').DataTable({
                                                                    fixedHeader: true
                                                                });
                                                                var table = $('#datatable-fixed-footer').DataTable({
                                                                    fixedFooter: true
                                                                });
                                                                TableManageButtons.init();
                                                            });
        </script>
        <!-- /Datatables -->

        <!-- NProgress -->

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
        <script src="js/editor.js"></script>
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
                    placeholder: "Branch Members",
                    allowClear: true,
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
        <!-- /Starrr -->
    </body>

</html>