<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../../config/database/connection.php");

$email = $_POST['email'];

$query = "SELECT * FROM account WHERE email LIKE '$email'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $id = $row['id'];
    $token = bin2hex("Reset account password");
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    $query = "SELECT * FROM reset WHERE accountID = $id";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result))
    {
        $query = "UPDATE reset SET expireon = '$expiry' WHERE accountID = $id";
        $result = mysqli_query($link, $query);
        
        if($result)
        {
            $id = $row['id'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];

            email($token, $firstname, $lastname, $email);
        }
    }
    else
    {
        $query = "INSERT INTO reset(accountID, token, expireon) VALUES('$id','$token','$expiry')";
        $result = mysqli_query($link, $query);

        if($result)
        {
            email($token, $firstname, $lastname, $email);
        }
    }
}

function email($token, $firstname, $lastname, $email){
    $to = 'root@localhost.com';
    $from = 'noreply@atonalrecords.co.za';
    $subject = 'atonalrecords.co.za | Password Reset';
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Create email headers
    $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
    // Compose a simple HTML email message
    $message = "<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <style>
                            body{
                                font-family: SEGOE UI;
                            }
                        </style>
                    </head>
                    <body>
                        <div>
                            <table width='100%'>
                                <tr>
                                    <td>Hello $firstname $lastname,<br><br></td>
                                </tr>
                                <tr>
                                    <td>We're sending you this email because you requested a password reset. Click on this link to create a new password.<br><br></td>
                                </tr>
                                <tr>
                                    <table align='center'>
                                        <tr>
                                            <td align='center' width='170' height='50' style='background-color: orange';>
                                                <a href='http://localhost/atonalrecords/www/password-reset/password-reset.php?token=$token' style='text-decoration: none; text-transform: uppercase; color: #FFFFFF;'>Reset Password</a>
                                            </td>
                                        </tr>
                                    </table>
                                </tr>
                                <tr>
                                    <td>If you cannot confirm by clicking the button above, please copy the adress below to the browser address bar to confirm.<br></td>
                                </tr>
                                <tr>
                                    <td>http://localhost/atonalrecords/www/password-reset/password-reset.php?token=$token</td>
                                </tr>
                                <tr>
                                    <br><td>Thank you,<br>Atonal Records</a>.</td>
                                </tr><br><br><br>
                                <table width='100%'>
                                    <tr>
                                        <td align='center'><img src='http://localhost/atonalrecords/images/site/trademark.png' alt='logo'></td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: center; font-size: 12;'>Copyright &copy; 2024 Symphony. All rights reserved.</td>
                                    </tr>
                                </table>
                            </table>
                        </div>
                    </body>
                </html>";
    // Sending email
    if(mail($to, $subject, $message, $headers))
    {
        echo('mail-sent-success');
    } 
    else
    {
        echo('mail-sent-error');
    }
}