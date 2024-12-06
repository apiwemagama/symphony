<div class="container grey-text">
    <h1></h1>
    <div class='row'>
        <div class='col l10'>
            <div class='row'>
                <div class='artwork col l4'>
                    <div></div>
                </div>
                <div class='col l8'>
                    <div class='musician row'>
                        <div class='col s12 l12'>RELEASE</div>
                        <!--<div class='col s12 l12'><h2 class='no-padding-top no-padding-bottom'><?php echo strtoupper($album)?></h2></div>-->
                    </div>
<!--                    <div class='row'>
                        <div class='col s3 l1'>
                            <a data-href='<?php echo($url)?>' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=<?php echo($url)?>&amp;src=sdkpreparse' class='fb-xfbml-parse-ignore btn btn-floating darken-4 blue waves-effect waves-light'><i class='fab fa-facebook-f'></i></a>
                        </div>
                        <div class='col s3 l1'>
                            <a class='btn btn-floating light-blue waves-effect waves-light' target='_blank' href='https://twitter.com/intent/tweet?url=<?php echo($url)?>' data-show-count='false'><i class='fab fa-twitter'></i></a>
                        </div>
                        <div class='col s3 l1'>
                            <a class='btn btn-floating light-green waves-effect waves-light' href='https://wa.me/?text=<?php echo($url)?>' target='_blank'><i class='fab fa-whatsapp'></i></a>
                        </div>
                    </div>-->
                </div>  
            </div> 
        </div>
        <div class='col l2'>
        </div>
    </div>
    <div class='row'>
        <div class='col l10'>
            <div class='row'>
                <div class='col s12 m12 l12'>
                    <table class='highlight responsive-table'>
                        <thead>
                            <tr class="no-border-bottom">
                                <th></th>
                                <th></th>
                                <th>Song</th>
                                <th>Musician</th>
                                <th>Remixer</th>
                                <th>Genre</th>
                                <th>Version</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="audio">
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class='row'>
                <div class='genre col s4 l3'>
                    <h6><b>Genre</b></h6>
                </div>
                <div class='date col s4 l3'>
                    <h6><b>Released</b></h6>
                </div>
                <div class='col s4 l3'>
                    <h6><b>Label</b></h6>
                    Atonal Records
                </div>
            </div>

            <div class='row'>
                <div class='format col s4 l3'>
                    <h6><b>File Type</b></h6>
                </div>
                <div class='col s4 l3'>
                    <h6><b>Access Type</b></h6>
                     Streaming & by permanent download to your device
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var url = window.location.href;
            var urlParams = new URLSearchParams(url.split('?')[1]);
            var bo = urlParams.get('bo');
            var co = urlParams.get('co');

            $.ajax({
                method: 'GET',
                url: '/atonalrecords/secure/service/release-overview',
                data: {upc: bo, album: co},
                dataType: 'json',
                success: function(data){
                    var object = data[0];
                    var musician = object.musician;
                    var album = object.album;
                    var artwork = object.artwork;
                    var style = object.style;
                    var category = object.category;
                    var date = object.date;

                    date = new Date(date);

                    var options = {
                        month: 'short', // Abbreviated month name (e.g., "Mar")
                        day: '2-digit', // Two-digit day of the month (e.g., "11")
                        year: 'numeric' // Full year (e.g., "2024")
                    };

                    date = date.toLocaleDateString('en-US', options);

                    var format = object.format;

                    $(".artwork").append("<div><img src='../uploads/artwork/"+artwork+"' alt='artwork' class='responsive-img'></div>");
                    $(".musician").append("<div class='col s12 l12'><h2 class='no-padding-top no-padding-bottom'>"+album+"</h2></div>");
                    $(".musician").append("<div class='col s12 l12'>"+musician+"</div>");
                    $(".genre").append(""+style+" "+category);
                    $(".date").append(""+date);
                    $(".format").append(""+format);
                },
                error: function(){
                    console.error("There was an error passing over data");
                }
            });
            $.ajax({
                method: 'GET',
                url: '/atonalrecords/secure/service/release-overview',
                data: {upc: bo, album: co},
                dataType: 'json',
                success: function(data){
                    var track = 1;

                    $.each(data, function(key, value){    
                        $(".audio").append("<tr class='no-border-bottom'><td>"+track++ +"</td><td class='center'><a id='btn-play' class='btn btn-play btn-round z-depth-0 grey-text whitesmoke' data-track='../uploads/audio/"+value.audio+"' data-artwork='../uploads/artwork/"+value.artwork+"' data-title='"+value.title+"' data-musician='"+value.musician+"' data-version='"+value.version+"' data-date='"+value.date+"' data-genre='"+value.style+"'><i class='fa fa-play'></i></a></td><td><span>"+value.title+"</span></td><td>"+value.musician+"</td><td></td><td>"+value.category+"</td><td>"+value.version+"</td><td><button class='btn btn-add-to-cart btn-round waves-effect waves-light grey white-text' data-catalog='"+value.catalog+"' data-artwork='../uploads/artwork/"+value.artwork+"' data-title='"+value.title+"' data-musician='"+value.musician+"'><i class='fa fa-cart-plus left'></i>"+value.price+"</button></td></tr>");
                    });
                },
                error: function(){
                    console.error("There was an error passing over data");
                }
            });
        });
    </script>
</div>
