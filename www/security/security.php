<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="../secure/script/security.js"></script>
    </head>
    <body>       
        <div class='card whitesmoke z-depth-0'>
            <div class='card-content'>
                <div class='card-title'>
                    Security
                </div>
                <form method='POST' id='account-security-form'>
                    <div class='row'>
                        <div class='input-field col s12 l12'>
                            <input type='password' id='passwordnthof3rd' name='password' data-error='.password'>
                            <label for='password'>New password</label>
                            <span class='helper-text password'></span>
                        </div>                                            
                        <div class='input-field col s12 l12'>
                            <input type='password' id='confirmation' name='confirmation' data-error='.confirmation'>
                            <label for='confirmation'>Confirm password</label>
                            <span class='helper-text confirmation'></span>
                        </div>
                        <div class='col l4'>
                            <button class='btn btn-round waves-effect waves-light grey submit' id='change' name='change'>Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
