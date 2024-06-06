<div class="container grey-text">
    <h3>Cart</h3>
    <div class='row'>
        <div class='col s12 l12'>
            <span>Your items</span>    
        </div>
    </div>
    <div class='row'>
        <div class='column col s12 l8'>

        </div>
        <div class='col s12 l4'>
            <div class='card whitesmoke z-depth-0'>
                <div class='card-content'>
                    <div class='card-title whitesmoke'>
                       <span>Summary</span>
                    </div>
                    <div>
                        <span>Sub Total<span class='subtotal right'> </span></span>
                    </div>
                    <div>
                        <span>VAT<span class='right'>16%</span></span>
                    </div>
                </div>
                <div class='card-content'>
                    <div>
                        <b>GRAND TOTAL<span class='grandtotal right'> </span></b>
                    </div>
                </div>

                <div class='card-content'>
                    <input type='submit' value='Proceed to checkout' class='btn red btn-round btn-block btn-checkout'>
                </div>

                <div class='card-action'>
                    <div>
                        <b>Need help?</b>
                    </div>
                    <div><a href='../site/contact' class='grey-text' style='text-transform: none;'>Contact us</a></div>
                    <div><b>Payment methods</b></div>
                    <div>All cards accepted</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var session = sessionStorage.getItem("session");

        $.ajax({
            method: 'POST',
            url: '/atonalrecords/secure/service/cart',
            data: {session: session},
            success: function(result){
                $.each(result, function(key, value){
                    date = new Date(value.date);

                    var options = {
                        month: 'short', // Abbreviated month name (e.g., "Mar")
                        day: '2-digit', // Two-digit day of the month (e.g., "11")
                        year: 'numeric' // Full year (e.g., "2024")
                    };

                    date = date.toLocaleDateString('en-US', options);

                    $(".column").append("<div class='row'><div class='col s11 l12'><div id='card-item' class='card horizontal z-depth-0'><div class='card-image'><img src='../uploads/artwork/"+value.artwork+"'></div><div class='pin-absolute'><button id='btn-remove-from-cart' class='btn btn-remove-from-cart btn-floating btn-flat btn-opacity waves-effect white-text' data-item-catalog='"+value.itemCatalog+"'><i class='material-icons'>close</i></button></div><div class='card-stacked'><div class='card-content'><p>"+value.title+"</p><p><b>"+value.version+"</b></p><p style='white-space: nowrap; width: 100%; overflow: hidden; text-overflow: cut;'>"+value.musician+"</p><p>R"+value.price+"</p><blockquote><p><b>Album</b>\n"+value.album+"</p><p><b>Release</b>\n"+date+"</p><p><b>Genre</b>\n"+value.category+"</p><p><b>Sub-genre</b>\n"+value.style+"</p></blockquote></div></div></div></div></div>");
                });
            },
            error: function(){
                console.error("There was an error passing over data");
            }
        });

        $.ajax({
            method: 'POST',
            url: '/atonalrecords/secure/service/cart-subtotal',
            data: {session: session},
            success: function(result){
                $.each(result, function(key, value){
                    $(".subtotal").append("<span>R"+value.subtotal+"</span>");
                });
            },
            error: function(){
                console.error("There was an error passing over subtotal");
            }
        });

        var grandtotal = 0;

        $.ajax({
            method: 'POST',
            url: '/atonalrecords/secure/service/cart-grandtotal',
            data: {session: session},
            success: function(result){
                $.each(result, function(key, value){
                    grandtotal = value.grandtotal;

                    $(".grandtotal").append("<span>R"+grandtotal+"</span>");
                });
            },
            error: function(){
                console.error("There was an error passing over grandtotal");
            }
        });

        $(document).on("click", ".btn-checkout", function(e){
            e.preventDefault();

            var currentDate = new Date();

            function reference(date) {
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                var hours = ('0' + date.getHours()).slice(-2);
                var minutes = ('0' + date.getMinutes()).slice(-2);
                var seconds = ('0' + date.getSeconds()).slice(-2);

                return 'SYM-ZAR-' + year + month + day + '-' + hours + minutes + seconds;
            }

            var reference = reference(currentDate);

            $.ajax({
                url: '/atonalrecords/secure/service/receipt',
                method: 'POST',
                data: {reference: reference, session: session, grandtotal: grandtotal},
                success: function(){
    //                $.each(result, function(key, value){
    //                    $(".subtotal").append("<span>R"+value.subtotal+"</span>");
    //                });
                    console.log("Cart: reference passed over to receipt service");
                },
                error: function(){
    //                console.error("There was an error passing over data");
                    console.log("Error");
                }
            });
        });
    });
</script>