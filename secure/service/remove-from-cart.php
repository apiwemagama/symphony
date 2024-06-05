<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("../../config/database/connection.php");

$session = $_GET['session'];
$itemID = $_GET['itemID'];

$query = "DELETE FROM cart WHERE accountSession = '$session' AND itemID = '$itemID'";
$result = mysqli_query($link, $query);

if($result)
{
    echo("success");
}
                                                               