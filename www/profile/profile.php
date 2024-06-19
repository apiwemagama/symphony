<div class='card whitesmoke z-depth-0'>
    <div class='card-content'>
        <div class='card-title'>
            Completeness
        </div>    
        <div>

        </div>
    </div>
    <div class='progress'>
        <div class='determinate' style="width: "></div>
    </div>
</div>
<div class='card whitesmoke z-depth-0'>
    <div class='card-content'>
        <div class='card-title'>About</div>
        <div><span>First Name</span><span class='firstname right'></span></div>
        <div><span>Last Name</span><span class='lastname right'></span></div>
        <div><span>Phone</span><span class='phone right'></span></div>
        <div><span>Birthdate</span><span class='birthdate right'></span></div>
        <div><span>Gender</span><span class='gender right'></span></div>
        <div><span>Country</span><span class='country right'></span></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var session = sessionStorage.getItem("session");

        $.ajax({
            method: 'GET',
            url: '../secure/service/profile',
            data: {session: session},
            success: function(result){
                $.each(result, function(key, value){
                    $(".firstname").append(value.firstname);
                    $(".lastname").append(value.lastname);
                    $(".phone").append(value.phone);
                    $(".birthdate").append(value.birthdate);
                    $(".gender").append(value.gender);
                    $(".country").append(value.country);
                });
            },
            error: function(){
                console.error("There was an error passing over profile");
            }
        });
    });
</script>       
