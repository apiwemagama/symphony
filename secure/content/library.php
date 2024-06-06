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
                    
                </ul>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                var session = sessionStorage.getItem("session");

                $.ajax({
                    method: 'POST',
                    url: '/atonalrecords/secure/service/library',
                    data: {session: session},
                    success: function(result){
                        $.each(result, function(key, value){
                            $(".collapsible").append("<li><div class='collapsible-header'><i class='material-icons'>filter_drama</i>Your downloads purchased on "+value.date+"</div><div class='collapsible-body'><span>Lorem ipsum dolor sit amet.</span></div></li>");
                        });
                    },
                    error: function(){
                        console.error("There was an error passing over data");
                    }
                });
            });
        </script>
    </body>
</html>
