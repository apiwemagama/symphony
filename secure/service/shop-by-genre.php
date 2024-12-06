<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header("Content-Type: application/json; charset=UTF-8");

include('../../config/database/connection.php');

$query = "SELECT ANY_VALUE(atonalrecords.item.musician) AS musician, ANY_VALUE(atonalrecords.item.title) AS title, ANY_VALUE(atonalrecords.item.upc) AS upc, ANY_VALUE(atonalrecords.item.album) AS album, atonalrecords.genre.style, atonalrecords.genre.category, ANY_VALUE(atonalrecords.item.artwork) AS artwork FROM atonalrecords.item JOIN atonalrecords.genre ON atonalrecords.item.genreID = atonalrecords.genre.id GROUP BY atonalrecords.item.genreID;";
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

