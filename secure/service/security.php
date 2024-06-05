<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../../config/database/connection.php");

$session = $_GET["session"];
$password = filter_var(password_hash(filter_input(INPUT_GET, "password"), PASSWORD_DEFAULT));

$query = "UPDATE account SET password = '$password' WHERE session = '$session'";
$result = mysqli_query($link, $query);

if($result)
{
    echo("success");
    
}

                                        