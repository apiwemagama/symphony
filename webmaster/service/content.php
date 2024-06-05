<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include('../../config/database/connection.php');

$id = bin2hex(random_bytes(6));
$genre = $_POST['genre'];
$title = $_POST['title'];
$album = $_POST['album'];
$musician = $_POST['musician'];
$artwork = $_POST['artwork'];
$price = $_POST['price'];
$audio = $_POST['audio'];
$version = $_POST['version'];
$format = $_POST['format'];
$date = $_POST['date'];
$isrc = $_POST['isrc'];
$upc = $_POST['upc'];

//$bytes = bin2hex(random_bytes(6));                 
//Block code to help upload the artwork 
$artwork_dir = "../../uploads/artwork/";
$target_image = $_FILES["artwork"]["name"];
$imageFileType = pathinfo($target_image,PATHINFO_EXTENSION);
//Rename the slected upload file
$artwork = $id.".".$imageFileType;

move_uploaded_file($_FILES["artwork"]["tmp_name"], $artwork_dir.$artwork);

$audio_dir = "../../uploads/audio/";
$target_audio = $_FILES["audio"]["name"];
$audioFileType = pathinfo($target_audio,PATHINFO_EXTENSION);
//Rename the slected upload file
$audio = $id.".".$audioFileType;

move_uploaded_file($_FILES["audio"]["tmp_name"], $audio_dir.$audio);

$query = "INSERT INTO item(id, genreID, title, album, musician, artwork, price, audio, version, format, date, isrc, upc) VALUES('$id','$genre','$title','$album', '$musician', '$artwork', '$price', '$audio', '$version', '$format', '$date', '$isrc', '$upc')";
$result = mysqli_query($link, $query);
