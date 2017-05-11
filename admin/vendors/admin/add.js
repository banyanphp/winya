$(function() {
    $(document).on("keyup", "input#type", function() {
        $("#errors").html("")
    });
    $(document).on("keyup", "input#countryname", function() {
        $("#errors").html("")
    });
    $(document).on("keyup", "input#branch_name", function() {
        $("#errors").html("")
    });
    $(document).on("keyup", "#message", function() {
     
        $("#errors").html("")
    });
    $(".proceedbutton").click(function() {
        
       // var b = $("#type").val();
        var e = $("#countryname").val();
      
        var i = $("#message").val();
           var password = $("#password").val();
   var rpassword = $("#rpassword").val();
        var f = $("#add_amount").serialize();
        var h = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
       
        if (e == "") {
            $("#errors").html("Enter Username");
            $("#countryname").focus();
            return false
        }
      
       
         if (password.length == 0) {
                            $('#errors').html('Enter Password');
                            //alert("Enter Password");
                          
                             $("#password").focus();
                            return false;
                        }
                        // check for minimum length
                        var minLength = 6; // Minimum length
                        if (password.length < minLength) {
                            $('#errors').html('Your password must be at least ' + minLength + ' characters long. Try again.');
                            $("#password").focus();
                            return false;
                        }

                        if (password!=rpassword) {
                            $('#errors').html('Password does not match. Please make sure.');
 $("#rpassword").focus();
                           
                            return false;
                        }
		
        if (i == "") {
            $("#errors").html("Enter message");
            $("#message").focus();
            return false
        } else {
            $("#errors").html("");
            $("#flash").show();
            $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
            $.ajax({
                type: "POST",
                url: "store.php?action=add_admin",
                data: f,
                cache: true,
                success: function(j) {
                 
                    $("#flash").hide();
                    $("#errors").html("");
                    if (j == 1) {
                        $("#success").html("Successfully Added");
                    } else if(j==3){
                       
                              $("#errors").html("Already Exist");
                        
                    }
                    else{
                        $("#errors").html("Error Occured");
                    }
                    document.getElementById("add_amount").reset();
                    setTimeout(function() {
                         $("#success").html("");
                       $("#errors").html("");
                        $('#modal').modal('toggle');
                    }, 3000)
                }
            })
        }
        return false
    })
});