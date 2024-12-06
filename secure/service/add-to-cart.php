<?php
include("../../config/database/connection.php");

$session = $_GET['session'];
$itemCatalog = $_GET['itemCatalog'];

$query = "SELECT itemCatalog FROM cart WHERE accountSession LIKE '$session' AND itemCatalog LIKE '$itemCatalog'";
$result = mysqli_query($link, $query);

if($result)
{
    if(mysqli_num_rows($result))
    {
        $message = array('response' => 'return');
        echo json_encode($message);
    }
    else
    {
        $query = "INSERT INTO cart(accountSession, itemCatalog, UPC) SELECT '$session', catalog, UPC FROM item WHERE catalog LIKE '$itemCatalog'";
        $result = mysqli_query($link,$query);

        if($result)
        {
            $message = array('response' => 'success');
            echo json_encode($message);
        }
    }
}
