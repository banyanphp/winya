<?php
//error_reporting(E_ALL ^ E_NOTICE);
session_start();
@include("include/config.php");

$username = mysqli_real_escape_string($bd,$_REQUEST['email']);
$password = mysqli_real_escape_string($bd,$_REQUEST['password']);
$md5 = md5($password);
$user_check = mysqli_num_rows(mysqli_query($bd,"select * from admin where user_name='$username' and password = '$md5' and status=1"));
if ($user_check == 1) {
	
$user_fetch = mysqli_fetch_array(mysqli_query($bd,"select * from admin where user_name='$username' and password = '$md5'"));
$_SESSION['user'] = $username;
$_SESSION['adm_id'] = $user_fetch['admin_id'];
$_SESSION['permission'] = $user_fetch['permission'];
$_SESSION['branch_id'] = $user_fetch['branch_id'];
echo "1";
/* echo "<script>window.location.href = 'home.php';</script>"; */
} else {
echo "2";
}
?>

