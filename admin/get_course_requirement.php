<?php
$id = $_POST['id'];
include ("include/config.php");
 $q1 = "SELECT requirements FROM `course_details` WHERE `course_id`='$id'";
$q = mysqli_query($bd, $q1);
$row = mysqli_fetch_array($q);
$requirements = $row['requirements'];

$typearray = explode(",", $requirements);
$typecount = count($typearray);
?>
<label class="control-label col-md-3 col-sm-3 col-xs-12" >Eligibility <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12" id="test">



    <?php for ($i = 0; $i < $typecount; $i++) {
        ?>

        <div class="">
            <label>
                <?php echo $typearray[$i]; ?> 
            </label>
        </div>
    <?php } ?>
</div>
