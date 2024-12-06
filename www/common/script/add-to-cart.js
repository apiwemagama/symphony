/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $(document).on("click", ".btn-add-to-cart", function(){
        var session = sessionStorage.getItem('session');

        var itemCatalog = $(this).attr("data-catalog");
        var itemArtwork = $(this).attr("data-artwork");
        var itemTitle = $(this).attr("data-title");
        var itemMusician = $(this).attr("data-musician");
        
        console.log(itemCatalog+" "+session+" "+itemCatalog);
        
        if(session !== null)
        {
            $.ajax({
                async: true,
                cache: false,
                contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
                crossDomain: true,
                method: 'GET',
                url: '../secure/service/add-to-cart.php',
                data: {session: session, itemCatalog: itemCatalog},
                dataType: 'JSON',
                success: function(result){
                    if(result.response === 'return')
                    {
                        M.toast({html: '<img src='+itemArtwork+' id="notification-toast-img"><span id="notification-toast-text">'+itemTitle+' by '+itemMusician+' already added to cart', classes: 'orange'});
                    }
                    else if(result.response === 'success')
                    {
                        M.toast({html: '<img src='+itemArtwork+' id="notification-toast-img"><span id="notification-toast-text">'+itemTitle+' by '+itemMusician+' added to cart', classes: 'orange'});

                        $('#circular-label-1st-child, #circular-label-2nd-child').load('../secure/service/count-from-cart',{
                            session: sessionStorage.getItem('session')
                        });
                    }
                }
            });
        }
        else
        {
            M.toast({html: '<img src='+itemArtwork+' id="notification-toast-img"><span id="notification-toast-text">Please <strong>login</strong> to add '+itemTitle+' by '+itemMusician+' to cart', classes: 'orange'});
        }
    });
});