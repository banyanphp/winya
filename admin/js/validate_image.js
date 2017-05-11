
function ValidateFileUpload() {
    var fuData = document.getElementById('fileChooser');
    var FileUploadPath = fuData.value;
    $('#error_login').html('');
//To check if user upload any file
    if (FileUploadPath == '') {
        $('#error_logins').html('Please upload an image');
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
            $('#error_logins').html('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.');

            setTimeout(function () {
                $('#error_login').html('');
            }, 2000);
            document.getElementById('fileChooser').value = '';
        }
    }
}
function checkform(theform) {




    if (document.theform.countryname.value == "")
    {
        
        $('#error_login').html('Enter Country Name');
        document.theform.countryname.focus();
        return false;
    }



    if (document.theform.fileChooser.value == "")
    {
        $('#error_login').html('Choose Image');
        document.theform.fileChooser.focus();
        return false;
    }

}

function checkforms(theforms) {





    if (document.theforms.countrynames.value == "")
    {

        $('#error_logins').html('Enter Country Name');
        document.theform.countryname.focus();
        return false;
    }



}
$(document).ready(function () {
    $(document).on("keyup", "input#countryname", function () {

        $('#error_login').html('');
    });
    $(document).on("keyup", "input#fileChooser", function () {

        $('#error_login').html('');
    });
    $(document).on("keyup", "input#countrynames", function () {

        $('#error_logins').html('');
    });
    $(document).on("keyup", "input#fileChoosers", function () {

        $('#error_logins_img').html('');
    });
});
function viewcountry(id) {


    $.ajax({
        type: "POST",
        url: 'update_country.php',
        data: {
            id: id,
        },
        success: function (data)
        {
            //alert(data);
            $('#dataresponse').html(data);
            $('#myModal12').modal('show');

            //location.reload();
        },
    });






}
function ValidateFileUploads() {
    var fuData = document.getElementById('fileChoosers');
    var FileUploadPath = fuData.value;
    $('#error_logins_img').html('');
//To check if user upload any file
    if (FileUploadPath == '') {
        $('#error_logins_img').html('Please upload an image');
        setTimeout(function () {
            $('#error_logins_img').html('');
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
            $('#error_logins_img').html('Photo only allows file types of GIF, PNG, JPG, JPEG and BMP.');

            setTimeout(function () {
                $('#error_logins_img').html('');
            }, 2000);
            document.getElementById('fileChoosers').value = '';
        }
    }
}
  function deletecountry(id) {



                var result = confirm("Are you sure for delete ?");
                //alert(id);
                if (result)
                {
                    // alert('sss');
                    $.ajax({
                        type: "POST",
                        url: 'store.php?action=delete_country',
                        data: {
                            id: id,
                        },
                        success: function (data)
                        {
                            alert(data);
                            // alert("Category is Updated Successfully");    

                            location.reload();
                        },
                    });

                }




            }