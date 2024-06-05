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
        <script>
            $(document).ready(function(){
                $('.collapsible').collapsible();
            });
        </script>
    </head>
    <body>
        <div class="container grey-text">
            <div class="row">
                <h3>Library</h3>
                <ul class="collapsible">    
                    <?php
                        session_start();
                        //cURL for Shop by Genre section
                        $url = "https://localhost/atonalrecords/secure/service/library";

                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                        $headers = array(
                            "Accept: application/json",
                        );
                        
                        curl_setopt($curl, CURLOPT_POSTFIELDS, [
                            "session" => $_SESSION['session']
                        ]);
                        
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        $response = curl_exec($curl);

                        if($response === false)
                        {
                            echo("".curl_error($curl));
                        }
                        else
                        {
                            $data = json_decode($response, true); 

                            foreach($data as $key => $purchase) 
                            {
                                $purchaseDateArray = explode(',', $purchase['date']);
                                $purchaseDate = $purchaseDateArray[0];
                                
                                echo("<li>");
                                    echo("<div class='collapsible-header'>Your downloads purchased on $purchaseDate</div>");
                                    echo("<div class='collapsible-body'>");
                                        echo("<div class='row'><div class='col l1'></div><div class='col l3'>Track<br/>Version</div><div class='col l2'>Musician<br/>Remixer</div><div class='col l1'>Genre<br/>Style</div><div class='col l1'>Format<br/>Size</div></div>");
                                        $artworks = explode(',', $purchase['artwork']);
                                        $titles = explode(',', $purchase['title']);
                                        $musicians = explode(',', $purchase['musician']);
                                        $versions = explode(',', $purchase['version']);
                                        $audios = explode(',', $purchase['audio']);
                                        $categories = explode(',', $purchase['category']);
                                        $styles = explode(',', $purchase['style']);
                                        $formats = explode(',', $purchase['format']);

                                        foreach($artworks as $index => $cell)
                                        { 
                                            $artwork = "../../uploads/artwork/".$artworks[$index];
                                            $title = $titles[$index];
                                            $musician = $musicians[$index];
                                            $version = $versions[$index];
                                            $audio = $audios[$index];
                                            $category = ucfirst($categories[$index]);
                                            $style = ucfirst($styles[$index]);
                                            $format = $formats[$index];

                                            $byte = filesize("../../uploads/audio/$audio");
                                            $filesize = number_format($byte / 1048576, 1);

                                            echo("<div class='row'>");
                                                echo("<div class='col l1'><img src='../uploads/cover/$artwork' class='responsive-img'></div> <div class='col l3'>$title<br/>$version</div> <div class='col l2'>$musician</div> <div class='col l1'>$category<br/>$style</div>  <div class='col l2'>$format<br/>$filesize MB</div> <div class='col l1'><a class='btn orange' href='../uploads/audio/$audio' download='$musician - $title ($version)'>MP3</a></div>");
                                            echo("</div>");
                                        }
                                    echo("</div>");
                                echo("<li>");
                            }
                        }
                        curl_close($curl);
                    ?>
                </ul>
            </div>
        </div>
    </body>
</html>
