
function ValidateFileUpload() {
    var fuData = document.getElementById('files');
    var FileUploadPath = fuData.value;
    $('#errorid').html('');
//To check if user upload any file
    if (FileUploadPath != '')
            // $('#errorid').html('Please upload an image');

            {
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



    