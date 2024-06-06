<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('C:/xampp/htdocs/atonalrecords/config/database/connection.php');

$content = "";
$email = "root@localhost.com";

$query = "SELECT * FROM receipt WHERE status LIKE 'Pending' LIMIT 1";
$result = mysqli_query($link, $query);

if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $reference = $row['reference'];
            $session = $row['accountSession'];
            $grandtotal = $row['grandtotal'];
        }

        $query = "SELECT * FROM library INNER JOIN item ON library.itemCatalog LIKE item.catalog WHERE receiptReference LIKE '$reference'";
        $result = mysqli_query($link, $query);

        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $title = $row["title"];
                $musician = $row["musician"];
                $artwork = $row["artwork"];
                $price = $row["price"];

                $version = $row["version"];

                $date = date("M d,Y", strtotime($row["date"]));

                $ISRC = $row["ISRC"];

                $content .= "<tr><td width='100' height='100'><img src='http://localhost/atonalrecords/uploads/artwork/$artwork' alt='$artwork' width='100' height='100'></td><td style='vertical-align: middle; text-align: left; padding-left: 5;'><b>$title</b><br>$version<br>$musician</td><td style='text-align: center;'>Album</td><td style='text-align: center;'><b>Atonal Records</b></td><td style='text-align: right;'><b>R$price</b></td></tr>";
            }

        }
        
        invoicing($reference, $email, $grandtotal, $content, $date, $link);
    }
    else
    {
        echo("There is no invoice to send.\r\n");
    }
}

function invoicing($reference, $email, $grandtotal, $content, $date, $link)
{
    $to = $email;
    $subject = "Atonal Records | Purchase Confirmation - ID $reference";
    $from = "noreply@atonalrecords.co.za";

    $message =  "<!DOCTYPE html>
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
                                <table width='100%'>
                                    <tr>
                                        <td style='vertical-align: middle;'><img src='http://localhost/atonalrecords/images/site/trademark.png' alt='logo'></td>
                                        <td style='text-align: right; vertical-align: middle;'>Invoice</td>
                                    </tr>
                                </table>
                                <tr>
                                    <table width='100%'>
                                        <tr><td><span style='font-size: 12'>PURCHASE ID</span><br>$reference</td><td></td><td></td></tr>
                                        <tr><td style='text-align: left;'><span style='font-size: 12'>INVOICE DATE</span><br>$date</td><td style='text-align: left;'><span style='font-size: 12'>BILLED TO</span><br>$email</td><td style='text-align: right;'><span style='font-size: 12'>TOTAL</span><br>R$grandtotal</td></tr>
                                    </table>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <table width='100%'>
                                        <tr><th>Symphony</th><th></th><th>TYPE</th><th>PURCHASED FROM</th><th style='text-align: right;'>PRICE</th></tr>
                                        $content
                                        <tr><td></td><td></td><td></td><td></td><td style='vertical-align: middle; text-align: right; font-size: 12;'>Inclusive of VAT at 16%</td></tr>
                                        <tr><td></td><td></td><td></td><td></td><td style='vertical-align: middle; text-align: right; font-size: 12;'>VAT charged at 16% R</td></tr>
                                        <tr><td></td><td></td><td></td><td style='text-align: right; font-size: 12;'>TOTAL</td><td style='vertical-align: middle; text-align: right;'><b>R$grandtotal</b></td></tr>
                                    </table>
                                </tr><br><br><br>
                                <table width='100%'>
                                    <tr>
                                        <td style='text-align: center; font-size: 12;'>If you didn't make this purchase or if you believe an unauthoried person is attempting to access your account, please report it.</td>
                                    </tr>
                                    <tr>
                                        <td align='center'><img src='http://localhost/atonalrecords/images/site/trademark.png' alt='logo'></td>
                                    </tr>
                                    <tr>
                                        <td style='text-align: center; font-size: 12;'>Copyright &copy; 2024 Symphony. All rights reserved.</td>
                                    </tr>
                                </table>
                            </table>
                        <div>
                    </body>
                </html>";

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: ".$from."\r\n" . "Reply-To: " .$from. "\r\n" . "X-Mailer: PHP/" . phpversion();

    if(mail($to, $subject, $message, $headers))
    {
        $query = "UPDATE receipt SET status = 'Sent' WHERE reference LIKE '$reference'";
        $result = mysqli_query($link, $query);

        if($result)
        {
            echo("Invoice sent succesfully.\r\n");
        }
    }
}