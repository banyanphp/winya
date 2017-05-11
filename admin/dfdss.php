<?php

$response = array();
$users= array();
require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$response = array();
$country = $_REQUEST['country'];
$course = $_REQUEST['course'];

$authentication_check = "SELECT college_id FROM `course_details` WHERE country_id='$country' or course_name='$course'";

$result1 = mysqli_query($db->connect(), $authentication_check);


if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
 $user= array();
       $user= $row1["college_id"];
        array_push($users,$user);
    }

$count=count($users);
for($i=0;$i<$count;$i++){
        
$colleges = $users[$i];


  echo $authentication_checks = "SELECT * FROM `college` WHERE college_id='$colleges'";

        $result2 = mysqli_query($db->connect(), $authentication_checks);

        if (mysqli_num_rows($result2) > 0) {
$response['college']=array();

            while ($row2 = mysqli_fetch_assoc($result2)) {
                $usert = array();
                $usert["college_name"] = $row2["college_name"];
                $usert["college_photo"] = $row2["college_photo"];
                $usert["college_details"] = $row2["college_details"];
                $usert["founded_year"] = $row2["founded_year"];
                $usert["type"] = $row2["type"];
                $usert["intake"] = $row2["intake"];

                $usert["college_address"] = $row2["college_address"];
   array_push($response['college'],$usert);

            }




        }

}

    echo json_encode($response);


    $response["success"] = 1;

    // echoing JSON response
} else {

    $response["success"] = 0;
    $response["notification"] = "Country Data Not Found";
    echo json_encode($response);
}
?>

