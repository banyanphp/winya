<?php 
	@include 'admin/include/config.php';
	
if(!empty($_POST["keyword"])) {
	$curs_name = $_POST["keyword"];
$query =mysqli_query($bd,"SELECT * FROM `course_details` WHERE `course_name` LIKE '%$curs_name%' GROUP BY `course_name` limit 0,6");

if(!empty($query)) {
?>
<ul id="country-list" style="position: absolute;margin-top: 0px;background-color: white;color: #555;">
<?php
while($result=mysqli_fetch_array($query)){
?>
<li onClick="selectCountry('<?php echo $result['course_name']; ?>');" class="drp"><?php echo $result['course_name']; ?></li>
<?php } ?>
</ul>
<?php } } ?>