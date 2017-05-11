  <?php
include('include/config.php');
 $adm_id = $_SESSION['adm_id'];    

$query = mysqli_query($bd,"SELECT * FROM `admin` WHERE `admin_id`='$adm_id'");
$res=mysqli_fetch_array($query);
 $imgs	= $res['admin_photo'];
  ?>   
  <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo $imgs; ?>" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2><?php  echo $_SESSION['user']; ?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br /><br /><br /><br /><br /><br />
	 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="home.php"><i class="fa fa-home"></i> DashBoard </a>
                   
                  </li>
                  <?php  if( $_SESSION['permission']=='1'){ ?>
                  <li><a href="list_countries.php"><i class="fa fa-flag-checkered"></i> Countries </a>
                  <li><a><i class="fa fa-university"></i> Colleges <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="list_colleges.php">List Colleges</a></li>
                      <li><a href="add_colleges.php">Add Colleges</a></li>
                   
                    </ul>
                  </li>
                  <li><a><i class="fa fa-graduation-cap"></i> Courses <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="list_courses.php">List Courses</a></li>
                      <li><a href="add_courses.php">Add Courses</a></li>
                    </ul>
                  </li>
                  <?php }   if(( $_SESSION['permission']=='1' )||( $_SESSION['permission']=='2')){?>
                  <li><a><i class="fa fa-bar-chart-o"></i> TimeLine <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="list_timeline.php">List TimeLine</a></li>
                        <li><a href="add_timeline.php">Add TimeLine</a></li>
                     
                    </ul>
                  </li>
                  <?php }    if(( $_SESSION['permission']=='1' )){?>
                  <li><a><i class="fa fa-bar-chart-o"></i> Account Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="list_branch.php">Branch list</a></li>
                        <li><a href="add_branch_amount.php">Add Amount</a></li>
                                           <li><a href="approval.php">Waiting for Approval</a></li>

                    </ul>
                  </li>
                     <?php }    if(( $_SESSION['permission']=='2' )){?>
                  <li><a><i class="fa fa-bar-chart-o"></i> Account Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="list_branch_admin.php">Branch list</a></li>
                        <li><a href="amount_pay.php">Add Amount</a></li>
                      <li><a href="waiting_for_approval.php">Waiting for Approval</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                    <li><a><i class="fa fa-paperclip"></i> Application <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="applicant_list.php">New Application</a></li>
                         <li><a href="applicant_completed.php">Completed Application</a></li>
                      <li><a href="applicant_add.php">Add Application</a></li>
                       <?php    if(( $_SESSION['permission']=='1' )){?>
                                            <li><a href="applicant_add_fields.php">Add Application Fields</a></li>
                       <?php } ?>
                    </ul>
                  </li>
                   <?php  if( $_SESSION['permission']=='1'){ ?>
                 
                  <li><a><i class="fa fa-university"></i> Collection <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="collection.php">Today`s Collection</a></li>
                        <li><a href="total_collection.php">Total Collection</a></li>
                   
                    </ul>
                  </li>
                 
                  <?php }  ?>
                   <?php  if( $_SESSION['permission']=='1'){ ?>
                  <li><a href="list_users.php"><i class="fa fa-users"></i> Users  </a>
    
                   
                  </li>
                  <li><a href="list_admin.php"><i class="fa fa-users"></i> Admins  </a>
    
                   
                  </li>
                   <?php } ?>
                </ul>
              </div>
           

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            