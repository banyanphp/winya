$(document).on("keyup", "input#usr_name", function () {

                        $('.error_login1').html('');
                    });
                    $(document).on("keyup", "input#usr_pass", function () {

                        $('.error_login2').html('');
                    }); 
$(function() {

	
$("#login_submit").click(function() {

var usr_name = $("#usr_name").val();
var password = $("#usr_pass").val();
var str = $( "#from_login" ).serialize();

if (usr_name == '') {
 $('.error_login1').html('Enter vaild Email address');
	$("#usr_name").focus();
	return false;
        }
		if (usr_name != '') {
            var x = $("#usr_name").val();
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                $('#error_login1').html('Enter vaild Email address');
                $("#usr_name").focus();
                return false;
            }
        }
if(password=='')
{
	$('.error_login2').html('Enter Password');
	$("#usr_pass").focus();
	return false;
}


else 
{
	
//	$('.error_login').html('Loading please wait....');


$.ajax({
type: "POST",
url: "login_check.php",
data: str,
cache: true,
success: function(html){
   //alert(html);
if(html==1)
{
	   $('#login_submit').html('<span>Loading...</span>');
	   setTimeout(function () {
           window.location.href='profile.php';
		    }, 2000);
}
else if(html==2){
       $('.error_login').html(''); 
    $('.error_login').html('Enter Valid Username And Password'); 
      setTimeout(function () {
        $('.error_login').html('');
                        }, 2000);
      document.getElementById("formlogin").reset();
}


}

});
}
return false;
});
});