	 //course//
function getNewVal(id)
{
	
	var gettype = "get_course";
	
	$.ajax({
type : 'POST',
url : 'get_course.php',
     data: {
id:id,
gettype:gettype,
},
success : function(response){
	//alert(response);
 $("#app_course").html("");
 $("#app_course").append(response);
}
});
}


//type part-full time//

function getcourseVal(val)
{
	var gettype = "get_type";
	$.ajax({
type : 'POST',
url : 'get_course.php',
     data: {
id:val,

gettype:gettype,
},
success : function(response){
	//alert(response);
 $("#type_course").html("");
 $("#type_course").append(response);
 
}
});
}
//type amount time//
function getcourseAmt(amt)
{
	var gettype = "get_amt";
	
		var course = $('#app_course').val();
		

	
	$.ajax({
type : 'POST',
url : 'get_course.php',
     data: {
id:amt,
gettype:gettype,
course:course,
},
success : function(response){
//alert(response);
 $("#course_amt").val(response);
 
}
});
}
