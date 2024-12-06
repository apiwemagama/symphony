/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//App script
$(document).ready(function() {
    _session();
    $('.content').load('index/index');
    //Explore content
    $(document).on("click", ".brand-logo.hide-on-med-and-down, .brand-logo.hide-on-large-only, .index.waves-effect.waves-light", function(){
        window.history.pushState('','','#!/index');
        $(document).prop('title', 'Atonal Records');
    });
    //About content
    $(document).on("click", ".about.waves-effect.waves-light", function(){
        window.history.pushState('','','#!/about');
        $(document).prop('title', 'About :: Atonal Records');
    });
    //Suport content
    $(document).on("click", ".support.waves-effect.waves-light", function(){
        window.history.pushState('','','#!/support');
        $(document).prop('title', 'Support :: Atonal Records');
    });
    //Registration content
    $('.modal, .content').on("click", ".register, .btn-sign-up-now",function(){
        window.history.pushState('','','#!/register');
        $(document).prop('title', 'Register :: Atonal Records');
        
        $('#modal-default-authorization, #modal-bottom-sheet-authorization').modal('close');
    });
    //Account content
    $(document).on("click", "#dropdown-content-li-account, .account", function(){
        window.history.pushState('','','#!/account');
    });
    //Cart content
    $(document).on("click", ".cart", function(){
        window.history.pushState('','','#!/cart');
        $(document).prop('title', 'Cart :: Atonal Records');
    });
    //Library content
    $(document).on("click", ".library", function(){
        window.history.pushState('','','#!/library');
        $(document).prop('title', 'Library :: Atonal Records');
    });
    //Shop by genre content
    $(document).on("click", ".card.shop-by-genre-category", function(){
        var style = $(this).attr("data-item-style");
        var category = $(this).attr("data-item-category");

        window.history.pushState('','','#!/genre?style='+style+'&category='+category);
        $(document).prop('title', ''+style+' '+category+' :: Atonal Records');
    });

    $(".content").on("click", ".card.whats-new-category, .card.genre", function(){
        var musician = $(this).attr("data-item-musician");
        var upc = $(this).attr("data-item-upc");
        var album = $(this).attr("data-item-album");

        window.history.pushState('','','#!/release?bo='+upc+'&co='+album);
        $(document).prop('title', ''+album+' by '+musician+' :: Atonal Records');
    });

    $('.modal').on("click", ".password-recovery", function(){
        window.history.pushState('','','#!/password-recovery');
        $(document).prop('title', 'Password Recovery :: Atonal Records');
        $('#modal-default-authorization, #modal-bottom-sheet-authorization').modal('close');
    });
    
    function generateDynamicHash(url) {
        var dynamicHash = '';
        if (url.startsWith('#!/release')) {
            dynamicHash = function () {
                $('.content').load('release/release');
            };
        } else if (url.startsWith('#!/genre')) {
            dynamicHash = function () {
                var urlParams = new URLSearchParams(url.split('?')[1]);
                var style = urlParams.get('style');
                var category = urlParams.get('category');
                $('.content').load('genre/genre', {
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
                $('.content').load('index/index');
            },
            '#!/about': function(){
                $('.content').load('about/about');
            },
            '#!/support': function(){
                $('.content').load('support/support');
            },
            '#!/account': function(){
                if(sessionStorage.getItem('session') !== null)
                {
                    $('.content').load('account/account');
                }
                else
                {
                    $('.content').html("<div class='container grey-text'><div class='row no-padding-bottom'><div class='col'><h3>Oops, you cannot view it</h3></div></div><div class='row'><div class='col'>My account.</div></div> <div class='row'><div class='col'><a class='btn btn-round grey'>Log in to your account</a></div><div class='col'><a class='btn btn-round grey'>Sign up now</a></div></div></div>");
                }
            },
            '#!/cart': function(){
                if(sessionStorage.getItem('session') !== null)
                {
                    $('.content').load('cart/cart');
                }
                else
                {
                    $('.content').html("<div class='container grey-text'><div class='row no-padding-bottom'><div class='col'><h3>Your shopping basket is empty</h3></div></div><div class='row'><div class='col'>Shop today's deals.</div></div> <div class='row'><div class='col'><a class='btn btn-round grey'>Log in to your account</a></div><div class='col'><a class='btn-sign-up-now btn btn-round grey' id=''>Sign up now</a></div></div></div>");
                }
            },
            '#!/library': function(){
                if(sessionStorage.getItem('session') !== null)
                {
                    $('.content').load('library/library');
                }
                else
                {
                    $('.content').html("<div class='container grey-text'><div class='row no-padding-bottom'><div class='col'><h3>Haven\'t purchased none</h3></div></div><div class='row'><div class='col'>Shop now. Play Forever.</div></div> <div class='row'><div class='col'><a class='btn btn-round grey'>Log in to your account</a></div><div class='col'><a class='btn-sign-up-now btn btn-round grey'>Sign up now</a></div></div></div>");
                }
            },
            '#!/register': function(){
                $('.content').load('register/register');
            },
            '#!/password-recovery': function(){
                $('.content').load('password-recovery/password-recovery');
            },
            'default': function(){
                $('.content').load('index/index');
            }
        };
        // Get dynamic hash function
        var dynamicHashFunction = generateDynamicHash(url.hash);
        // Execute dynamic hash function if available, otherwise default to hash function
        (dynamicHashFunction || hash[url.hash] || hash["default"])();
    });
});

   