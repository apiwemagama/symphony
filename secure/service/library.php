<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-Type: application/json');

include('../../config/database/connection.php');

$session = $_POST['session'];

$query = "SELECT GROUP_CONCAT(DATE_FORMAT(purchasedon,'%Y-%m-%d') SEPARATOR ',') as date, GROUP_CONCAT(artwork SEPARATOR ',') as artwork, GROUP_CONCAT(musician SEPARATOR ',') as musician, GROUP_CONCAT(title SEPARATOR ',') as title, GROUP_CONCAT(audio SEPARATOR ',') as audio, GROUP_CONCAT(version SEPARATOR ',') as version, GROUP_CONCAT(genre.category SEPARATOR ',') as category, GROUP_CONCAT(style SEPARATOR ',') as style, GROUP_CONCAT(format SEPARATOR ',') as format FROM library JOIN item ON library.itemCatalog LIKE item.catalog AND library.accountSession LIKE '$session' INNER JOIN genre ON item.genreID LIKE genre.id GROUP BY purchasedon ORDER BY purchasedon DESC";
$result = mysqli_query($link, $query);

$array = array();

if($result){
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($array, $row);
    }
    print json_encode($array);
}
