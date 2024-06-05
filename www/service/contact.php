<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$to = 'info@atonalrecords.co.za';

$name = $_POST['name'];
$from = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();

$message =  "<html>"
                ."<head>"
                    ."<meta charset=\"UTF-8\">"
                ."</head>"
                ."<body>"
                    ."<div style='max-width: 100%; width: 100%;'>"
                        ."<table style='font-family: SEGOE UI; color: #696969;'>"
                            ."<tr>"
                                ."<td>$body<br><br></td>"
                            ."</tr>"
                            ."</tr>"
                                ."<td>Note: Message sent via Contact page on Atonal Records website by <b>$name</b><br><br></td>"
                            ."</tr>"
                        ."</table>"
                    ."<div>"
                ."</body>"
            ."</html>";

if(mail($to, $subject, $message, $headers)){
    echo("success");
} else{
    echo("error");
}