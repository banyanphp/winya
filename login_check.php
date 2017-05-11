<?php
session_start();
@include("admin/include/config.php");

$username = mysqli_real_escape_string($bd,$_REQUEST['usr_name']);
$password = mysqli_real_escape_string($bd,$_REQUEST['usr_pass']);
$md5 = md5($password);
$user_check = mysqli_num_rows(mysqli_query($bd,"SELECT * FROM `registration` WHERE `email`='$username' AND `password`='$md5' AND  `status`='1'"));
if ($user_check == 1) {
	
$user_fetch = mysqli_fetch_array(mysqli_query($bd,"SELECT * FROM `registration` WHERE `email`='$username' AND `password`='$md5' AND  `status`='1'"));
$_SESSION['user'] = $username;
$_SESSION['usr_name'] = $user_fetch['name'];
$_SESSION['register_id'] = $user_fetch['reg_id'];

echo "1";
} else {
echo "2";
}
?>

