$(function () {
		$("#first_name").focus();
    $("#applicant_submit").click(function () {

        var data = $("#applicat_add").serialize();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var mail = $("#mail").val();
        var cont_no = $("#cont_no").val();
        var sec_cont_no = $("#sec_cont_no").val();
        var addr1 = $("#addr1").val();
        var addr2 = $("#addr2").val();
        var city = $("#city").val();
        var stat = $("#stat").val();
        var pin = $("#pin").val();
        var resident_count = $("#resident_count").val();
        var app_cuntry = $("#app_cuntry").val();
        var university_name = $("#university_name").val();
        var app_course = $("#app_course").val();
        var type_course = $("#type_course").val();
        var course_amt = $("#course_amt").val();
        var initial_amt = $("#initial_amt").val();
		
        if (first_name == '')
        {

            $('#errors').html('Enter First Name');
            $("#first_name").focus();

            return false;
        }
        if (last_name == '')
        {

            $('#errors').html('Enter Last Name');
            $("#last_name").focus();

            return false;
        }   
		 if (mail != '') {
            var x = $("#mail").val();
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                $('#errors').html('Enter vaild Email address');
                $("#mail").focus();
                return false;
            }
        }

		if(isNaN(cont_no))
		{
			$('#errors').html('Enter Mobile Number');
            $("#cont_no").focus();
			return false;
			}
		if(isNaN(sec_cont_no))
		{
			$('#errors').html('Enter Mobile Number');
            $("#sec_cont_no").focus();
			return false;
			}

        if (cont_no == '')
        {
            $('#errors').html('Enter Mobile Number');
            $("#cont_no").focus();
            return false;
        }
        
        if (addr1 == '')
        {
            $('#errors').html('Enter Address');
            $("#addr1").focus();

            return false;
        }
		if (city == '')
        {
            $('#errors').html('Enter City');
            $("#city").focus();

            return false;
        }
		if (stat == '')
        {
            $('#errors').html('Enter State');
            $("#stat").focus();

            return false;
        }
		if (pin == '')
        {
            $('#errors').html('Enter Pincode');
            $("#pin").focus();

            return false;
        }
		if (resident_count == '')
        {
            $('#errors').html('Enter Resident country');
            $("#resident_count").focus();

            return false;
        }
		if (app_cuntry == '')
        {
            $('#errors').html('Select Country Name');
            $("#app_cuntry").focus();

            return false;
        }
		if (university_name == '')
        {
            $('#errors').html('Select University Name');
            $("#university_name").focus();

            return false;
        }
		if (app_course == 0)
        {
            $('#errors').html('Select Course');
            $("#Course").focus();

            return false;
        }
		if (type_course == 0)
        {
            $('#errors').html('Select Type of Course');
            $("#type_course").focus();

            return false;
        }if (course_amt == '')
        {
            $('#errors').html('Enter Course Amount');
            $("#course_amt").focus();

            return false;
        }if (initial_amt == '')
        {
            $('#errors').html('Enter Initial Amount');
            $("#initial_amt").focus();

            return false;
        }
		else {

            $.ajax({
                type: 'POST',
                url: 'add_applicant_process.php',
                data: data,
                beforeSend: function () {
					//alert();
                    $("#errors").html('');
	$("#applicant_submit").html('Please wait');
                },
                success: function (correct_process) {
					//alert(correct_process);
			
					var responce = correct_process,
					obj = JSON.parse(responce);
					
					var correct_process1 = obj.sucess;
					var correct_process2 = obj.qno;

                    if (correct_process1 == 1) {
						
                        $("#success").html("Application added successfully!");
						     setTimeout(function () {
                        $('#success').html('');
						window.location.href="invoice_mail.php?id="+correct_process2;	
                    }, 2000);
											

                    } 
					
					else {
					
$("#errors").html("Already Registered");
 setTimeout(function () {
                        $('#errors').html('');
                    }, 2000);
                    }
            // document.getElementById("applicat_add").reset();
               


                   


                }
            });
        }
        return false;
    });
});
