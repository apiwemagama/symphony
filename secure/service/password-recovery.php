<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../../config/database/connection.php");

$email = $_POST['email'];

$query = "SELECT * FROM acount WHERE email LIKE '$email'";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $account = $row['account'];
    $currentTime = date('Y-m-d H:i:s');
    
    $query = "SELECT * FROM reset WHERE accountID = $account";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result))
    {
        $query = "UPDATE reset SET resetedon = \"$currentTime\" WHERE accountID = $account";
        $result = mysqli_query($link, $query);
        
        if($result)
        {
            $account = $row['account'];
            $firstname = $row['firstname'];
            $email = $row['email'];

            $to = 'root@localhost.com';
            $from = 'noreply@atonalrecords.co.za';
            $subject = 'atonalrecords.co.za | Password Reset';
            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // Create email headers
            $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
            // Compose a simple HTML email message
            $message = "<html>"
                            ."<head>"
                                ."<style>"
                                    ."<meta charset=\"UTF-8\">"
                                ."</style>"
                            ."</head>"
                            ."<body>"
                                ."<div style='max-width: 100%; width: 100%;'>"
                                    ."<table>"
                                        ."<tr>"
                                            ."<td style='font-family: SEGOE UI; color: #999999;'>Hello <b>$firstname</b><br><br></td>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<td style='font-family: SEGOE UI; color: #999999;'>We have received a request to have your password reset. If you did not make this request, please ignore this message.<br><br></td>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<td style='font-family: SEGOE UI; color: #999999;'>To reset your password, please click the below button.<br><br></td>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<table>"
                                                ."<tr>"
                                                    ."<td align=\"center\" width=\"170\" height=\"50\" style=\"background-color: #999999; font-family: SEGOE UI;\">"
                                                        ."<a href=\"http://localhost/atonalrecords/secure/password-reset.php/?id=$account\" style=\"text-decoration: none; text-transform: uppercase; color: #FFFFFF;\">Reset Password</a>"
                                                    ."</td>"
                                                ."</tr>"
                                            ."</table>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<br><td style='font-family: SEGOE UI; color: #999999;'>If you ignore this message, your password won't be changed.</td>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<br><td style='font-family: SEGOE UI; color: #999999;'><b>Having trouble?</b></td>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<br><td style='font-family: SEGOE UI; color: #999999;'>If the above button does not work try copying and pasting this link into your web browser.</td><br>"
                                        ."</tr>"
                                        ."<tr>"
                                            ."<table>"
                                                ."<tr>"
                                                    ."<td align=\"center\" width=\"460\" height=\"60\" style=\"background-color: #F5F5F5; font-family: SEGOE UI;\">"
                                                        ."http://localhost/atonalrecords/secure/password-reset.php?id=$account"
                                                    ."</td>"
                                                ."</tr>"
                                            ."</table>"
                                        ."</tr>"
                                    ."</table>"
                                ."</div>"
                            ."</body>"
                        ."</html>";
            // Sending email
            if(mail($to, $subject, $message, $headers))
            {
                echo("mail-sent-success");
            } 
            else
            {
                echo("mail-sent-error");
            }
        }
        else
        {
            $query = "INSERT INTO reset(accountID) VALUES('$account')";
            $result = mysqli_query($link, $query);

            if($result)
            {
                echo("error");
            }
        }
    }
}
else
{
    echo("exist");
}
        
    
    