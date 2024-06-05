/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App script
$(document).ready(function() {
    _session();
    categories();
    
    //Explore content
    var index = $(".content").html();
     
    function revertBack(){
        $('.content').html(index);
    }   
    $(document).on("click", ".brand-logo.hide-on-med-and-down, .brand-logo.hide-on-large-only, .index.waves-effect.waves-light", function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/index');

        $(document).prop('title', 'Atonal Records');
        
        revertBack();
    });
    //About content
    $(document).on("click", ".about.waves-effect.waves-light", function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/about');

        $(document).prop('title', 'About :: Atonal Records');
    });
    //Suport content
    $(document).on("click", ".support.waves-effect.waves-light", function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/support');

        $(document).prop('title', 'Support :: Atonal Records');
    });
    //Registration content
    $('.modal, .content').on("click", ".register, .btn-sign-up-now",function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/register');
        
        $(document).prop('title', 'Register :: Atonal Records');
        
        $('.content').load('../secure/content/register');
        
        $('#modal-default-authorization, #modal-bottom-sheet-authorization').modal('close');
    });
    //Account content
    $(document).on("click", "#dropdown-content-li-account, .account", function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/account');
    });
    //Cart content
    $(document).on("click", ".cart", function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/cart');

        $(document).prop('title', 'Cart :: Atonal Records');
        
        
    });
    //Library content
    $(document).on("click", ".library", function(e){
        e.preventDefault();
        
        window.history.pushState('','','#!/library');

        $(document).prop('title', 'Library :: Atonal Records');
    });
    //Shop by genre content
    $(document).on("click", ".card.shop-by-genre-category", function(e){
        e.preventDefault();

        var style = $(this).attr("data-item-style");
        var category = $(this).attr("data-item-category");

        window.history.pushState('','','#!/genre?style='+style+'&category='+category);

//        var url = window.location.href.split("#!/genre").pop();
//        var urlParams = new URLSearchParams(url);
//        var style = urlParams.get('style');
//        var category = urlParams.get('category');
//
//        $('.content').load('content/genre',{
//            style: style,
//            category: category
//        });

        $(document).prop('title', ''+style+' '+category+' :: Atonal Records');
    });

    $(".content").on("click", ".card.whats-new-category, .card.genre", function(e){
        e.preventDefault();

        var musician = $(this).attr("data-item-musician");
//        var title = $(this).attr("data-item-title");
        var upc = $(this).attr("data-item-upc");
        var album = $(this).attr("data-item-album");

        window.history.pushState('','','#!/release?bo='+upc+'&co='+album);

//        var url = window.location.href.split("#!/release").pop();
//        var urlParams = new URLSearchParams(url);
//        var bo = urlParams.get('bo');
//        var co = urlParams.get('co');
//
//        $('.content').load('content/release',{
//            bo: bo,
//            co: co
//        });
        

        $(document).prop('title', ''+album+' by '+musician+' :: Atonal Records');
    });

//    $('.content').on("click", ".genre-item-card-img-src", function(e){
//        e.preventDefault();
//
//        var title = $(this).attr("data-item-title");
//        var musician = $(this).attr("data-item-musician");
//        var upc = $(this).attr("data-item-upc");
//        var album = $(this).attr("data-item-album");
//
//        window.history.pushState('','','#!/release?bo='+upc+'&co='+album);
//
//        $('.content').load('content/release',{
//            bo: upc,
//            co: album
//        });
//
//        $(document).prop('title', ''+title+' by '+musician+' :: Atonal Records');
//    });

    $('.modal').on("click", ".password-recovery", function(e){
        e.preventDefault();

        window.history.pushState('','','#!/password-recovery');

        $('.content').load('../secure/content/password-recovery');
        $(document).prop('title', 'Password Recovery :: Atonal Records');
        $('#modal-default-authorization, #modal-bottom-sheet-authorization').modal('close');
    });
    
    function generateDynamicHash(url) {
        var dynamicHash = '';
        if (url.startsWith('#!/release')) {
            dynamicHash = function () {
                var urlParams = new URLSearchParams(url.split('?')[1]);
                var bo = urlParams.get('bo');
                var co = urlParams.get('co');
                $('.content').load('content/release', 
                    function(){
                        $.ajax({
                            method: 'GET',
                            url: '/atonalrecords/secure/service/release-overview',
                            data: {upc: bo, album: co},
                            dataType: 'json',
                            success: function(data){
                                var object = data[0];
                                var musician = object.musician;
                                var album = object.album;
                                var artwork = object.artwork;
                                var style = object.style;
                                var category = object.category;
                                var date = object.date;

                                date = new Date(date);

                                var options = {
                                    month: 'short', // Abbreviated month name (e.g., "Mar")
                                    day: '2-digit', // Two-digit day of the month (e.g., "11")
                                    year: 'numeric' // Full year (e.g., "2024")
                                };

                                date = date.toLocaleDateString('en-US', options);

                                var format = object.format;

                                $(".artwork").append("<div><img src='../uploads/artwork/"+artwork+"' alt='artwork' class='responsive-img'></div>");
                                $(".musician").append("<div class='col s12 l12'><h2 class='no-padding-top no-padding-bottom'>"+album+"</h2></div>");
                                $(".musician").append("<div class='col s12 l12'>"+musician+"</div>");
                                $(".genre").append(""+style+" "+category);
                                $(".date").append(""+date);
                                $(".format").append(""+format);
                            },
                            error: function(){
                                console.error("There was an error passing over data");
                            }
                        });
                        $.ajax({
                            method: 'GET',
                            url: '/atonalrecords/secure/service/release-overview',
                            data: {upc: bo, album: co},
                            dataType: 'json',
                            success: function(data){
                                var track = 1;

                                $.each(data, function(key, value){    
                                    $(".audio").append("<tr class='no-border-bottom'><td>"+track++ +"</td><td class='center'><a id='btn-play' class='btn btn-play btn-round z-depth-0 grey-text whitesmoke' data-track='../uploads/audio/"+value.audio+"' data-artwork='../uploads/artwork/"+value.artwork+"' data-title='"+value.title+"' data-musician='"+value.musician+"' data-version='"+value.version+"' data-release='"+value.release+"' data-genre='"+value.style+"'><i class='fa fa-play'></i></a></td><td><span>"+value.title+"</span></td><td>"+value.musician+"</td><td></td><td>"+value.category+"</td><td>"+value.version+"</td><td><button class='btn btn-add-to-cart btn-round waves-effect waves-light grey white-text' data-id='"+value.catalog+"' data-artwork='../uploads/artwork/"+value.artwork+"' data-title='"+value.title+"' data-musician='"+value.musician+"'><i class='fa fa-cart-plus left'></i>"+value.price+"</button></td></tr>");
                                });
                            },
                            error: function(){
                                console.error("There was an error passing over data");
                            }
                        });
                    }
                );
                
                

                $(document).prop('title', co + ' by ' + bo + ' :: Atonal Records');
            };
        } else if (url.startsWith('#!/genre')) {
            dynamicHash = function () {
                var urlParams = new URLSearchParams(url.split('?')[1]);
                var style = urlParams.get('style');
                var category = urlParams.get('category');
                $('.content').load('content/genre', {
                    style: style,
                    category: category
                });
                $(document).prop('title', style + ' ' + category + ' :: Atonal Records');
            };
        }
        return dynamicHash;
    }
    
    //Navigation API
    window.navigation.addEventListener("navigate", function(){
        var url = new URL(event.destination.url);
        
        var hash = {
            '#!/index': function(){
                revertBack();
                categories();
            },
            '#!/about': function(){
                $('.content').load('content/about');
            },
            '#!/support': function(){
                $('.content').load('content/support');
            },
            '#!/account': function(){
                if(sessionStorage.getItem('session') !== null)
                {
                    $('.content').load('../secure/content/account');
                    $(document).prop('title', 'Account :: Atonal Records');
                }
                else
                {
                    $('.content').html("<div class='container grey-text'><div class='row no-padding-bottom'><div class='col'><h3>Oops, you cannot view it</h3></div></div><div class='row'><div class='col'>My account.</div></div> <div class='row'><div class='col'><a class='btn btn-round grey'>Log in to your account</a></div><div class='col'><a class='btn btn-round grey'>Sign up now</a></div></div></div>");
                }
            },
            '#!/cart': function(){
                if(sessionStorage.getItem('session') !== null)
                {
                    $('.content').load('../secure/content/cart',{
                        session: sessionStorage.getItem('session')
                    });
                }
                else
                {
                    $('.content').html("<div class='container grey-text'><div class='row no-padding-bottom'><div class='col'><h3>Your shopping basket is empty</h3></div></div><div class='row'><div class='col'>Shop today's deals.</div></div> <div class='row'><div class='col'><a class='btn btn-round grey'>Log in to your account</a></div><div class='col'><a class='btn-sign-up-now btn btn-round grey' id=''>Sign up now</a></div></div></div>");
                }
            },
            '#!/library': function(){
                if(sessionStorage.getItem('session') !== null)
                {
                    $('.content').load('../secure/content/library',{
                        session: sessionStorage.getItem('session')
                    });
                }
                else
                {
                    $('.content').html("<div class='container grey-text'><div class='row no-padding-bottom'><div class='col'><h3>Haven\'t purchased none</h3></div></div><div class='row'><div class='col'>Shop now. Play Forever.</div></div> <div class='row'><div class='col'><a class='btn btn-round grey'>Log in to your account</a></div><div class='col'><a class='btn-sign-up-now btn btn-round grey'>Sign up now</a></div></div></div>");
                }
            },
            'default': function(){
            }
        };
        // Get dynamic hash function
        var dynamicHashFunction = generateDynamicHash(url.hash);
        // Execute dynamic hash function if available, otherwise default to hash function
        (dynamicHashFunction || hash[url.hash] || hash["default"])();
    });
});

   