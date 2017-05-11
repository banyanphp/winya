<?php 
include ("include/config.php");
$id=$_POST['id'];
?>
    <option value="">Select College</option>
    <?php
	$q3 = mysqli_query($bd, "SELECT `college_id`,`college_name` FROM `college` WHERE `country_id`='$id'");
         while ($results = mysqli_fetch_array($q3)) {
?>
        <option value="<?php echo $results['college_id']; ?>">
            <?php echo $results['college_name']; ?>
        </option>

        <?php
			}
