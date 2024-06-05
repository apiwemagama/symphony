<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('../config/database/connection.php');

$ipaddress = '';

if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
} else if (isset($_SERVER['HTTP_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
} else if (isset($_SERVER['REMOTE_ADDR'])) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
} else {
    $ipaddress = 'UNKNOWN';
}

$query = "INSERT INTO visitor(ip) VALUES('$ipaddress')";
$result = mysqli_query($link, $query);
