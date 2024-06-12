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
                <ul class="collapsible" id="library-list">    
                    
                </ul>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            var session = sessionStorage.getItem("session");

            $.ajax({
                url: 'https://localhost/atonalrecords/secure/service/library',
                type: 'POST',
                dataType: 'json',
                data: {session: session},
                success: function(response) {
                    var libraryList = $('#library-list');
                    
                    response.forEach(function(purchase) {
                        var purchaseDateArray = purchase['date'].split(',');
                        var purchaseDate = purchaseDateArray[0];
                        var listItem = $('<li>');
                        var header = $('<div>').addClass('collapsible-header').text('Your downloads purchased on ' + purchaseDate);
                        var body = $('<div>').addClass('collapsible-body');
                        var content = $('<div>').addClass('row')
                            .append('<div class="col l1"></div>')
                            .append('<div class="col l3">Track<br/>Version</div>')
                            .append('<div class="col l2">Musician<br/>Remixer</div>')
                            .append('<div class="col l1">Genre<br/>Style</div>')
                            .append('<div class="col l1">Format<br/>Size</div>');

                        var artworks = purchase['artwork'].split(',');
                        var titles = purchase['title'].split(',');
                        var musicians = purchase['musician'].split(',');
                        var versions = purchase['version'].split(',');
                        var audios = purchase['audio'].split(',');
                        var categories = purchase['category'].split(',');
                        var styles = purchase['style'].split(',');
                        var formats = purchase['format'].split(',');

                        artworks.forEach(function(artwork, index) {
                            var title = titles[index];
                            var musician = musicians[index];
                            var version = versions[index];
                            var audio = audios[index];
                            var category = categories[index].charAt(0).toUpperCase() + categories[index].slice(1);
                            var style = styles[index].charAt(0).toUpperCase() + styles[index].slice(1);
                            var format = formats[index];
                            var byte = Math.random() * 10485760; // Simulating file size, replace this with actual logic
                            var filesize = (byte / 1048576).toFixed(1);

                            var row = $('<div>').addClass('row')
                                .append('<div class="col l1"><img src="../uploads/artwork/' + artwork + '" class="responsive-img"></div>')
                                .append('<div class="col l3">' + title + '<br/>' + version + '</div>')
                                .append('<div class="col l2">' + musician + '</div>')
                                .append('<div class="col l1">' + category + '<br/>' + style + '</div>')
                                .append('<div class="col l2">' + format + '<br/>' + filesize + ' MB</div>')
                                .append('<div class="col l1"><a class="btn orange" href="../uploads/audio/' + audio + '" download="' + musician + ' - ' + title + ' (' + version + ')">MP3</a></div>');

                            body.append(row);
                        });
                        
                        listItem.append(header).append(body);
                        libraryList.append(listItem);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('An error occurred: ' + error);
                }
            });
        });
    </script>
    </body>
</html>
