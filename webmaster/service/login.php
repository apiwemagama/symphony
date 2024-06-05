<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include("../../config/database/connection.php");

$email = filter_var(filter_input(INPUT_GET, "email"), FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_GET, "password");

$query = "SELECT * FROM personnel WHERE email LIKE \"$email\"";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result))
{
    while($row = mysqli_fetch_array($result))
    {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $fullname = $firstname." ".$lastname;
        $email = $row['email'];
        
        if(password_verify($password, $row['password']))
        {
            $profile = array('response' => 'success','fullname' => $fullname,'email' => $email);
            
            echo json_encode($profile);
        }
        else
        {
            $profile = array('response' => 'error','fullname' => $fullname,'email' => $email);
            
            echo json_encode($profile);
        }
    }
}
