<?php 
include ("include/config.php");
include ("class.php");

$id=$_POST['id'];
$get_type=$_POST['gettype'];



if($get_type=='get_clg'){
?>
	<option value=""> Select College</option>
        <?php 
			$sql_clg = mysqli_query($bd,"SELECT * FROM `college` WHERE `country_id`='$id'");
			while($clg = mysqli_fetch_array($sql_clg)){
		?>
			<option value="<?php echo $clg['college_id']; ?>"> <?php echo $clg['college_name'];  ?></option>
        <?php
			}
 }
elseif($get_type=='get_course'){

?>

    <option value="">Select Course</option>
    <?php
	$q3 = mysqli_query($bd, "SELECT `course_name`,`course_id` FROM `course_details` WHERE `college_id`='$id'");
    while ($results = mysqli_fetch_array($q3)) {
?>
        <option value="<?php echo $results['course_id']; ?>">
            <?php echo $results['course_name'] ?>
        </option>

        <?php
																}
 }

elseif($get_type=='get_type'){
		?>
            <option value="">Select Course type</option>
            <?php
					 $sql = mysqli_query($bd, "SELECT `course_time`,`course_type` FROM `course_details` WHERE `course_id`='$id'");
                     while ($res = mysqli_fetch_array($sql)) {
						 $type=$res['course_type'];
						 $course_time=$res['course_time'];
						 $course_timearray=explode(",",$course_time);
						 $typearray=explode(",",$type);
						 $typecount=count($typearray);
						 for($i=0;$i<$typecount;$i++){
                  ?>
                <option value="<?php echo $typearray[$i] ?>">
                    <?php echo $typearray[$i] ?> (
                        <?php echo $course_timearray[$i] ?>)</option>
                <?php
						 }
                     }

	}

elseif($get_type=='get_amt'){
$course=$_POST['course'];
					$sql1 = mysqli_query($bd, "SELECT `course_fees`,`college_id`,`course_type` FROM `course_details` WHERE `course_id`='$course'");
                     $res1 = mysqli_fetch_array($sql1);
					 $type=$res1['course_type'];
						 $typearray=explode(",",$type);
						 $typecount=count($typearray);
						 for($i=0;$i<$typecount;$i++){
							 
							 if($typearray[$i]== $id){
								 $amt=$res1['course_fees'];
							 						 $typeamt=explode(",",$amt);
													 echo $typeamt[$i];
							 }
 
						 }
	}
	?>