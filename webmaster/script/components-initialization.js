/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({
        constrain_width: false
    });
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});
        
        
