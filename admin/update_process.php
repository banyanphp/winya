<?php
include ("session/session.php");
include ("include/config.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($_REQUEST);
$expected_date =$_REQUEST['date'];
$timeline_id =$_REQUEST['timeline_id'];
$applicant_id =$_REQUEST['applicant_id'];
$date=date("Y-m-d",  strtotime($expected_date));
$currentdate=date("Y-m-d");
if($date>$currentdate){
    



$insert_process="update process_table set expected_date='$date' where time_line_id ='$timeline_id'  and application_id='$applicant_id'";
$run_query=mysqli_query($bd,$insert_process);
if($run_query){
    echo "1";
}
else{
    echo "2";
}
}
else {
     echo "3";
}

?>