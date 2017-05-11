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

        <title>List Application</title>
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

        <!-- Custom Theme Style -->
        <link href="build/css/custom.min.css" rel="stylesheet">
    </head>



    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title"><span>Winya Education</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <!-- /menu profile quick info -->

                        <br />

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
                              
                            </div>



                        </div>


                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>List Application</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
  <table id="datatable<?php if($_SESSION['permission']==1){ echo '-buttons';}?>"class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Student Name</th>
                                                    <th>Country </th>
                                                    <th>College Name</th>
                                                    <th>Course  Name</th>
                                                    <th>Applied At</th>
                                                    <th>Total Steps</th>
                                                    <th>Completed Steps</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $application_query = mysqli_query($bd,"select * from application where status='1'");
                                      
                                                $sno = 1;
                                                while ($fetch_application = mysqli_fetch_array($application_query)) {
                                                    $country_id = $fetch_application['country_id'];
                                                    $college_id = $fetch_application['college_id'];
                                                    $course_id = $fetch_application['course_id'];
                                                    $user_id = $fetch_application['user_id'];
                                                    $application_id = $fetch_application['application_id'];
                                                    $date=$fetch_application['applied_at'];
                                                    $applied_at =date('Y-m-d', strtotime( $date ) );
                                                    $timeline_data =  mysqli_fetch_array(mysqli_query($bd,"select COUNT(timeline_id) as time from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id"));
                                                    $process_data = mysqli_num_rows(mysqli_query($bd,"select * from process_table where status='1' and application_id='$application_id' and is_completed='1'"));
                                                      
                                                    $fetch_college = mysqli_fetch_array(mysqli_query($bd,"select * from college where college_id= $college_id"));
                                                    $fetch_country = mysqli_fetch_array(mysqli_query($bd,"select * from country where country_id= $country_id"));
                                                    $fetch_course = mysqli_fetch_array(mysqli_query($bd,"select * from course_details where course_id= $course_id"));
                                                    $fetch_user = mysqli_fetch_array(mysqli_query($bd,"select * from registration where reg_id= $user_id"));
                                                    
                                                  //  echo "select COUNT(timeline_id) as time from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id";
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sno++ ?></td>
                                                        <td><?php echo $fetch_user['name'];?></td>
                                                        <td><?php echo $fetch_country['country_name']; ?></td>
                                                        <td><?php echo $fetch_college['college_name']; ?></td>
                                                        <td><?php echo $fetch_course['course_name']; ?></td>
                                                        <td><?php echo $applied_at ?></td>
                                                           <td><?php echo $timeline_data['time'] ?></td> 
                                                           <td><?php echo $process_data?></td>
                                                           
                                                        <td>
                                                            <button  style="width:36px"type="button" title="View" onclick="window.location.href='view_application.php?id=<?php echo $application_id;?>'"class="btn btn-success"><i class="fa fa-eye"></i></button>
                                                            <button style="width:36px" type="button" title="Delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                    </tr>
                                                <?php } ?>





                                            </tbody>
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

        <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min.js"></script>

        <!-- Datatables -->
        <script>
            $(document).ready(function () {
                var handleDataTableButtons = function () {
                    if ($("#datatable-buttons").length) {
                        $("#datatable-buttons").DataTable({
                            dom: "Bfrtip",
                            buttons: [
                                {
                                    extend: "copy",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "csv",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "excel",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "pdfHtml5",
                                    className: "btn-sm"
                                },
                                {
                                    extend: "print",
                                    className: "btn-sm"
                                },
                            ],
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

                TableManageButtons.init();
            });
        </script>
        <!-- /Datatables -->
    </body>

</html>