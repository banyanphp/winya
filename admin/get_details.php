<?php

include ("session/session.php");
include ("include/config.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$country_id = $_REQUEST['country_id'];
$college_id = $_REQUEST['college_id'];
$course_id = $_REQUEST['course_id'];
$timeline_id = $_REQUEST['timeline_id'];
$applicant_id = $_REQUEST['applicant_id'];


$date = "Completed on:";

$currentdate = date("Y-m-d");
$date.=$currentdate;

$insert_process = "update process_table set is_completed='1',completed_date='$currentdate' where time_line_id ='$timeline_id'  and application_id='$applicant_id'";

$q = mysqli_query($bd,$insert_process);

$ids1 = $_REQUEST['test'];

 $q = "select * from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id and timeline_id!=$timeline_id  and timeline_id  NOT IN (" . implode(',', $ids1) . ")";
$run_query = mysqli_query($bd,$q);
$row = mysqli_fetch_array($run_query);
$timeid = $row['timeline_id'];

$q1 = mysqli_query($bd,"select * from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id ");
$timeline_count = mysqli_num_rows($q1);

$q2 = mysqli_query($bd,"select * from process_table where application_id=$applicant_id and is_completed=1");
$process_table_count = mysqli_num_rows($q2);//echo $process_table_count;
if ($process_table_count != $timeline_count) {

    $insert_process1 = "INSERT INTO `process_table`( `application_id`, `time_line_id`, `is_completed`,`status`) VALUES ('$applicant_id','$timeid','0','1')";
    $run_query1 = mysqli_query($bd,$insert_process1);
}
else{
  
$insert_process = "update tbl_application set application_process_status='Completed' where applicant_invoice='$applicant_id'";

$q = mysqli_query($bd,$insert_process);   
}
?>