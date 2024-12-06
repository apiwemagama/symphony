<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex" />
        <title>Password Reset :: Atonal Records</title>

        <link rel="shortcut icon" href="../../images/site/favicon.png" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="../../css/font-face.css" />
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="../../icons/material-icons/css/material-icons.css" />
        <link type="text/css" rel="stylesheet" href="../../icons/fontawesome/css/fontawesome-all.min.css" />
        <link type="text/css" rel="stylesheet" href="../../css/index.css" />
	
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/jquery.validate.min.js"></script>
        <script src="../../js/materialize.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class='vh-100 valign-wrapper'>
                <div class="container">
                    <form method="POST" id="resetForm">
                        <div class="row">
                            <h5 class='grey-text'>Please provide new password</h5>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l5"><input type="password" id="password" name="password" data-error=".password"><label for="password">New password</label><span class="helper-text password"></span></div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 l5"><input type="password" id="confirmation" name="confirmation" data-error=".confirmation"><label for="confirmation">Confirm password</label><span class="helper-text confirmation"></span></div>
                        </div>
                        <div class="input-field"><button type="submit" class="btn btn-round waves-effect waves-light grey submit" name="reset" id="reset">SUBMIT</button></div>
                    </form>
                </div>
            </div>
        </div>
        <script src="password-reset.js"></script>
    </body>
</html>
