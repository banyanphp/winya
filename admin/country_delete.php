<?php 
include 'include/config.php'; 
if(!empty($_POST['id'])){
	$id=$_POST['id'];
//	echo $id;
		$delete=mysqli_query($bd,"delete from country where country_id='$id'");
		if($delete)
		{
			echo "country is deleted successfully";
		}
		else{
			echo "country is Not deleted ";
		}
}
else{
	echo "Please select country";
		
	
}

?>