<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include("../../config/database/connection.php");

$session = $_GET["email"];

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];
$phone = $_GET["phone"];
$birthdate = $_GET["birthdate"];
$gender = $_GET["gender"];
$country = $_GET["country"];

$query = "UPDATE account SET firstname = '$firstname', lastname = '$lastname', phone = '$phone', birthdate = '$birthdate', gender = '$gender', country = '$country' WHERE email LIKE '$session'";
$result = mysqli_query($link, $query);

if($result)
{
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['phone'] = $phone;
    $_SESSION['birthdate'] = $birthdate;
    $_SESSION['gender'] = $gender;
    $_SESSION['country'] = $country;
    
    echo("success");
}

                                        