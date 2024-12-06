/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $.ajax({
        method: 'GET',
        url: '../secure/service/shop-by-genre',
        dataType: 'JSON',
        success: function(data){
            $.each(JSON.parse(JSON.stringify(data)), function(key, value){    
                $(".row.shop-by-genre").append("<div class='col s6 l3'><div class='card shop-by-genre-category z-depth-0' data-item-style="+value.style+" data-item-category="+value.category+"><div class='card-image'><img src='../uploads/artwork/"+value.artwork+"'></div><div class='card-content padding'><span>"+value.style+" "+value.category+"</span></div></div>");
            });
        }
    });
    $.ajax({
        method: 'GET',
        url: '../secure/service/whats-new',
        dataType: 'JSON',
        success: function(data){
            $.each(JSON.parse(JSON.stringify(data)), function(key, value){    
                $(".row.whats-new").append("<div class='col s6 l3'><div class='card whats-new-category z-depth-0' data-item-musician="+value.musician+" data-item-title="+value.title+" data-item-upc="+value.UPC+" data-item-album="+encodeURIComponent(value.album)+"><div class='card-image'><img src='../uploads/artwork/"+value.artwork+"'></div><div class='card-content padding'><div>"+value.album+"</div><div>"+value.musician+"</div></div></div></div>");
            });
        }
    });
});
