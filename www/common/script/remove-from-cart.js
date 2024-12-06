/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    $(document).on("click", ".btn-remove-from-cart", function(){
        var session = sessionStorage.getItem('session');
        var itemCatalog = $(this).attr("data-item-catalog");

        $.ajax({
            async: true,
            cache: false,
            contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
            crossDomain: true,
            method: 'GET',
            url: '../secure/service/remove-from-cart',
            data: {session: session, itemCatalog: itemCatalog},
            success: function(response){
                if(response === 'success')
                {
                    $('#circular-label-1st-child, #circular-label-2nd-child').load('../secure/service/count-from-cart',{
                        session: sessionStorage.getItem('session')
                    });
                    
                    $('.content').load('cart/cart',{
                        session: sessionStorage.getItem('session')
                    });
                }
            }
        });
    });
});