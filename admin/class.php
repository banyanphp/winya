<?php 


class get_process{
	function clg($id){
		include ("include/config.php");
		
		$ql = mysqli_query($bd, "SELECT `course_fees` FROM `course_details` WHERE `college_id`='$id'");
		$result1 = mysqli_fetch_array($ql);
		print_r($ql);
		exit();
		return $result1['college_id'];
		
	}
}

?>