<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../../config/database/connection.php");
                 
$name = "";
$surname = "";
$email = filter_var(filter_input(INPUT_GET, "email"), FILTER_SANITIZE_EMAIL);
$password = filter_var(password_hash(filter_input(INPUT_GET, "password"), PASSWORD_DEFAULT));

$query = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($link, $query);

if($result)
{
    if(mysqli_num_rows($result)) 
    {
        echo("exist");
    }
    else 
    {
        $token = hash('ripemd160', uniqid("",true));
        
        $query = "INSERT INTO account(session, firstname, lastname, email, password) VALUES('$name', '$surname', '$email', '$password','$token')";
        $result = mysqli_query($link, $query);

        if($result)
        {
            echo("success");
        }
        else
        {
            echo("error");
        }
    }
}


