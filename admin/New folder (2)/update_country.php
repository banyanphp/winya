
<?php
include ("session/session.php");
include ("include/config.php");
if($_SESSION['permission']!=1){
    header('location:page_403.php');
}
$permission = $_SESSION['permission'];
$name = $_SESSION['user'];





$id = $_POST['id'];
$q = "select * from country where status='1' and country_id='$id'";
$country_query=  mysqli_query($bd,$q);
$fetch_country = mysqli_fetch_array($country_query);
?>
      
<div class="modal fade" id="myModal12" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update County</h4>
            </div>
    <div class="modal-body">
                                            <form action="store.php" enctype="multipart/form-data" method="POST" name="theforms" onSubmit="return checkforms();">

					    <input type="hidden" value="update_country" name="action">
						<div class="form-group">
						  <label for="exampleInputEmail1">Country name</label>
                                                  <input name="country" id="countrynames" type="text" placeholder="Enter Country" class="form-control" value="<?php echo $fetch_country['country_name'];?>" >
                                                  <span id="error_logins"></span>
						</div>  
						<div class="form-group">
						  <label for="exampleInputEmail1">Country Flag</label>
                                                  <img src="images/country/<?php echo $fetch_country['flag']?> " class="img-responsive" style="width:80px;">
                                                  <input type="file" name="uploadedimage" id="fileChoosers"  onchange="return ValidateFileUploads()"  />
                                                  <span id="error_logins_img"></span>
						</div> 
                                            <div class="pull-right">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                             <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                            </div>
                                             <div id="error_login"></div>
                                          </form>
					</div>

         
        </div>



    </div>
</div>
