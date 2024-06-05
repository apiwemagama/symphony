<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex" />
        <title></title>						
        <style>
            .box{height: 100%;}
            .input-field input:focus+label, .materialize-textarea:focus:not([readonly])+label{color: lightgray !important;}
            .input-field input:focus, .materialize-textarea:focus:not([readonly]){border-bottom: 1px solid lightgray !important; box-shadow: 0 1px 0 0 lightgray !important;}
            .input-field .prefix.active{color: lightgray;}
            [type="checkbox"]+span:not(.lever):before{border: 2px solid grey;}
            [type="checkbox"]:checked + span:not(.lever):before{border-bottom-color: grey; border-right-color: grey; color: grey;}
            #toast-container{top: auto !important; bottom: 0 !important; left: auto !important; right: 0 !important; min-width: 100%;}
            .panel{position: absolute; width: 100%; height: 100%;}
            .left-panel{background-color: grey; color: white; width: 60%; height: 100%; float: left;}
            .right-panel{width: 40%; height: 100%; float: left;}
            .w-100{width: 100%;}
            .btn-rounded-corners{border-radius: 50px 50px 50px 50px;}
            @media screen and (max-width: 480px)
            {
                .right-panel{width: 100% !important;}
            }
        </style>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/materialize.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/angular.min.js"></script>
        <script src="script/login.js"></script>
    </head>
    <body>
        <div class="panel">
            <div class="left-panel hide-on-small-and-down">
                <div class="container box valign-wrapper">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <h2>Label & Content<br>Management<br>System</h2>
                        </div>
                        <div class="col s12 m12 l12">
                            <p>Unauthorized or improper use of this system may result in administrative disciplinary action, civil and criminal penalties. Therefore if you are not authorized, please <b>close</b> this page.</p>
                        </div>
                    </div>
                </div>       
            </div>
            <div class="right-panel">
                <div class="container grey-text box valign-wrapper">
                    <div class="row">
                        <div class="col s12 l12">
                            <div class="col s12 m12 l12">
                                <img src="../images/site/logo.png" class="col s12 m12 l12">
                            </div>
                            <div class="col s12 m12 l12">
                                <div class="center"><h6>Log in to your account</h6></div>
                            </div>
                            <form id="loginForm">																																
                                <div class="col s12 m12 l12">
                                    <div class="input-field"><input type="email" id="email" name="email" value="<?php if(isset($_COOKIE['email'])){echo($_COOKIE['email']);}?>" data-error=".email"><label for="email">Email</label><span class="helper-text email"></span></div>
                                    <div class="input-field"><input type="password" id="password" name="password" autocomplete="on" value="<?php if(isset($_COOKIE['password'])){echo($_COOKIE['password']);}?>" data-error=".password"><label for="password">Password</label></div>
                                    <div class="input-field"><p><label><input class="indeterminate-checkbox" type="checkbox" id="session" name="session" data-error=".session"><span>Keep me logged in</span></label></p></div>
                                    <div class="input-field"><button type="submit" class="btn btn-rounded-corners grey waves-effect waves-light w-100" id="login" name="login">Log in</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
