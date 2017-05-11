$(document).on("keyup", "input#email_log", function () {

                        $('.error_login').html('');
                    });
                    $(document).on("keyup", "input#password_log", function () {

                        $('.error_login').html('');
                    });
$(function() {

	
$("#login_button").click(function() {

var email = $("#email_log").val();
var password = $("#password_log").val();
var str = $( "#formlogin" ).serialize();

if(email == '')
{
	$('.error_login').html('Enter Username');
	$("#email_log").focus();
	return false;
}
 

if(password=='')
{
	$('.error_login').html('Enter Password');
	$("#password_log").focus();
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
  beforeSend: function () {
	   $('#login_button').html('<span>Loading <img src="images/loading.svg"></span>');

                },
success: function(html){
     $('#login_button').html('Log in');
if(html==1)
{
	  
           window.location.href='home.php';
		    
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