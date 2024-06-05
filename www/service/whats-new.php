<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-Type: application/json");

include('../../config/database/connection.php');

$todate = date_create(date("Y-m-d"));
            
$query = "SELECT ANY_VALUE(title) AS title, ANY_VALUE(musician) AS musician, ANY_VALUE(artwork) AS artwork, ANY_VALUE(UPC) AS UPC, ANY_VALUE(album) AS album, ANY_VALUE(date) AS date FROM item WHERE DATEDIFF(CURDATE(),date) <= 90 GROUP BY album LIMIT 6;";
$result = mysqli_query($link, $query);

$array = array();

if($result)
{                        
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($array, $row);
    }
    print json_encode($array);
}