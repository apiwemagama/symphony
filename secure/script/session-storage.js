/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function _session(){
    var modal_default_authorization_trigger = document.getElementById('modal-default-authorization-trigger');
    var modal_bottom_sheet_authorization_trigger = document.getElementById('modal-bottom-sheet-authorization-trigger');
    var nav_ul_li_profile = document.getElementById('nav-ul-li-profile');

    if(sessionStorage.getItem("session") === null)
    {
        modal_default_authorization_trigger.className = 'btn btn-round modal-trigger waves-effect grey white-text';
        modal_default_authorization_trigger.href = '#modal-default-authorization';
        modal_default_authorization_trigger.innerHTML = 'Log In';
        
        modal_bottom_sheet_authorization_trigger.className = 'modal-trigger';
        modal_bottom_sheet_authorization_trigger.href = '#modal-default-authorization';

        nav_ul_li_profile.className = 'dropdown-trigger hide';
    }
    else
    {
        modal_default_authorization_trigger.className = 'btn btn-round modal-trigger waves-effect waves-light grey white-text hide';
        modal_default_authorization_trigger.href = '#modal-default-authorization';
        modal_default_authorization_trigger.innerHTML = 'Logout';
        
        modal_bottom_sheet_authorization_trigger.className = 'logout';
        modal_bottom_sheet_authorization_trigger.innerHTML = "<span><i class='fa fa-sign-out-alt fa-1x'></i></span>";
       
        nav_ul_li_profile.className = 'dropdown-trigger show';
    }
}