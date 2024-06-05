<?php
include("../../config/database/connection.php");

$session = $_POST['session'];

$query = "SELECT * FROM cart WHERE accountSession LIKE '$session'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result))
{
    echo(mysqli_num_rows($result));
}
else
{
    echo("");
}
