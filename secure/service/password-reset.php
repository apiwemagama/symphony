<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header("Content-Type: application/json");

include('../../config/database/connection.php');
            
$token = $_GET["token"];
$new_password = $_GET['password'];
$password = password_hash($new_password, PASSWORD_DEFAULT);

$query = "SELECT * FROM reset WHERE token LIKE '$token'";
$result = mysqli_query($link, $query);

if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if(new DateTime() < new DateTime($row['expireon']))
    {
        $id = $row['accountID'];
        
        $query = "UPDATE account SET password = '$password' WHERE id LIKE $id";
        $result = mysqli_query($link, $query);

        if($result)
        {
            $response = ['status' => 'success', 'message' => 'Password reseted successfully'];
            http_response_code(200);
        }
        else
        {
            $response = ['status' => 'error', 'message' => 'An error occured, please contact support'];
            http_response_code(400);
        }
        echo json_encode($response);
    }
    else
    {
        $response = ['status' => 'error', 'message' => 'Password reset link expired after 1 hour and can only be used once'];
        echo json_encode($response);
        
    }
}


