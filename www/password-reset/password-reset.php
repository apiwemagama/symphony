<?php
    session_start();
?>
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
        <!--<link type="text/css" rel="stylesheet" href="../../css/semantic.min.css" />-->
        <link type="text/css" rel="stylesheet" href="../../css/font-face.css" />
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css" />
        <link type="text/css" rel="stylesheet" href="../../icons/material-icons/css/material-icons.css" />
        <link type="text/css" rel="stylesheet" href="../../icons/fontawesome/css/fontawesome-all.min.css" />
        <link type="text/css" rel="stylesheet" href="../../css/index.css" />
							    							
        <style>
            .input-field input:focus+label, .materialize-textarea:focus:not([readonly])+label{color: lightgray !important;}
            .input-field input:focus, .materialize-textarea:focus:not([readonly]){border-bottom: 1px solid lightgray !important; box-shadow: 0 1px 0 0 lightgray !important;}
            .fa-exclamation-triangle {font-size: 14px !important;}            
        </style>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/jquery.validate.min.js"></script>
        <script src="../../js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#resetForm").validate({
                    rules: {
                        password: {
                            required: true,
                            rangelength: [8, 15]
                        },
                        confirmation: {
                            required: true,          
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        password: {
                            required: "Please fill out this field."
                        },
                        confirmation: {
                            required: "Please fill out this field."
                        }
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element){
                        var placement = $(element).data('error');
                        if(placement){
                            $(placement).append(error);
                        }
                        else
                        {
                            error.insertAfter(element);
                        }
                    }
                }); 
            });
        </script>
    </head>
    <body>
        <main>
        <?php
            include('../config/database/connection.php');
            
            $id = $_GET["id"];
            $currentTime = date('Y-m-d H:i:s');
            
            $query = "SELECT * FROM reset WHERE account = \"$id\"";
            $result = mysqli_query($link, $query);
            
            if($result)
            {
                $row = mysqli_fetch_array($result);
                
                    $requestTime = $row['resetedon'];
                    $timeDifference = (strtotime($currentTime) - strtotime($requestTime))/60;
                    
                    if($timeDifference < 10)
                    {
                        echo("<div class='vh-100 valign-wrapper'>");
                            echo("<div class=\"container\">");
                                echo("<form method=\"POST\" id=\"resetForm\">");
                                    echo("<div class=\"row\">");
                                        echo("<h5 class='grey-text'>Please provide new password</h5>");
                                    echo("</div>");
                                    echo("<div class=\"row\">");
                                        echo("<div class=\"input-field col s12 l5\"><input type=\"password\" id=\"password\" name=\"password\" data-error=\".password\"><label for=\"password\">New password</label><span class=\"helper-text password\"></span></div>");
                                    echo("</div>");
                                    echo("<div class=\"row\">");
                                        echo("<div class=\"input-field col s12 l5\"><input type=\"password\" id=\"confirmation\" name=\"confirmation\" data-error=\".confirmation\"><label for=\"confirmation\">Confirm password</label><span class=\"helper-text confirmation\"></span></div>");
                                    echo("</div>");
                                    echo("<div class=\"input-field\"><button type=\"submit\" class=\"btn btn-round waves-effect waves-light grey submit\" name=\"reset\" id=\"reset\">SUBMIT</button></div>");
                                echo("</form>");
                            echo("</div>");
                        echo("</div>");
                        
                        if(isset($_POST['reset']))
                        {
                            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            
                            $query = "UPDATE account SET password = \"$password\" WHERE account = $id";
                            $result = mysqli_query($link, $query);
                            
                            if($result)
                            {
                                echo("<script src='../js/jquery.min.js'></script><script src='../js/materialize.min.js'></script><script>M.toast({html: 'Password&nbsp;changed&nbsp;successfully.', classes: 'grey'});</script>");
                            }
                        }
                    }
                    else
                    {
                        echo("<div class='vh-100 valign-wrapper'>");
                            echo("<div class='container grey-text'>");
                                echo("<h5>Sorry, your link has expired</h5>");
                                echo("<p>Please try recovering your password again.</p>");
                                echo("<a class='btn btn-round grey' href='https://localhost/atonalrecords/www/index.php#!/password-recovery'>Recover Password</a>");
                            echo("</div>");
                        echo("</div>");
                    }
                
            }
        ?>
        </main>
    </body>
</html>
