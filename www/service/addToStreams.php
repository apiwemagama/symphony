<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('../../config/database.php');

$itemID = $_GET['itemID'];
$ip = $_GET['ip'];
$continent = $_GET['continent'];
$country = $_GET['country'];
$region = $_GET['region'];
$city = $_GET['city'];

$query = "INSERT INTO streams(itemID, ip, continent, country, region, city) VALUES('$itemID', '$ip', '$continent', '$country', '$region', '$city')";
mysqli_query($link, $query);