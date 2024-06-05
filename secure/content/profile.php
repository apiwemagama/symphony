<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    //Database connection string
    include('../../config/database/connection.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class='card whitesmoke z-depth-0'>
            <div class='card-content'>
                <div class='card-title'>
                    Completeness
                </div>    
                <div>
                    <?php echo($_SESSION['percentage']."% ".$_SESSION['placeholder']);?>
                </div>
            </div>
            <div class='progress'>
                <div class='determinate' style="width: <?php echo($_SESSION['percentage'].'%')?>"></div>
            </div>
        </div>
        <div class='card whitesmoke z-depth-0'>
            <div class='card-content'>
                <div class='card-title'>About</div>
                <div><span>First Name</span><span class='right'><?php echo($_SESSION['firstname']);?></span></div>
                <div><span>Last Name</span><span class='right'><?php echo($_SESSION['lastname']);?></span></div>
                <div><span>Phone</span><span class='right'><?php echo($_SESSION['phone']);?></span></div>
                <div><span>Birthdate</span><span class='right'><?php echo($_SESSION['birthdate']);?></span></div>
                <div><span>Gender</span><span class='right'><?php echo($_SESSION['gender']);?></span></div>
                <div><span>Country</span><span class='right'><?php echo($_SESSION['country']);?></span></div>
            </div>
        </div>
    </body>
</html>
