else {
            $("#errorid").html("");
            $("#flash").show();
            $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
            $.ajax({
                url: "store.php?action=add_courses",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(e) {
                 // alert(e);
                    $("#flash").hide();
                    $("#errorid").html('');
                    if (e == 1) {
                        $("#success").html("Course Added Successfully");
                         setTimeout(function() {
                       window.location.href='list_courses.php';
                    }, 2000)
                    } else {
                        if (e == 2) {
                            $("#errorid").html("Error Occured Please Try again Later");
                        }
                    }   
               
                    document.getElementById("add_college").reset();
                    setTimeout(function() {
                        $(".response").hide()
                    }, 3000)
                }
            })
        }