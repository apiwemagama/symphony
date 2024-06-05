/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please fill out this field."
            },
            password: {
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
        submitHandler: function()
        {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var session = document.getElementById('session').checked;

            $.ajax({
                async: true,
                cache: false,
                contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
                crossDomain: true,
                method: 'GET',
                url: 'service/login.php',
                data: {email: email, password: password, session: session},
                dataType: 'JSON',
                beforeSend: function(){
                    document.getElementById("login").innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
                },
                success: function(result){
                    if(result.response === "success")
                    {
                        sessionStorage.setItem("fullname", result.fullname);
                        sessionStorage.setItem("email", result.email);
                        
                        window.location.href = "app.php#!/analytics";
                    }
                    else if(result.response === "error")
                    {
                        M.toast({html: 'Your password is incorrect', classes: 'red'});
                    }
                },
                error: function(){
                    M.toast({html: 'Account does not exist', classes: 'red'});
                },
                complete: function(){
                    document.getElementById("login").innerHTML = "Login";
                }
            });
        }
    });
});
