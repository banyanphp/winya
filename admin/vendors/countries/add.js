$(function () {

   
    $("#add_countries").on("submit", (function(g) {
   
        g.preventDefault();
        var i = $("#countryname").val();
      
             var file = $("#fileChooser").val();
        var c = 10;
        if (i == "") {
            $("#error_logins").html("Please Enter Country name");
            $("#countryname").focus();
            return false
        }
      
    
          if (file == "") {
            $("#error_logins").html("Please upload Imaged");
            $("#fileChooser").focus();
            return false
        }
        else {
            $("#error_logins").html("");
            $("#flash").show();
            $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
            $.ajax({
                url: "store.php?action=add_country",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(e) {
                    alert(e);
                    $("#flash").hide();
                    $("#error_logins").html("");
                    if (e == 1) {
                        $("#success").html("Country Added Successfully");
                         setTimeout(function() {
                      // window.location.href='list_colleges.php';
                    }, 2000)
                    } else {
                        if (e == 2) {
                            $("#error_logins").html("Error Occured Please Try again Later");
                        }
                          if (e == 3) {
                            $("#error_logins").html("Already Exist");
                        }
                    }   
               
                 document.getElementById("add_countries").reset();
                    setTimeout(function() {
                        $("#success").html("");
                                               $("#error_logins").html("");
                       
                        $('#modal').modal('toggle');

                        $(".response").hide()
                    }, 3000)
                }
            })
        }
    }));
   
        
        
        
        
        
    });

function ValidateFileUpload() {
    var fuData = document.getElementById('files');
    var FileUploadPath = fuData.value;
    $('#errorid').html('');
//To check if user upload any file
    if (FileUploadPath == '') {
        $('#errorid').html('Please upload an image');
        setTimeout(function () {
            $('#errorid').html('');
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
            alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.");

            setTimeout(function () {
                $('#errorid').html('');
            }, 2000);
            document.getElementById('files').value = '';
        }
    }
}



    