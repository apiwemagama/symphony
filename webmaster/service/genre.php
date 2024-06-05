<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('../../config/database/connection.php');

$style = $_POST['style'];
$grouping = $_POST['grouping'];
$stockimg = $_POST['stockimg'];

$stockimg_dir = "../../uploads/genre/stock/";
$target_image = $_FILES["stockimg"]["name"];
$imageFileType = pathinfo($target_image,PATHINFO_EXTENSION);
//Rename the slected upload file
$stockimg = $style."-".$grouping.".".$imageFileType;

move_uploaded_file($_FILES["stockimg"]["tmp_name"], $stockimg_dir.$stockimg);

$query = "INSERT INTO genre(style, grouping, stockimg) VALUES('$style','$grouping','$stockimg')";
$result = mysqli_query($link, $query);

//if($result)
//{
//    echo("success");
//}