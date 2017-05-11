<?php 
include('include/config.php');
$adm_id = $_SESSION['adm_id'];    

$query = mysqli_query($bd,"SELECT * FROM `admin` WHERE `admin_id`='$adm_id'");
$res=mysqli_fetch_array($query);
 $imgs	= $res['admin_photo'];
 
 ?>
	<div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $imgs; ?>" alt="">winya
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-form-change-profile">  Change Profile Image</a></li>
                    <li><a href="javascript:void(0);" data-toggle="modal" data-target=".bs-example-modal-form-change-password"
					onclick="viewprofile(<?php echo $adm_id; ?>)"> Change Password</a> </li>
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
 
                        <div tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade bs-example-modal-form-change-profile">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        <h4 id="modalWithForm" class="modal-title">Change Profile Image</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" enctype="multipart/form-data" method="POST" name="theform" enctype="multipart/form-data" onSubmit="return checkform();">

                                           <?php 
											if(isset($_POST['img_submit'])){
												
												move_uploaded_file($_FILES['file']['tmp_name'],"profile/".$_FILES['file']['name']);
												$upl="profile/".$_FILES['file']['name'];
												
													$sql= mysqli_query($bd,"UPDATE `admin` SET `admin_photo`='$upl' WHERE `admin_id`='$adm_id' ");

													if($sql){
														echo 'done';
													}
											}
										   ?>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Choose file</label>
                                                <input type="file" name="file" id="file"  onchange="return ValidateFileUpload()" />
                                                <span id="error_login"></span>
                                            </div> 
                                            <div class="pull-right">
                                                <button type="submit" name="img_submit" id="img_submit" class="btn btn-primary">Save</button>
                                            </div>
                                            <div id="error_login"></div>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div> 
             
<!--                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>-->
            </nav>
          </div>
        </div>
		     <span id="dataresponse"></span>
			 
		<!-- end main-content -->
  <script>
  
 function viewprofile(id) {
	 
	 //alert();
                $.ajax({
                    type: "POST",
                    url: 'changepass_model.php',
                    data: {
                        id:id,
                    },
                    success: function (data)
				alert(data);
                    {
                        alert(data);
                        $('#dataresponse').html(data);
                        $('#modal_pass').modal('show');

                        //location.reload();
                    },
                });






            }

</script>
<script>
function ValidateFileUpload() {
    var fuData = document.getElementById('fileChooser');
    var FileUploadPath = fuData.value;
    $('#error_login').html('');
//To check if user upload any file
    if (FileUploadPath == '') {
        $('#error_login').html('Please upload an image');
        setTimeout(function () {
            $('#error_login').html('');
        }, 2000);
    } else {
        var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg") {

// To Display
            if (fuData.files && fuData.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(fuData.files[0]);
            }

        }

//The file upload is NOT an image
        else {
            $('#error_login').html('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.');

            setTimeout(function () {
                $('#error_login').html('');
            }, 2000);
            document.getElementById('fileChooser').value = '';
        }
    }
}
</script>

