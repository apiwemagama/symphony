/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $(document).on("click",".btn-register",function(){
    $("#account-security-form").validate({
        rules: {
            password: {
                required: true,
                rangelength: [8, 15]
            },
            confirmation: {
                required: true,          
                equalTo: "#passwordnthof3rd"
            }
        },

        messages: {
            password: {
                required: "Please fill out this field."
            },
            confirmation: {
                required: "Please fill out this field."
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element){
            var placement = $(element).data('error');
            if(placement){
                $(placement).append(error);
            }
            else
            {
                error.insertAfter(element);
            }
        },
        submitHandler: function(){
            var session = sessionStorage.getItem("session");
            var password = $('#passwordnthof3rd').val();
            
            $.ajax({
                async: true,
                cache: false,
                contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
                crossDomain: true,
                method: 'GET',
                url: '../secure/service/security.php',
                data: {session: session, password: password},
                success: function(result){
                    if(result === 'success')
                    {
                        M.toast({html: 'Changes applied successfully', classes: 'grey'});
                    }
                    else
                    {
                        M.toast({html: 'Failed to update', classes: 'grey'});
                    }
                },
            });
        }
    });
    });
});
