$(function () {
	
    $("#srch_submit").click(function () {
		
			
		
        var cuntry_name = $("#cuntry_name").val();
        var searchbox = $("#search-box").val();
		
        if (cuntry_name == '' && searchbox == '')
        {
            $( "#dialog" ).show();
            $( "#dialog" ).html('Please enter the Feilds');
            return false;
        }
	else{
        document.srch_clg.submit();
	}
   
});
 });