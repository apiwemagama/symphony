<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('../../config/database/connection.php');

$reference = $_POST['reference'];
$session = $_POST['session'];
$grandtotal = $_POST['grandtotal'];
//$content = "";

$query = "INSERT INTO receipt(reference, accountSession, grandtotal, status) VALUES('$reference', '$session', '$grandtotal', 'Pending')";
$result = mysqli_query($link, $query);

if($result)
{
    $query = "INSERT INTO library(receiptReference, accountSession, itemCatalog) SELECT '$reference', accountSession, itemCatalog FROM cart WHERE accountSession LIKE '$session'";
    $result = mysqli_query($link, $query);
    
    if($result)
    {
//        $query = "SELECT * FROM library INNER JOIN item ON libary.itemCatalof LIKE item.catalog WHERE library.receiptReference LIKE '$reference' AND library.accountSession LIKE '$session'";
//        $result = mysqli_query($link, $query);
//        
//        if($result)
//        {
//            
//        }
    }
}
