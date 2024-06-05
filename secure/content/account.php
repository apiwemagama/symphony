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
    </head>
    <body>
        <main class="container"> 
            <div class="row">
                <div class="col l3 s12">
                    <div class="card grey white-text z-depth-0 display-table w-100 border-collapse-collapse">
                        <div class="display-table-row vertical-align-middle w-100 h-100 border-bottom-1px-solid-whitesmoke" data-menu-option="profile">
                            <p class="menu-option-padding font-weight-bold">PROFILE</p>
                        </div>
                        <div class="display-table-row vertical-align-middle w-100 h-100 border-bottom-1px-solid-whitesmoke" data-menu-option="update">
                            <p class="menu-option-padding font-weight-bold">UPDATE</p>
                        </div>
                        <div class="display-table-row vertical-align-middle w-100 h-100 border-bottom-1px-solid-whitesmoke" data-menu-option="security">
                            <p class="menu-option-padding font-weight-bold">SECURITY</p>
                        </div>
                        <div class="display-table-row vertical-align-middle w-100 h-100 border-bottom-1px-solid-whitesmoke" data-menu-option="pref">
                            <p class="menu-option-padding font-weight-bold">PREFERENCES</p>
                        </div>
                    </div>
                </div>
                <div class="col l4 s12 grey-text" id="regular">

                </div>
            </div>
        </main>
    </body>
    <script>
        $('#regular').load('../secure/content/profile.php');

        $(".col .card div").click(function(e){
            e.preventDefault();

            var menuOption = this.getAttribute("data-menu-option");

            if(menuOption === 'profile')
            {
                $('#regular').load('../secure/content/profile.php');
            }
            else if(menuOption === 'update')
            {
                $('#regular').load('../secure/content/update.php');
            }
            else if(menuOption === 'security')
            {
                $('#regular').load('../secure/content/security.php');
            }
            else if(menuOption === 'pref')
            {
                $('#regular').load('../secure/content/preferences.php');
            }
        });
    </script>
</html>
