<?php
header("Access-Allow-Origin-Control: *");
header("Access-Allow-Origin-Methods: PUT, GET, POST, DELETE");
header("Access-Allow-Origin-Headers: Origin, X-Requeste-With, Control-Type, Accept");

$servername = "localhost";
$username = "root";
$password = "root";
$database = "atonalrecords";

$link = new mysqli($servername, $username, $password, $database);

if(!$link)
{
    echo("Database connection failed.");
}