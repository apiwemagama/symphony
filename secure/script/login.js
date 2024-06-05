/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#modal-default-login-form").validate({
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
        submitHandler: function(){
            var email = $('#email').val();
            var password = $('#password').val();
            var btnlogin = $('#btn-login');

            $.ajax({
                async: true,
                cache: false,
                contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
                crossDomain: true,
                method: 'GET',
                url: '../secure/service/login',
                data: {email: email, password: password},
                dataType: 'JSON',
                beforeSend: function(){
                    $(".btn-login").html("<i class='fa fa-spinner fa-spin'></i>");
                },
                success: function(result){
                    if(result.response === "success")
                    {
                        sessionStorage.setItem("session", result.session);
                        
                        $('#modal-default-authorization, #modal-bottom-sheet-authorization').modal('close');
                        _session();
                        
                        $('#circular-label-1st-child, #circular-label-2nd-child').load('../secure/service/count-from-cart',{
                            session: sessionStorage.getItem('session')
                        });
                        $('#circular-label-2nd-child').load('../secure/service/count-from-cart',{
                            session: sessionStorage.getItem('session')
                        });
                    }
                    else if(result.response === "error")
                    {
                        M.toast({html: 'Your password is incorrect', classes: 'red'});
                    }
                    else
                    {
                        M.toast({html: 'Account does not exist', classes: 'red'});
                    }
                },
                complete: function(){
                    $(".btn-login").html("Login");
                }
            });
        }
    });
//    $("#modal-bottom-sheet-login-form").validate({
//        rules: {
//            emailnthof1st: {
//                required: true,
//                email: true
//            },
//            passwordnthof1st: {
//                required: true
//            }
//        },
//        messages: {
//            emailnthof1st: {
//                required: "Please fill out this field."
//            },
//            passwordnthof1st: {
//                required: "Please fill out this field."
//            }
//        },
//        errorElement: 'span',
//        errorPlacement: function(error, element){
//            var placement = $(element).data('error');
//            if(placement){
//                $(placement).append(error);
//            }
//            else
//            {
//                error.insertAfter(element);
//            }
//        },
//        submitHandler: function(){
//            var email = document.getElementById('emailnthof1st').value;
//            var password = document.getElementById('passwordnthof1st').value;
//            var btnlogin = $('#btn-login-nth-of-1st');
//
//            $.ajax({
//                async: true,
//                cache: false,
//                contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
//                crossDomain: true,
//                method: 'GET',
//                url: '../secure/service/login.php',
//                data: {email: email, password: password},
//                dataType: 'JSON',
//                beforeSend: function(){
//                    btnlogin.html("<i class='fa fa-spinner fa-spin'></i>");
//                },
//                success: function(result){
//                    if(result.response === "success")
//                    {
//                        sessionStorage.setItem("session", result.session);
//                        
//                        _session();
//                        
//                        $('#circular-label-1st-child, #circular-label-2nd-child').load('../secure/service/count-from-cart.php',{
//                            session: sessionStorage.getItem('session')
//                        });
//                        $('#circular-label-2nd-child').load('../secure/service/count-from-cart.php',{
//                            session: sessionStorage.getItem('session')
//                        });
//                        
//                        $('#modal-default-authorization, #modal-bottom-sheet-authorization').modal('close');
//                    }
//                    else if(result === "error")
//                    {
//                        M.toast({html: 'Your password is incorrect', classes: 'red'});
//                    }
//                    else
//                    {
//                        M.toast({html: 'Account does not exist', classes: 'red'});
//                    }
//                },
//                complete: function(){
//                    btnlogin.html("Login");
//                }
//            });
//        }
//    });
});
