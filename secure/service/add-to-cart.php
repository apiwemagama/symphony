<?php
session_start();

include("../../config/database/connection.php");

if(isset($_SESSION['session']))
{    
    $session = $_GET['session'];
    $itemID = $_GET['itemID'];

    $query = "SELECT itemID FROM cart WHERE accountSession LIKE '$session' AND itemID LIKE '$itemID'";
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
            $query = "INSERT INTO cart(accountSession, itemID) SELECT '$session', catalog FROM item WHERE catalog LIKE '$itemID'";
            $result = mysqli_query($link,$query);

            if($result)
            {
                $message = array('response' => 'success');
                echo json_encode($message);
            }
        }
    }
}
else
{
    include("../../incl/api-manager.php");
    exit;
}
