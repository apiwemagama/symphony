<?php
session_start();

include("../../config/database/connection.php");

$purchaseID = $_SESSION['purchaseID'];
$reason = $_GET["reason"];

$query = "SELECT * FROM cancellation WHERE id LIKE '$purchaseID'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result))
{
    echo("return");
}
else
{
    $query = "INSERT INTO cancellation(id, reason) VALUES('$purchaseID','$reason')";
    $result = mysqli_query($link, $query);
    
    if($result)
    {
        echo("success");
    }
}
                  