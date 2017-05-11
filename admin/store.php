<?php

error_reporting(0);
include ("session/session.php");
include ("include/config.php");
$permission = $_SESSION['permission'];
$name = $_SESSION['user'];
$action = $_REQUEST['action'];

$view = $action;
if (empty($action)) {
    // header('location:page_403.php');
}
switch ($action) {


    //country start
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

        $sqls = mysqli_num_rows(mysqli_query($bd, "select * from country where country_name='$name'"));
        if ($sqls == 0) {
            $sql = mysqli_query($bd, "INSERT INTO `country`(`country_id`, `country_name`, `flag`, `status`) VALUES ('','$name','$imagename','1')");

            if ($sql) {

                echo "1";
            } else {
                echo "2";
            }
        } else {
            echo "3";
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
            $sql = mysqli_query($bd, "update country set country_name='$name', flag='$imagename' where country_id ='$id'");
        } else {

            $sql = mysqli_query($bd, "update country set country_name='$name' where country_id ='$id'");
        }
        if ($sql) {
            echo "<script>window.location.href='list_countries.php?title=updated'; </script>";
        } else {
            echo "Server Error Please Contact Service Provider";
        }

        break;



    case 'delete_country':
        $id = $_POST['id'];
        $unlinkimage = mysqli_fetch_array(mysqli_query($bd, "select * from country where country_id='$id'"));
        $delete = mysqli_query($bd, "delete from country where country_id='$id'");
        if ($delete) {
            $unlink = "images/country/";
            $unlink.=$unlinkimage['flag'];
            unlink("$unlink");
            echo "Deleted Successfully";
        } else {
            echo "Server Error Please Contact Service Provider ";
        }



        break;
//country end
    //college start
    case 'add_college':


        $url = $_POST['url'];
        $college_names = $_POST['college_names'];
        $country = $_POST['country'];
        $year = $_POST['year'];
        $college = $_POST['college'];
        $clg_addr = $_POST['clg_addr'];
        $name = $_POST['name'];
        $count = count($name);
        $intake = "";
        for ($i = 0; $i < $count; $i++) {
            $intake.=$name[$i];
            $intake.=",";
        }
        $type = $_POST['type'];

        $data = substr($intake, 0, -1);

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

        if ($_FILES["files"]["name"] != '') {
            $file_name = $_FILES["files"]["name"];

            $temp_name = $_FILES["files"]["tmp_name"];

            $imgtype = $_FILES["files"]["type"];
            $ext = GetImageExtension($imgtype);
            $imagename = date("d-m-Y") . "-" . time() . $ext;
            $target_path = "college/" . $imagename;

            $sl = mysqli_query($bd, "INSERT INTO `college`(`college_id`, `country_id`, `college_name`, `college_details`, 
                `founded_year`, `type`, `intake`, `college_address`, `status`,`college_photo`,`college_website`)
            VALUES ('','$country','$college_names','$college','$year','$type','$data','$clg_addr','1','$file_name','$url')");
        }
else{
     $sl = mysqli_query($bd, "INSERT INTO `college`(`college_id`, `country_id`, `college_name`, `college_details`, 
                `founded_year`, `type`, `intake`, `college_address`, `status`,`college_photo`,`college_website`)
            VALUES ('','$country','$college_names','$college','$year','$type','$data','$clg_addr','1','','$url')");
}

        if ($sl) {

            echo "<SCRIPT>window.location.href='list_colleges.php'</script>";
            $_SESSION["msg"] = "Y";
        } else {
            echo "<SCRIPT>window.location.href='list_colleges.php'</script>";

            $_SESSION["msg"] = "N";
        }
        break;



    case 'update_college':

        $url = $_POST['url'];
        $college_names = $_POST['college_names'];
        $country = $_POST['country'];
        $year = $_POST['year'];
        $college = $_POST['college'];
        $type = $_POST['type'];
        $clg_addr = $_POST['clg_addr'];
        $clg_id = $_POST['clg_id'];
        $name = $_POST['name'];   

        $count = count($name);
        $intake = "";
        for ($i = 0; $i < $count; $i++) {
            $intake.=$name[$i];
            $intake.=",";
        }

        $data = substr($intake, 0, -1);

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

        if ($_FILES["files"]["name"] != '') {
            $file_name = date("Y-m-d H:i:s");
            $file_name = $_FILES["files"]["name"];

            $temp_name = $_FILES["files"]["tmp_name"];

            $imgtype = $_FILES["files"]["type"];



            $ext = GetImageExtension($imgtype);

            $imagename = date("d-m-Y") . "-" . time() . $ext;
            $target_path = "college/" . $imagename;
            $sql = "UPDATE `college` SET `country_id`='$country',`college_name`='$college_names',`"
                    . "college_photo`='$imagename',`college_details`='$college',`founded_year`='$year',`type`='$type',
                    `intake`='$data',`college_address`='$clg_addr',`college_website`='$url' WHERE `college_id`='$clg_id'";
        } else {
            $sql = "UPDATE `college` SET `country_id`='$country',`college_name`='$college_names',"
                    . "`college_details`='$college',`founded_year`='$year',`type`='$type',
                    `intake`='$data',`college_address`='$clg_addr',`college_website`='$url' WHERE `college_id`='$clg_id'";
        }
        $sl = mysqli_query($bd, "$sql");
        if ($sl) {

            echo "<SCRIPT>window.location.href='list_colleges.php'</script>";
            $_SESSION["updatemsg"] = "Y";
        } else {
            echo "<SCRIPT>window.location.href='list_colleges.php'</script>";

            $_SESSION["updatemsg"] = "N";
        }
        break;


//college end
    //course start
    case 'add_courses':

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

        $file_name = date("Y-m-d H:i:s");
        $file_name = $_FILES["files"]["name"];
        $temp_name = date("Y-m-d H:i:s");

        $temp_name = $_FILES["files"]["tmp_name"];

        $imgtype = $_FILES["files"]["type"];
        $coursename = $_POST['coursename'];

        $college_names = $_POST['college_names'];
        $course_short_name = $_POST['courseshortnames'];
        $country = $_POST['country'];
        $coursedetail = $_POST['coursedetail'];
        $name = $_POST['name'];
        $countname = count($name);
        $names = '';
        $renames = '';
        $part_fees = $_POST['part_fees'];
        $full_fees = $_POST['full_fees'];
        $part_duration = $_POST['part_duration'];
        $full_duration = $_POST['full_duration'];
        $field_name = $_POST['field_name'];
        $field_namecount = count($field_name);

        for ($i = 0; $i < $countname; $i++) {
            $names.=$name[$i];
            $names.=",";
        }
        for ($i = 0; $i < $field_namecount; $i++) {
            $renames.=$field_name[$i];
            $renames.=",";
        }
        $type = "";
        $typefees = "";
        $typeduration = "";

        if ($_POST['parttime'] == 'yes' && $_POST['fulltime'] == 'yes') {
            $type.="Part Time";
            $type.=",";
            $type.="Full Time";
            $typefees.=$part_fees;
            $typefees.=",";
            $typefees.="$fullfees";
            $typeduration.=$part_duration;
            $typeduration.=",";
            $typeduration.="$full_duration";
        } else {

            if ($_POST['parttime'] == 'yes') {

                if ($_POST['fulltime'] != 'yes') {
                    $type.="Part Time";
                    $typefees.=$part_fees;
                    $typeduration = $part_duration;
                }
            } elseif ($_POST['fulltime'] == 'yes') {
                $type.="Full Time";
                $typefees.=$fullfees;
                $typeduration = $full_duration;
            }
        }
//print_r($type);exit();
        $ext = GetImageExtension($imgtype);

        $imagename = date("d-m-Y") . "-" . time() . $ext;
        $target_path = "courses/" . $imagename;

        move_uploaded_file($temp_name, $target_path);
        $sl = mysqli_query($bd, "INSERT INTO `course_details`(`course_id`, `college_id`, `country_id`, `course_name`, `course_details`, "
                . "`course_image`, `course_fees`, `course_time`, `requirements`, `course intake`, `status`,`course_type`,`course_short_name`)"
                . " VALUES ('','$college_names','$country','$coursename','$coursedetail','$target_path','$typefees','$typeduration','$renames','$names','1','$type','$course_short_name')");
        if ($sl) {

            echo "<SCRIPT>window.location.href='list_courses.php'</script>";
            $_SESSION["msg"] = "Y";
        } else {
            echo "<SCRIPT>window.location.href='list_courses.php'</script>";

            $_SESSION["msg"] = "N";
        }
        break;

    //course end
    //branch start
    case 'add_branch_amount':

        $branch_name = $_POST['branch_name'];
        $amount = $_POST['amount'];
        $Date = date("Y-m-d H:i:s");
        $reason = "Amount Added by admin";

        $sql = mysqli_query($bd, "INSERT INTO `tbl_branch_amount`(`branch_amt_id`, `branch_id`, `branch_amt`, `branch_amt_created_on`, `branch_amt_status`)"
                . " VALUES ('','$branch_name','$amount','$Date','1')");
        $sql = mysqli_query($bd, "INSERT INTO `tbl_balance_sheet`(`balance_sheet_id`, `branch_id`, `amount_reason`, `balance_sheet_credit`, `balance_sheet_debit`, `created_on`)"
                . " VALUES ('','$branch_name','$reason','$amount','','$Date')");

        if ($sql) {

            echo "1";
        } else {
            echo "2";
        }
        break;
    case 'add_pay':

        function GetImageExtension($imagetype) {

            if (empty($imagetype))
                return false;

            switch ($imagetype) {

                case 'image/bmp': return '.bmp';

                case 'image/gif': return '.gif';

                case 'image/jpeg': return '.jpg';

                case 'image/png': return '.png';
                case 'application/png': return '.pdf';

                default: return false;
            }
        }

        $file_name = $_FILES["bill"]["name"];

        $temp_name = $_FILES["bill"]["tmp_name"];

        $imgtype = $_FILES["bill"]["type"];
        $ext = GetImageExtension($imgtype);

        $imagename = date("d-m-Y") . "-" . time() . $ext;
        $target_path = "bills/" . $imagename;
        move_uploaded_file($temp_name, $target_path);

        $amount = $_POST['amount'];
        $reason = $_POST['reason'];
        $Date = date("Y-m-d H:i:s");

        $branch_id = $_SESSION['branch_id'];

        $sql = mysqli_query($bd, "INSERT INTO `tbl_voucher`(`id`, `amttowards`, `date`, `reason`, `branch_idfk`, `status`,`bills`) "
                . "VALUES ('','$amount','$Date','$reason','$branch_id','0','$target_path')");
        $ids = mysqli_insert_id($bd);
        $sql = mysqli_query($bd, "INSERT INTO `tbl_balance_sheet`(`balance_sheet_id`, `branch_id`, `amount_reason`, `balance_sheet_credit`,"
                . " `balance_sheet_debit`, `created_on`,`bills`,`balance_sheet_status`,`voucher_id`)"
                . " VALUES ('','$branch_id','$reason','','$amount','$Date','$target_path','0','$ids')");

        if ($sql) {

            echo "1";
        } else {
            echo "2";
        }
        break;


    case 'approval':

        $id = $_POST['id'];


        $sql = mysqli_query($bd, "UPDATE `tbl_balance_sheet` SET `balance_sheet_status`='1' WHERE `balance_sheet_id`='$id'");
        $sqls = mysqli_fetch_array(mysqli_query($bd, "SELECT `voucher_id` FROM `tbl_balance_sheet`WHERE `balance_sheet_id`='$id'"));
        $t = $sqls['voucher_id'];
        $sqlss = mysqli_query($bd, "UPDATE `tbl_voucher` SET `status`='1' WHERE  `id`='$t'");

        if ($sqlss) {

            echo "Approved Successfully";
        } else {
            echo "Server Error Please Contact Service Provider ";
        }
        break;

    case 'add_admin':


        $permission = "3";

        $reason = $_POST['country'];

        $password = md5($_POST['password']);
        $profile = "profile/4.jpg";
        $Date = date("Y-m-d H:i:s");
        $sqls = mysqli_num_rows(mysqli_query($bd, "select * from admin where `user_name`='$reason'"));
        if ($sqls == 0) {

            $sql = mysqli_query($bd, "INSERT INTO `admin`(`admin_id`, `user_name`, `password`, `branch_id`, `admin_photo`, `permission`, `status`)
               VALUES ('','$reason','$password','','$profile','$permission','1') ");

            if ($sql) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }
        break;


    case 'add_branch':


        $name = $_POST['name'];
        $countname = count($name);
        $names = '';
        $renames = '';

        $branch_name = $_POST['branch_name'];
        $branch_head = $_POST['branch_head'];
        $branch_amount = $_POST['branch_amount'];
        $Date = date("Y-m-d H:i:s");
        $sqls = mysqli_num_rows(mysqli_query($bd, "select * from tbl_branch where `branch_name`='$branch_name'"));
        if ($sqls == 0) {

            $sql = mysqli_query($bd, "INSERT INTO `tbl_branch`(`branch_id`, `branch_name`, `branch_head`, `branch_status`) "
                    . "VALUES ('','$branch_name','$branch_head','1')");
            $c = mysqli_insert_id($bd);
            $sql5 = mysqli_query($bd, "INSERT INTO `tbl_branch_amount`(`branch_amt_id`, `branch_id`, `branch_amt`, `branch_amt_created_on`, `branch_amt_status`) "
                    . "VALUES ('','$c','$branch_amount','$Date','1')");
            $reason = "Amount Added by admin";

            $sql6 = mysqli_query($bd, " INSERT INTO `tbl_balance_sheet`(`balance_sheet_id`, `branch_id`, `amount_reason`, `balance_sheet_credit`, `balance_sheet_debit`, `bills`, `created_on`) VALUES ('','$c','$reason','$branch_amount','','','1')");

            $sql3 = mysqli_query($bd, "UPDATE `admin` SET `branch_id`='$c',`permission`='2' WHERE `admin_id`='$branch_head'");
            for ($i = 0; $i < $countname; $i++) {
                $names = $name[$i];
                $sql4 = mysqli_query($bd, "UPDATE `admin` SET `branch_id`='$c',`permission`='3' WHERE `admin_id`='$names'");
            }
            if ($sql) {
                echo $name;
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }
        break;
    //branch end
    //
        //
        //
       //add applicatiom 
    case 'add_fields':
        $field_name = $_POST['field_name'];
        $field_namecount = count($field_name);
        $sql3 = mysqli_query($bd, "DELETE FROM `tbl_add_fields`");

        for ($i = 0; $i < $field_namecount; $i++) {
            $renames = $field_name[$i];
            if ($renames != '') {
                $sql = mysqli_query($bd, "INSERT INTO `tbl_add_fields`(`field_id`, `field_name`, `field_status`) VALUES ('','$renames','1')");
            }
        }

        if ($sql) {

            echo "<SCRIPT>window.location.href='applicant_add_fields.php'</script>";
            $_SESSION["msg"] = "Y";
        } else {
            echo "<SCRIPT>window.location.href='applicant_add_fields.php'</script>";

            $_SESSION["msg"] = "N";
        }






        break;
//timeline add

    case 'timelineadd':

        $field_name = $_POST['field_name'];
        $field_area = $_POST['field_area'];
        $field_namecount = count($field_name);

        $college_names = $_POST['college_names'];
        $app_course = $_POST['app_course'];
        $country = $_POST['country'];
        $renames = $_POST['renames'];
        $sql_check = mysqli_query($bd, "SELECT `timeline_id` FROM `timeline` where `course_id`='$app_course'");
        $chck_res = mysqli_num_rows($sql_check);
        if ($chck_res == 0) {
            for ($i = 0; $i < $field_namecount; $i++) {
                $renames = $field_name[$i];
                $areas = $field_area[$i];
                if ($renames != '') {
                    $sql = mysqli_query($bd, "INSERT INTO `timeline`(`timeline_id`, `college_id`, `course_id`, `country_id`, `timeline_name`,`timline_description`,`status`)"
                            . " VALUES ('','$college_names','$app_course','$country','$renames','$areas','1')");
                }
            }
            if ($sql) {

                echo "<SCRIPT>window.location.href='list_timeline.php'</script>";
                $_SESSION["msg"] = "Y";
            } else {
                echo "<SCRIPT>window.location.href='list_timeline.php'</script>";

                $_SESSION["msg"] = "N";
            }
        } else {
            echo "<SCRIPT>window.location.href='list_timeline.php'</script>";
            $_SESSION["msg"] = "NA";
        }



        break;


    //add amount
    case 'add_amount':
        $Date = date("Y-m-d H:i:s");
        $collection_application_amount = $_POST['amount'];

        $inv_cunts = $_POST['id'];
        $sql3 = mysqli_fetch_array(mysqli_query($bd, "SELECT `applicant_paymnt` FROM `tbl_application` WHERE `applicant_id`=$inv_cunts"));
        $total = $sql3['applicant_paymnt'] + $collection_application_amount;
        $sql4 = mysqli_query($bd, "UPDATE `tbl_application` SET `applicant_paymnt`= '$total' WHERE `applicant_id`=$inv_cunts");

        $sql2 = mysqli_query($bd, "INSERT INTO `tbl_collection`(`collection_id`, `collection_application_id`, "
                . "`collection_application_amount`, `collection_created_on`, `collection_status`)"
                . " VALUES ('','$inv_cunts','$collection_application_amount','$Date','1')");

        if ($sql2) {

            echo "<SCRIPT>window.location.href='applicant_list.php'</script>";
            $_SESSION["msgs"] = "YY";
        } else {
            echo "<SCRIPT>window.location.href='applicant_list.php'</script>";

            $_SESSION["msgs"] = "NN";
        }
        break;
}

  
       