<div class="container grey-text">
    <div class="row">
        <div class="col">
            <h5>Recover your password</h5>
            <p>Share the email address you registered with Atonal Records.</p>
        </div>
    </div>
    <form method="POST" id="password-recovery-form">
        <div class="row">
            <div class="col s12 l5">
                <div class="input-field"><input type="email" id="emailToRecoverPassword" name="emailToRecoverPassword" data-error=".emailToRecoverPassword"><label for="emailToRecoverPassword">Email</label><span class="helper-text emailToRecoverPassword"></span></div>
                <div class="input-field"><button class="btn btn-reset-password btn-round waves-effect waves-light grey submit" id="btn-reset-password" name="btn-reset-password">RESET</button></div>
            </div>
        </div>
    </form>
    <div class="col s12 l12 grey-text ">
        <?php
//                        if(isset($_POST['reset']))
//                        {
//                            include('../config/database.php');
//
//                            $customerEmail = $_POST['emailToReset'];
//                           
//                            $query = "SELECT * FROM customer WHERE email LIKE '$customerEmail'";
//                            $result = mysqli_query($link, $query);
//
//                            if(mysqli_num_rows($result))
//                            {
//                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//                                
//                                $customerID = $row['id'];
//                                $customerName = $row['name'];
//                                $customerEmail = $row['email'];
//
//                                $currentTime = date('Y-m-d H:i:s');
//
//                                $query = "SELECT * FROM reset WHERE customerid = $customerID";
//                                $result = mysqli_query($link, $query);
//
//                                if(mysqli_num_rows($result))
//                                {
//                                    $query = "UPDATE reset SET requested = \"$currentTime\" WHERE customerid = $customerID";
//                                    $result = mysqli_query($link, $query);
//
//                                    if($result)
//                                    {
//                                        $to = 'root@localhost.com';
//                                        $from = 'noreply@atonalrecords.co.za';
//                                        $subject = 'atonalrecords.co.za | Password Reset';
//                                        // To send HTML mail, the Content-type header must be set
//                                        $headers  = 'MIME-Version: 1.0' . "\r\n";
//                                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//                                        // Create email headers
//                                        $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
//                                        // Compose a simple HTML email message
//                                        $message = "<html>"
//                                                        ."<head>"
//                                                            ."<style>"
//                                                                ."<meta charset=\"UTF-8\">"
//                                                            ."</style>"
//                                                        ."</head>"
//                                                        ."<body>"
//                                                            ."<div style='max-width: 100%; width: 100%;'>"
//                                                                ."<table>"
//                                                                    ."<tr>"
//                                                                        ."<td style='font-family: SEGOE UI; color: #999999;'>Hello <b>$customerName</b><br><br></td>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<td style='font-family: SEGOE UI; color: #999999;'>We have received a request to have your password reset. If you did not make this request, please ignore this message.<br><br></td>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<td style='font-family: SEGOE UI; color: #999999;'>To reset your password, please click the below button.<br><br></td>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<table>"
//                                                                            ."<tr>"
//                                                                                ."<td align=\"center\" width=\"170\" height=\"50\" style=\"background-color: #999999; font-family: SEGOE UI;\">"
//                                                                                    ."<a href=\"http://localhost/atonalrecords/account/password-reset?id=$customerID\" style=\"text-decoration: none; text-transform: uppercase; color: #FFFFFF;\">Reset Password</a>"
//                                                                                ."</td>"
//                                                                            ."</tr>"
//                                                                        ."</table>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<br><td style='font-family: SEGOE UI; color: #999999;'>If you ignore this message, your password won't be changed.</td>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<br><td style='font-family: SEGOE UI; color: #999999;'><b>Having trouble?</b></td>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<br><td style='font-family: SEGOE UI; color: #999999;'>If the above button does not work try copying and pasting this link into your web browser.</td><br>"
//                                                                    ."</tr>"
//                                                                    ."<tr>"
//                                                                        ."<table>"
//                                                                            ."<tr>"
//                                                                                ."<td align=\"center\" width=\"460\" height=\"60\" style=\"background-color: #F5F5F5; font-family: SEGOE UI;\">"
//                                                                                    ."http://localhost/atonalrecords/account/password-reset?id=$customerID"
//                                                                                ."</td>"
//                                                                            ."</tr>"
//                                                                        ."</table>"
//                                                                    ."</tr>"
//                                                                ."</table>"
//                                                            ."</div>"
//                                                        ."</body>"
//                                                    ."</html>";
//                                        // Sending email
//                                        if(mail($to, $subject, $message, $headers))
//                                        {
//                                            echo("<script src='../js/jquery.min.js'></script><script src='../js/materialize.min.js'></script><script>M.toast({html: 'Reset&nbsp;link&nbsp;emailed&nbsp;to&nbsp;you', classes: 'grey rounded'});</script>");
//                                        } 
//                                        else
//                                        {
//                                            echo("<script src='../js/jquery.min.js'></script><script src='../js/materialize.min.js'></script><script>M.toast({html: 'Message&nbsp;not&nbsp;sent,&nbsp;please&nbsp;try&nbsp;again&nbsp;later.&nbsp;If&nbsp;the&nbsp;problem&nbsp;persist,&nbsp;please&nbsp;let&nbsp;us&nbsp;know.', classes: 'rounded grey'});</script>");
//                                        }
//                                    }
//                                }
//                                else
//                                {
//                                    $query = "INSERT INTO reset(customerid) VALUES('$customerID')";
//                                    $result = mysqli_query($link, $query);
//
//                                    if($result)
//                                    {
//                                        echo("<script src='../js/jquery.min.js'></script><script src='../js/materialize.min.js'></script><script>M.toast({html: 'Message&nbsp;not&nbsp;sent,&nbsp;please&nbsp;try&nbsp;again&nbsp;later.&nbsp;If&nbsp;the&nbsp;problem&nbsp;persist,&nbsp;please&nbsp;let&nbsp;us&nbsp;know.', classes: 'rounded grey'});</script>");
//
//                                    }
//                                }
//                            }
//                            else
//                            {
//                                echo("<script src='../js/jquery.min.js'></script><script src='../js/materialize.min.js'></script><script>M.toast({html: 'Account&nbsp;does&nbsp;not&nbsp;exist', classes: 'red rounded'});</script>");
//                            }
//                        }
      ?>
    </div>
</div>
<script src="password-recovery/password-recovery.js"></script>
        