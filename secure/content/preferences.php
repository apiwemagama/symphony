<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    //Database connection string
    include('../../config/database/connection.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
                $('.datepicker').datepicker({
                    minDate: new Date('1970-01-01'),
                    maxDate: new Date(),
                    yearRange: 50
                });
                $('select').formSelect();
                $('.modal').modal();
                $('.dropdown-trigger').dropdown({
                    constrain_width: false,
                    coverTrigger: false
                });
            });
        </script>
    </head>
    <body>
        <div class='card whitesmoke z-depth-0'>
            <div class='card-content'>
                <div class='row'>
                    <div class='col s12 l12'>
                        <h5>Account Preferences</h5>
                        <h6>Permanently delete this account</h6>
                    </div>
                </div>
                <div class='row'>
                    <div class='col s12 l12'>
                        <a href='#confirm-account-deletion' class='btn btn-round waves-effect waves-light modal-trigger red' id='account-deletion' name='account-deletion'>Delete Account</a>
                    </div>
                </div>

                <div id='confirm-account-deletion' class='modal bottom-sheet'>
                    <div class='modal-content'>
                        <h4>Confirm</h4>
                        <p>Do you want to continue? Changes cannot be undone.</p>
                    </div>
                    <div class='modal-footer'>
                        <form method='POST'>
                            <button id='delete' name='delete' class='btn btn-round waves-effect waves-light red submit'>Continue</button> <a class='btn btn-round modal-close waves-effect waves-light grey'>Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
