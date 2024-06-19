/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $(document).on("click",".btn-register",function(){
        $("#register-form").validate({
            rules: {
                name: {
                    required: true
                },
                surname: {
                    required: true
                },
                emailnthof2nd: {
                    required: true,
                    email: true
                },
                passwordnthof2nd: {
                    required: true,
                    rangelength: [8, 15]
                },
                confirmationnthof2nd: {
                    required: true,
                    equalTo: "#passwordnthof2nd"
                }
            },
            messages: {
                name: {
                    required: "Please fill out this field."
                },
                surname: {
                    required: "Please fill out this field."
                },
                emailnthof2nd: {
                    required: "Please fill out this field."
                },
                passwordnthof2nd: {
                    required: "Please fill out this field."
                },
                confirmationnthof2nd: {
                    required: "Please fill out this field."
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error);
                } else
                {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(){
                var email = $('#emailnthof2nd').val();
                var password = $('#passwordnthof2nd').val();

                $.ajax({
                    async: true,
                    cache: false,
                    contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
                    crossDomain: true,
                    method: 'GET',
                    url: '../secure/service/register.php',
                    data: {email: email, password: password},
                    success: function(result){
                        if(result === "exist")
                        {
                            M.toast({html: 'Account already exists. Please login using your account.', classes: 'orange'});
                        }
                        else if(result === "success")
                        {
                            M.toast({html: 'Account created successfully. You may now login to your account.', classes: 'green'});
                        }
                        else if(result === "error")
                        {
                            M.toast({html: 'There was an error, account could not be created, please try again later.', classes: 'red'});
                        }
                    }
                });
            }
        });
    });
//    
});
