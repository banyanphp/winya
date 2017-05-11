$(function () {


    $("#timeline").click(function () {
        
        var result = confirm("Are you sure to confirm update process ?");
        //alert(id);
        if (result)
        {
            if ($(this).is(":checked"))
            {

                var str = $("#demo-form2").serialize();

                var college_id = $("#college_id").val();
                var country_id = $("#country_id").val();
                var course_id = $("#course_id").val();
                var timeline_id = $("#timeline").val();
                var applicant_id = $("#applicant_id").val();
                //alert(college_id); alert(country_id); alert(course_id);
                $.ajax({
                    type: "GET",
                    url: "get_details.php",
                    cache: true,
                    data: str,
                    success: function (html) {

                        $("#currentdate").show();
                        $("#currentdate").html(html);
                     $("#timeline").attr("disabled", true);

                     location.reload();
                    }
                });
            }
        }
        else{
            $('#timeline').attr('checked', false); 
        }
    });
});



$(document).ready(function () {
    $(".proceed").click(function () {
        var single_cal1 = $("#single_cal1").val();

        var today = new Date();
        var myDate = new Date(single_cal1);




        var applicant_id = $("#applicant_id").val();
        var timeline_id = $("#timeline").val();
        if (single_cal1 == '')
        {
            $('#error').html('Please Select Date');
            $("#single_cal1").focus();
            return false;
        } else if (myDate < today) {

            $('#error').html('');
            $('#error').html('Please Select Future Date');
            $("#single_cal1").focus();
            return false;
        } else {
            $.ajax({
                type: "GET",
                url: "update_process.php",
                cache: true,
                data: ({date: single_cal1,
                    timeline_id: timeline_id,
                    applicant_id: applicant_id,
                }),
                success: function (html) {
                   
$('#error').html('');
                    if (html == 1) {
                        $("#expecteddate").html("Expected to complete on " + single_cal1);
                        $("#dates").hide();
                        $("#submit-hide").hide();

                    } else if (html == 3) {
                        $('#error').html('');
                        $('#error').html('Please Select Future Date');

                    } else if (html == 2) {
                        $('#error').html('');
                        $('#error').html('Something Error occured.Please Contact Your service Provider');

                    }

                }
            });
        }
    });
});

function bigimg() {
    $('#error').html('');
}

        