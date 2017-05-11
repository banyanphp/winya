<?php
$id = $_POST['id'];

 ?>	
	<div tabindex="-1" role="dialog" aria-labelledby="modalWithForm" class="modal fade bs-example-modal-form-change-password" id="modal_pass">
                            <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        <h4 id="modalWithForm" class="modal-title">Change Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" method="POST" name="theform">

                                            <input type="hidden" value="add_admin" name="action">
                                            <div class="form-group">
                                                <label for="password"> Current Password</label>
                                                <input name="cpassword" id="cpassword" type="text" placeholder="Enter Current Password" class="form-control">
                                                <span id="error_login"></span>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input name="password" id="password" type="text" placeholder="Enter Password" class="form-control">
                                                <span id="error_login"></span>
                                            </div> 
                                            <div class="form-group">
                                                <label for="repeat password">Repeat Password</label>
                                                <input name="rpassword" id="rpassword" type="text" placeholder="Enter  Repeat Password" class="form-control">
                                                <span id="error_login"></span>
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            <div id="error_login"></div>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div> 