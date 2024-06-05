/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addToStreams(ipaddress, continentName, countryName, regionName, city){
    var url = new URL(window.location.href);

    var itemID = url.searchParams.get("bo");
    var ip = ipaddress;
    var continent = continentName;
    var country = countryName;
    var region = regionName;
    var city = city;

    $.ajax({
        async: true,
        cache: false,
        contentType: 'application/x-www-form-urlencoded; charset-UTF-8',
        crossDomain: true,
        method: 'GET',
        url: 'service/addToStreams.php',
        data: {itemID: itemID, ip: ip, continent: continent, country: country, region: region, city: city}
    });
}
