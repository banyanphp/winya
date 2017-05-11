// AJAX call for autocomplete 
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "course_process.php",
		data:'keyword='+$(this).val(),
		
		success: function(data){
			//alert(data);
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			//$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}