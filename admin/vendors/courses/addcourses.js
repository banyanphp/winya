$(function () {
   
    $(document).on("keyup", "input#college_name", function() {
        $("#errorid").html("")
    });
    $(document).on("keyup", "input#country", function() {
        $("#errorid").html("")
    });
       $(document).on("keyup", "input#coursename", function() {
        $("#errorid").html("")
    });
    $(document).on("keyup", "#year", function() {
        $("#errorid").html("")
    });
       $(document).on("keyup", "#files", function() {
        $("#errorid").html("")
    });
      
     
   
    $("#add_college").on("submit", (function(g) {
        g.preventDefault();
        var i = $("#college_name").val();
        var f = $("#country").val();
       
        var m = $("#coursename").val();
        var h = $("#year").val();
        var file = $("#files").val();  
        var part_duration = $("#part_duration").val();
            var part_fees = $("#part_fees").val();
               var full_duration = $("#full_duration").val();
            var full_fees = $("#full_fees").val();
        var c = 10;

        if (m == "") {
            $("#errorid").html("Please Enter Name");
            $("#coursename").focus();
            return false
        }
        if (f == "0") {
             
            $("#errorid").html("Select country");
               $("#country").focus();
            return false
        }
        if (i == "0") {
            $("#errorid").html("Select College");
            $("#college_name").focus();
            return false
        }
                  
      
       
        if (h == "") {
            $("#errorid").html("Enter year");
            $("#year").focus();
            return false
        }
      return false
    
    
    }));
   
        
        
        
        
        
    });

function ValidateFileUploads() {
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



    