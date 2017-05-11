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

$insert_process = "update process_table set is_completed='1',completed_date='$currentdate' where time_line_id ='$timeline_id'  and application_id='1'";

$q = mysql_query($insert_process);

$ids1 = $_REQUEST['test'];

$q = "select * from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id and timeline_id!=$timeline_id  and timeline_id  NOT IN (" . implode(',', $ids1) . ")";
$run_query = mysql_query($q);
$row = mysql_fetch_array($run_query);
$timeid = $row['timeline_id'];

$q1 = mysql_query("select * from timeline where status='1' and country_id=$country_id and college_id=$college_id and course_id=$course_id ");
$timeline_count = mysql_num_rows($q1);
echo $timeline_count;
$q2 = mysql_query("select * from process_table where application_id=$applicant_id and is_completed=1");
$process_table_count = mysql_num_rows($q2);//echo $process_table_count;
if ($process_table_count != $timeline_count) {

    $insert_process1 = "INSERT INTO `process_table`( `application_id`, `time_line_id`, `is_completed`,`status`) VALUES ('$applicant_id','$timeid','0','1')";
    $run_query1 = mysql_query($insert_process1);
}
?>