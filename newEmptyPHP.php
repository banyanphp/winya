<?php
$response = array();
require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$response = array();
if(isset($_REQUEST['regs_id'])){

$reg_id= $_REQUEST['regs_id'];
$sq_register = mysqli_fetch_array(mysqli_query($db->connect(), "SELECT * FROM `registration` WHERE `reg_id`='$reg_id'"));
$usr_mail=$sq_register['reg_id'];
$sq_usrdata = mysqli_fetch_array(mysqli_query($db->connect(), "SELECT * FROM `tbl_application` WHERE `usr_mail` ='$usr_mail'"));
$aplicnt_id = $sq_usrdata['applicant_invoice'];

$cntry = $sq_usrdata['applicant_stdy_cuntry'];
$curse_id = $sq_usrdata['applicant_course_id'];
$clg_id = $sq_usrdata['applicant_univercity'];
$sq_cntry = mysqli_fetch_array(mysqli_query($db->connect(), "SELECT * FROM `country` WHERE `country_id`='$cntry'"));
$sq_curse = mysqli_fetch_array(mysqli_query($db->connect(), "SELECT * FROM `course_details` WHERE `course_id`='$curse_id' AND `college_id`='$clg_id'"));
$sq_clg = mysqli_fetch_array(mysqli_query($db->connect(), "SELECT * FROM `college` WHERE `college_id`='$clg_id' AND `country_id`='$cntry'"));

$fetch_query1 = mysqli_query($db->connect(), "select * from process_table where application_id=$aplicnt_id and is_completed=1");
$response["timeline"] = array();
while ($fetch_timeline1 = mysqli_fetch_array($fetch_query1)) {
    $user=array();
    $ids = $fetch_timeline1['time_line_id'];
    $ids2[] = $fetch_timeline1['time_line_id'];
    $fetch_query2 = mysqli_query($db->connect(), "select * from timeline where status='1' and country_id=$cntry and college_id=$clg_id and course_id=$curse_id and timeline_id= $ids");
    while ($fetch_data = mysqli_fetch_array($fetch_query2)) {
        $user['timeline_name']= $fetch_data['timeline_name'];
        $user['timline_description']= $fetch_data['timline_description'];

	
        $user['expected_date']= $fetch_timeline1['expected_date'];
       $user['completed_date']= $fetch_timeline1['completed_date'];

array_push($response["timeline"], $user);	
    }
}

$fetch_query1 = mysqli_query($db->connect(), "select * from process_table where application_id=$aplicnt_id and is_completed=0");
while ($fetch_timeline1 = mysqli_fetch_array($fetch_query1)) {
    $ids = $fetch_timeline1['time_line_id'];
    $ids2[] = $fetch_timeline1['time_line_id'];
   $fetch_query2 = mysqli_query($db->connect(), "select * from timeline where status='1' and country_id=$cntry and college_id=$clg_id and course_id=$curse_id and timeline_id= $ids");
    while ($fetch_data = mysqli_fetch_array($fetch_query2)) {
        $user['timeline_name']= $fetch_data['timeline_name'];
$user['timline_description']= $fetch_data['timline_description'];
        $user['expected_date']= $fetch_timeline1['expected_date'];
       $user['completed_date']= $fetch_timeline1['completed_date'];

array_push($response["timeline"], $user);	
    }
}
 $response["success"] = 0;
echo json_encode($response);
}

 else {

    $response["success"] = 0;
    $response["notification"] = "Data Not Found";
    echo json_encode($response);

	}
?> 				