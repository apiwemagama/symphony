<div class="container grey-text">
    <?php
        include('../../config/database/connection.php');
        
        
        $toDate = date("Y-m-d");
        $style = $_POST['style'];
        $category = $_POST['category'];
        
        //echo($style." ".$category);
        
        $query = "SELECT ANY_VALUE(musician) AS musician , ANY_VALUE(title) AS title ,ANY_VALUE(UPC) AS UPC, ANY_VALUE(artwork) AS artwork, ANY_VALUE(date) AS date, ANY_VALUE(album) AS album FROM item INNER JOIN genre ON item.genreID = genre.id WHERE genre.style LIKE '$style' AND item.date <= '$toDate' GROUP BY UPC ORDER BY date DESC";
        $result = mysqli_query($link, $query);

        if($result)
        {
            echo("<div class='row'>");
                echo("<h3>$style $category</h3>");
                while($row = mysqli_fetch_assoc($result))
                {
//                    $itemID = $row["id"];

//                    $genreGroup = $row["category"];
//                    $genreStyle = $row["style"];

//                    $itemGenre = ucwords($genreStyle." ".$genreGroup);
                    $itemTitle = $row["title"];
                    $itemMusician = $row["musician"];
                    $itemArtwork = $row["artwork"];
//                    $itemPrice = $row["price"];
//                    $itemAudio = $row["audio"];
//                    $itemVersion = $row["version"];
//                    $itemFormat = $row["format"];
                    $itemDate = $row["date"];
//                    $itemISRC = $row["ISRC"];
                    $itemUPC = $row["UPC"];
                    $itemAlbum = $row["album"];

                    echo("<div class='col s12 m3 l3'>");
                        echo("<div class='card genre z-depth-0' data-item-title='$itemTitle' data-item-musician='$itemMusician' data-item-upc='$itemUPC' data-item-album='$itemAlbum'>");
                            echo("<div class='card-image'>");
                                echo("<img src='../uploads/artwork/$itemArtwork'>");
//                                        echo("<div class='card-shopping pin-absolute bottom'>"); 
//                                            echo("<div class='btn-square white left pin-top valign-wrapper' id='playBtn' data-track='../uploads/audio/$itemAudio' data-artwork='../uploads/artwork/$itemArtwork' data-title='$itemTitle' data-musician='$itemMusician' data-version='$itemVersion' data-release='$itemDate' data-genre='$itemGenre'>");
//                                                echo("<span class='center-block'><i class='fa fa-play grey-text'></i></span>");
//                                            echo("</div>");
//                                            echo("<div class='btn-square grey lighten-1 left pin-top valign-wrapper' id='btn-add-to-cart' data-id='$itemID' data-artwork='../uploads/artwork/$itemArtwork' data-title='$itemTitle' data-musician='$itemMusician'>");
//                                                echo("<span class='center-block'><i class='fa fa-cart-plus white-text'></i></span>");
//                                            echo("</div>");
//                                            echo("<div class='btn-rectangle left pin-top valign-wrapper'>");
//                                                echo("<span class='white-text center-block'>R $itemPrice</i></span>");
//                                            echo("</div>");
//                                        echo("</div>");
                            echo("</div>");
                            echo("<div class='card-content padding'>");
                                echo("<p class='font-weight-bold'>$itemTitle</p>");
                                echo("<p>$itemMusician</p>");
                            echo("</div>");
                        echo("</div>");
                    echo("</div>");
                }
            echo nl2br("\n");
        }
        else
        {
            echo("<div class='pin-top vh-100 valign-wrapper'>");
                echo("<div class='center-block'>");
                    echo("<div class='center grey-text'><i class='fa fa-hourglass-half fa-10x'></i></div>");
                    echo("<div class='center grey-text'><h6>There are no available <b>".$style." ".$category."</b> recordings from us at the present moment.</h6></div>");
                echo("</div>");
            echo("</div>");
        }
    ?>
</div>
