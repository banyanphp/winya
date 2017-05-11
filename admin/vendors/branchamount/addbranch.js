$(function () {
    $(document).on("keyup", "input#branch_name", function() {
        $("#errors").html("")
    });



   
    $("#add_amount").on("submit", (function(g) {

        g.preventDefault();
        var i = $("#branch_name").val();
         var j = $("#branch_head").val();
            var k = $("#branch_amount").val();
           // alert(k);
        if (i == "") {
            $("#errorid").html("Enter Branch Name");
            $("#branch_name").focus();
            return false
        }
      
    if (j == "0") {
            $("#errorid").html("Select Branch head");
            $("#branch_head").focus();
            return false
        }
      
       if (k == "") {
            $("#errorid").html("Enter Branch Amount");
            $("#branch_amount").focus();
            return false
        }
   
        else {
            $("#errors").html("");
            $("#flash").show();
            $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
            $.ajax({
                url: "store.php?action=add_branch",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(e) {
                 
                    $("#flash").hide();
                    $("#errors").html("");
                    if (e == 1) {
                        $("#success").html("Branch Added Successfully");
                         setTimeout(function() {
                       window.location.href='list_branch.php';
                    }, 2000)
                    } else {
                        if (e == 2) {
                            $("#errors").html("Error Occured Please Try again Later");
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



    