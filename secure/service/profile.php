<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-Type: application/json');

include('../../config/database/connection.php');

$session = $_GET['session'];

$query = "SELECT * FROM account WHERE session LIKE '$session'";
$result = mysqli_query($link, $query);

$array = array();

if($result)
{
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_array($result))
        {
            array_push($array, $row);
        }
        print json_encode($array);
    }
}