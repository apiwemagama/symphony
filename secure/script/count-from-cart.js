/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).ready(function() {
    session = sessionStorage.getItem("session");

    $.ajax({
        async: true,
        cache: false,
        contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
        crossDomain: true,
        method: 'GET',
        url: '../secure/service/count-from-cart.php',
        data: {session: session},
        success: function(){
            if(session)
            {
                $('#circular-label-1st-child').load('../secure/service/count-from-cart',{
                    session: sessionStorage.getItem('session')
                });
                $('#circular-label-2nd-child').load('../secure/service/count-from-cart',{
                    session: sessionStorage.getItem('session')
                });
            }
        }
    });
});