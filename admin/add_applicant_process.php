<?php

include 'include/config.php';

session_start();



$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$mail = $_POST['mail'];
$cont_no = $_POST['cont_no'];
$sec_cont_no = $_POST['sec_cont_no'];
$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$city = $_POST['city'];
$stat = $_POST['stat'];
$pin = $_POST['pin'];
$resident_count = $_POST['resident_count'];
$app_cuntry = $_POST['app_cuntry'];
$university_name = $_POST['university_name'];
$app_course = $_POST['app_course'];
$type_course = $_POST['type_course'];
$course_amt = $_POST['course_amt'];
$initial_amt = $_POST['initial_amt'];
$branch_session_id = '1';
$Date = date("Y-m-d H:i:s");
$string = '';
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$max = strlen($characters) - 1;
for ($i = 0; $i < 6; $i++) {
    $string.= $characters[mt_rand(0, $max)];
}


$var_pass_enc = md5($string);

$data = '';
$datvalues = "";
$sql = mysqli_query($bd, "SELECT * FROM `tbl_add_fields`");
$count = mysqli_num_rows($sql);
while ($row = mysqli_fetch_assoc($sql)) {
    $t = $row['field_name'];
    $data.= $row['field_name'];
    $datvalues.= $_POST[$t];
    $data.= ",";
    $datvalues.=",";
}

$data = substr($data, 0, -1);
$datvalues = substr($datvalues, 0, -1);
$sql_check = mysqli_query($bd, "SELECT `applicant_mail` FROM `tbl_application` where `applicant_mail`='$mail'");
$chck_res = mysqli_num_rows($sql_check);
if ($chck_res == 0) {

    $sql_reg = mysqli_query($bd, "INSERT INTO `registration`(`reg_id`, `name`, `email`, `password`, `phone_no`, `created_at`, `status`) VALUES ('','$first_name','$mail','$var_pass_enc','$cont_no','$Date','1')");

    $sql_inv = mysqli_query($bd, "SELECT `applicant_invoice` FROM `tbl_application` ORDER BY `tbl_application`.`applicant_invoice` DESC");
    $fetch = mysqli_fetch_array($sql_inv);
    $inv_cunts = $fetch['applicant_invoice'];
    $inv_cunts++;

    $sql = mysqli_query($bd, ""
            . "INSERT INTO `tbl_application`(`applicant_id`,`applicant_invoice`,`applicant_firstname`, `applicant_sec_name`,"
            . " `applicant_eligiblity`,`applicant_gender`,`applicant_mail`, `applicant_phone`, `applicant_scndry_ph`, "
            . "`applicant_addr1`, `applicant_addr2`, `applicant_city`, `applicant_state`, `applicant_pincode`, `applicant_cuntry`, "
            . "`applicant_stdy_cuntry`,`applicant_univercity`, `applicant_course_id`, `applicant_type_course`, `applicant_course_amt`,"
            . " `applicant_paymnt`,`applicat_branch_id`,`applicant_status`,`applicant_createdon`,`application_fields`,`application_field_values`,`application_process_status`) VALUES "
            . "('','$inv_cunts','$first_name','$last_name','','$gender','$mail','$cont_no','$sec_cont_no',"
            . "'$addr1','$addr2','$city','$stat','$pin','$resident_count','$app_cuntry','$university_name',"
            . "'$app_course','$type_course','$course_amt','$initial_amt','$branch_session_id','1','$Date','$data','$datvalues','Process')");

 
    $confirmationlink = "http://epictech.in/winya/";
    $message = '<table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_4275388581297042370background-table" style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
  <tbody>
    <tr>
      <td valign="top" align="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%">
	  <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;padding:0;margin:0 auto;width:600px">
          <tbody>
            <tr>
              <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
			  <table cellpadding="0" cellspacing="0" border="0"  style="border-collapse:collapse;padding:0;margin:0;width:100%">
                  <tbody>
                    <tr>
                      <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:15px 0px 10px 5px;margin:0"><a href="http://epictech.in/winya/" style="color:#3696c2;float:left;display:block" target="_blank"> <img width="200" height="100" src="http://epictech.in/winya/admin/images/logo_winya.png" alt="kwikpatch" border="0" style="outline:none;text-decoration:none" ></a></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td valign="top" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px;margin:0;border:1px solid #ebebeb;background:#fff"><table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0;width:100%">
                  <tbody>
                    <tr>
                      <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"><table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0">
                          <tbody>
                            <tr>
                              <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 20px 15px;margin:0;line-height:18px"><h1 style="font-family:Verdana,Arial;font-weight:bold;font-size:25px;margin-bottom:25px;margin-top:5px;line-height:28px">Hello &nbsp;' . $first_name . $last_name . ',' . '</h1>
                                <p style="font-family:Verdana,Arial;font-weight:normal">Your email <a href="mailto:' . $mail . '" target="_blank">' . $mail . '</a> must be confirmed before using it to log in to our store.</p>
                                <p  style="font-family:Verdana,Arial;font-weight:normal;border:1px solid #c3ced4;padding:13px 18px;background:#f1f1f1"> Use the following values when prompted to log in:<br>
                                  <strong style="font-family:Verdana,Arial;font-weight:normal">Email:</strong> <a href="' . $mail . '" target="_blank">' . $mail . '</a><br>
                                  <strong style="font-family:Verdana,Arial;font-weight:normal">Password:</strong>' . $var_pass_enc . '</p>
                                <p style="font-family:Verdana,Arial;font-weight:normal">Click here to confirm your email and instantly log in (the link is valid only once):</p>
                                <table cellspacing="0" cellpadding="0"  style="border-collapse:collapse;padding:0;margin:0 auto;width:220px;text-align:center">
                                  <tbody>
                                    <tr>
                                      <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:middle;padding:0;margin:0 auto;background-color:#3696c2;color:#fff;width:100%;height:40px;display:block;border:0 none;text-align:center;text-transform:uppercase;white-space:nowrap">
                                          <a href="' . $confirmationlink . '" style="color:#3696c2;width:100%;height:100%;line-height:40px;font-size:15px;display:inline-block;text-decoration:none" target="_blank" >
                                              <span style="color:#fff">Click to Login Your Account</span></a></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p style="font-family:Verdana,Arial;font-weight:normal"> If you have any questions, please feel free to contact us at <a href="support@banyaninfotech.com" style="color:#3696c2" target="_blank">support@banyaninfotech.com</a> or by phone at <a style="color:#3696c2">+91 1234567890</a>. </p></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <h5  style="font-family:Verdana,Arial;font-weight:normal;text-align:center;font-size:22px;line-height:32px;margin-bottom:75px;margin-top:30px">Thank you, <span >Winya Education</span>
            !</h5></td>
    </tr>
  </tbody>
</table>';
       $sql2=mysqli_query($bd,"INSERT INTO `tbl_collection`(`collection_id`, `collection_application_id`, `collection_application_amount`, `collection_created_on`, `collection_status`)"
               . " VALUES ('','$inv_cunts','$initial_amt','$Date','1')");
 
    
    $sql3=mysqli_query($bd,"select timeline_id from timeline where college_id='$university_name' and `country_id`='$app_cuntry' and `course_id`='$app_course' limit 0,1");
   $sql4=  mysqli_fetch_array($sql3);
   $timeid=$sql4['timeline_id'];
           
$sql5=mysqli_query($bd,"select timeline_id from timeline where college_id='$university_name' and `country_id`='$app_cuntry' and `course_id`='$app_course' limit 1,1");
 $sql6=  mysqli_fetch_array($sql5);
   $timeid6=$sql6['timeline_id'];
           
    $sql2=mysqli_query($bd,"INSERT INTO `process_table`(`process_id`, `application_id`, `time_line_id`, `is_completed`, `completed_date`, `expected_date`, `status`) VALUES ('','$inv_cunts','$timeid','1','$Date','','1')");
 $sql2=mysqli_query($bd,"INSERT INTO `process_table`(`process_id`, `application_id`, `time_line_id`, `is_completed`, `completed_date`, `expected_date`, `status`) VALUES ('','$inv_cunts','$timeid6','0','','','1')");

    $to = $mail;
    $subject = 'Register Notification |Winya Education';
    $build = "Registration";
    $headers = "From:Winya<" . $build . ">\r\n";

    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 //   if (mail($to, $subject, $message, $headers)) {
        if($sql){    
            $_SESSION["msg"] = "Y";
    ?><script>window.location.href='invoice_mail.php?id=<?php echo $inv_cunts; ?>'</script><?php

    } else {

        echo "<SCRIPT>window.location.href='applicant_list.php'</script>";
            $_SESSION["msg"] = "N";
    }
} else {
       echo "<SCRIPT>window.location.href='applicant_list.php'</script>";
            $_SESSION["msg"] = "NA";
}
?>