<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-Type: application/json');

include('../../config/database/connection.php');

$upc = $_GET['upc'];
$album = $_GET['album'];
$numbering = 0;
$rows = array();

$query = "SELECT item.*, genre.category, genre.style FROM item JOIN genre ON genreID = genre.id WHERE item.upc LIKE '$upc' AND item.album LIKE '$album'";
$result = mysqli_query($link, $query);

$array = array();

if($result)
{
    while($row = mysqli_fetch_assoc($result))
    {
//        $category = $row["category"];
//        $style = $row["style"];
//        $genre = ucwords($style." ".$category);
//        $musician = $row['musician'];
//        $artwork = "../uploads/artwork/".$row['artwork'];
//        $format = $row['format'];
//        $date = $row['date'];
//
//        $rows[] = $row;
        array_push($array, $row);
    }
    print json_encode($array);
}