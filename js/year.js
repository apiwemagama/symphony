/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function year(){
	var year = new Date();
	var currentYear = year.getFullYear();
        
	document.getElementById("year").innerHTML = currentYear;
}
