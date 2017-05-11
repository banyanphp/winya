$(function () {
    $(document).on("keyup", "input#amount", function() {
        $("#errorid").html("")
    });
    $(document).on("keyup", "input#reason", function() {
        $("#errorid").html("")
    });
   

   
    $("#add_amount").on("submit", (function(g) {
   
        g.preventDefault();
        var i = $("#amount").val();
         var f = $("#reason").val();
          var j = $("#bill").val();
        if (i == "") {
            $("#errorid").html("Enter amount");
            $("#amount").focus();
            return false
        }
        if (f == "") {
            $("#errorid").html("Enter Reason");
            $("#reason").focus();
            return false
        }
  if (j == "") {
            $("#errorid").html("Please Attach Bills");
            $("#bill").focus();
            return false
        }
      
    
   
        else {
            
            $("#errorid").html("");
            $("#flash").show();
            $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
            $.ajax({
                url: "store.php?action=add_pay",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(e) {
                 
                    $("#flash").hide();
                    $("#errorid").html("");
                    if (e == 1) {
                        $("#success").html("Amount Added Successfully");
                         setTimeout(function() {
                       window.location.href='list_branch_admin.php';
                    }, 2000)
                    } else {
                        if (e == 2) {
                            $("#errorid").html("Error Occured Please Try again Later");
                        }
                    }   
               
                    document.getElementById("add_amount").reset();
                    setTimeout(function() {
                        $(".response").hide()
                    }, 3000)
                }
            })
        }
    }));
   
        
        
        
        
        
    });

function ValidateFileUploads() {
    var fuData = document.getElementById('bill');
    var FileUploadPath = fuData.value;
    $('#errorid').html('');
//To check if user upload any file
    if (FileUploadPath == '') {
        $('#errorid').html('Please upload an Bill');
        setTimeout(function () {
            $('#errorid').html('');
        }, 2000);
    } else {
        var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                || Extension == "jpeg" || Extension == "jpg"|| Extension == "pdf") {

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
            alert("Bills only allows file types of GIF, PNG, JPG, JPEG ,BMP amd PDF.");

            setTimeout(function () {
                $('#errorid').html('');
            }, 2000);
            document.getElementById('bill').value = '';
        }
    }
}



    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


