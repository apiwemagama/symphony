/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#resetForm").validate({
        rules: {
            password: {
                required: true,
                rangelength: [8, 15]
            },
            confirmation: {
                required: true,          
                equalTo: "#password"
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
            var url = window.location.href;
            var obj = new URL(url);
            var params = new URLSearchParams(obj.search);
            
            var token = params.get('token');
            var password = $('#password').val();
            
            var button = $('.reset'); 
            
            $.ajax({
                method: 'GET',
                url: '../../secure/service/password-reset',
                contentType: 'application/json',
                data: {token: token, password: password},
                beforeSend: function(){
                    button.html("<i class='fa fa-spinner fa-spin'></i>");
                },
                success: function(response){
                    M.toast({html: ''+response.message, classes: 'green'});
                },
                error: function(response){
                    M.toast({html: ''+response.message, classes: 'amber'});
                },
                complete: function(){
                    button.html("SUBMIT");
                }
            });
        }
    });
});
