/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $.validator.setDefaults({
        ignore: []
    });
    $("#profile-update-form").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            phone: {
                required: true
            },
            birthdate: {
                required: true
            },
            gender: {
                required: true
            },
            country: {
                required: true
            }
        },

        messages: {
            firstname: {
                required: "Please fill out this field."
            },
            lastname: {
                required: "Please fill out this field."
            },
            phone: {
                required: "Please fill out this field."
            },
            birthdate: {
                required: "Please fill out this field."
            },
            gender: {
                required: "Please fill out this field."
            },
            country: {
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
            var email = sessionStorage.getItem("session");
            
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var phone = $('#phone').val();
            var birthdate = $('#birthdate').val();
            var gender = $('#gender').val();
            var country = $('#country').val();

            $.ajax({
                async: true,
                cache: false,
                contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
                crossDomain: true,
                method: 'GET',
                url: '../secure/service/update.php',
                data: {email: email, firstname: firstname, lastname: lastname, phone: phone, birthdate: birthdate, gender: gender, country: country},
                success: function(result){
                    if(result === 'success')
                    {
                        M.toast({html: 'Changes applied successfully', classes: 'grey'});
                    }
                    else
                    {
                        M.toast({html: 'Failed to update', classes: 'grey'});
                    }
                }
            });
        }
    });
});