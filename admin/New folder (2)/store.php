<?php
include ("session/session.php");
include ("include/config.php");
$permission = $_SESSION['permission'];
$name = $_SESSION['user'];
$action = $_REQUEST['action'];

$view = $action;
if(empty($action)){
      header('location:page_403.php');
}
switch ($action){
    case 'add_country':
         function GetImageExtension($imagetype) {

            if (empty($imagetype))
                return false;

            switch ($imagetype) {

                case 'image/bmp': return '.bmp';

                case 'image/gif': return '.gif';

                case 'image/jpeg': return '.jpg';

                case 'image/png': return '.png';

                default: return false;
            }
        }



        $name = mysql_real_escape_string($_REQUEST['country']);
		
 
       $file_name = $_FILES["uploadedimage"]["name"];

        $temp_name = $_FILES["uploadedimage"]["tmp_name"];

        $imgtype = $_FILES["uploadedimage"]["type"];

        $ext = GetImageExtension($imgtype);

        $imagename = date("d-m-Y") . "-" . time() . $ext;

        $target_path = "images/country/" . $imagename;

        move_uploaded_file($temp_name, $target_path);


        $sql = mysqli_query($bd,"INSERT INTO `country`(`country_id`, `country_name`, `flag`, `status`) VALUES ('','$name','$imagename','1')");

        if ($sql) {
           
    echo "<script>window.location.href='list_countries.php?message=success'; </script>";
            
        } else {
                    echo "Server Error Please Contact Service Provider";
        }
        break;
    case 'update_country':
      

        function GetImageExtension($imagetype) {

            if (empty($imagetype))
                return false;

            switch ($imagetype) {

                case 'image/bmp': return '.bmp';

                case 'image/gif': return '.gif';

                case 'image/jpeg': return '.jpg';

                case 'image/png': return '.png';

                default: return false;
            }
        }

        $id = mysql_real_escape_string($_REQUEST['id']);
  
        $name = mysql_real_escape_string($_REQUEST['country']);
		


        if ($_FILES["uploadedimage"]["name"] != "") {

            $file_name = $_FILES["uploadedimage"]["name"];
            $temp_name = $_FILES["uploadedimage"]["tmp_name"];

            $imgtype = $_FILES["uploadedimage"]["type"];

            $ext = GetImageExtension($imgtype);

            $imagename = date("d-m-Y") . "-" . time() . $ext;

            $target_path = "images/country/" . $imagename;

            move_uploaded_file($temp_name, $target_path);
            $unlinkimage = mysql_fetch_array(mysql_query("select * from country where country_id='$id'"));
            $unlink = "management_committee/";
            $unlink.=$unlinkimage['image'];
            unlink("$unlink");
            $sql = mysqli_query($bd,"update country set country_name='$name', flag='$imagename' where country_id ='$id'");
        } else {

            $sql = mysqli_query($bd,"update country set country_name='$name' where country_id ='$id'");
        }
        if ($sql) {
        echo "<script>window.location.href='list_countries.php?title=updated'; </script>";
        } else {
            echo "Server Error Please Contact Service Provider";
        }
      
        break;
               
        
        
        case 'delete_country':
$id=$_POST['id'];
    $unlinkimage = mysqli_fetch_array(mysqli_query($bd,"select * from country where country_id='$id'"));
    $delete = mysqli_query($bd,"delete from country where country_id='$id'");
    if ($delete) {
        $unlink = "images/country/";
        $unlink.=$unlinkimage['flag'];
        unlink("$unlink");
        echo "Deleted Successfully";
    } else {
        echo "Server Error Please Contact Service Provider ";
    }

   

break;

 case 'add_college':
$id=$_POST['id'];
    $unlinkimage = mysqli_fetch_array(mysqli_query($bd,"select * from country where country_id='$id'"));
    $delete = mysqli_query($bd,"delete from country where country_id='$id'");
    if ($delete) {
        $unlink = "images/country/";
        $unlink.=$unlinkimage['flag'];
        unlink("$unlink");
        echo "Deleted Successfully";
    } else {
        echo "Server Error Please Contact Service Provider ";
    }

   

break;
}
  
       