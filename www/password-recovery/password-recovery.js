/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $(document).on("click",".btn-reset-password",function(){
        $("#password-recovery-form").validate({
            rules: {
                emailToRecoverPassword: {
                    required: true,
                    email: true
                }
            },
            messages: {
                emailToRecoverPassword: {
                    required: "Please fill out this fiel."
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
                var email = $('#emailToRecoverPassword').val();
                var btnresetpassword = $('#btn-reset-password').val();

                $.ajax({
                    method: 'POST',
                    url: '../secure/service/password-recovery',
                    data: {email: email},
//                    beforeSend: function(){
//                        btnresetpassword.html("<i class='fa fa-spinner fa-spin'></i>");
//                    },
                    success: function(result){
                        if(result === "mail-sent-success")
                        {
                            M.toast({html: 'Password recovery link sent to you successfully', classes: 'green'});
                        }
                        else if(result === "mail-sent-error")
                        {
                            M.toast({html: 'Password could not be recovered. Please try agin', classes: 'red'});
                        }
                        else if(result === "error")
                        {
                            M.toast({html: 'Message not sent. Please try again later.', classes: 'red'});
                        }
                        else if(result === "exist")
                        {
                            M.toast({html: 'Account with this email does not exist. Please create one.', classes: 'orange'});
                        }
                    }
//                    complete: function(){
//                        btnresetpassword.html("Reset");
//                    }
                });
            }
        });
    });
});
