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

$query = "SELECT * FROM account WHERE email LIKE \"$email\"";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result))
{
    while($row = mysqli_fetch_array($result))
    {
        $session = $row['session'];
        
        $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $birthdate = $row['birthdate'];
        $gender = $row['gender'];
        $country = $row['country'];
        
        $weight = 0;

        if($firstname != '')
        {
            $weight +=  1;
        }
        if($lastname != '')
        {
            $weight +=  1;
        }
        if($email != '')
        {
            $weight +=  1;
        }
        if($phone != '')
        {
            $weight +=  1;
        }
        if($birthdate != '')
        {
            $weight +=  1;
        }
        if($gender != '')
        {
            $weight +=  1;
        }
        if($country != '')
        {
            $weight +=  1;
        }

        $percentage = round(($weight/7)*100);

        $placeholder;

        if($percentage < 100)
        {
            $placeholder = "completed so far";
        }
        else
        {
            $placeholder = "complete";
        }
        
        if(password_verify($password, $row['password']))
        {
            $timestamp = date("Y-m-d h:i:s",time());
            
            $_SESSION['session'] = $session;
            
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['birthdate'] = $birthdate;
            $_SESSION['gender'] = $gender;
            $_SESSION['country'] = $country;

            $_SESSION['weight'] = $weight;
            $_SESSION['percentage'] = $percentage;
            $_SESSION['placeholder'] = $placeholder;
            
            mysqli_query($link, "UPDATE account SET lastactivity = '$timestamp' WHERE email LIKE '$email'");
            
            $profile = array('response' => 'success', 'session' => $session);
            
            echo json_encode($profile);
        }
        else if(!password_verify($password, $row['password']))
        {
            $profile = array('response' => 'error');
            
            echo json_encode($profile);
        }
    }
}
else
{
    $profile = array('response' => 'exist');

    echo json_encode($profile);
}
