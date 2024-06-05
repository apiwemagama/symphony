<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex" />
        <title></title>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav class="nav-wrapper white z-depth-0">
                <a class="sidenav-trigger show-on-large" data-target="sidenav"><i class="material-icons">menu</i></a>
                <a href="app.php#!/analytics" class="brand-logo hide-on-med-and-down"><img src="../images/site/logo.png" alt="logo" style="height: 64px"></a>
                <a class="brand-logo hide-on-med-and-up"><img src="../images/site/logo.png" alt="logo" style="height: 64px"></a>
            </nav>
        </div>
        <ul id="sidenav" class="sidenav sidenav-close">
            <li>
                <div class="user-view grey-text">
                    <div class="background">
                    </div>
                    <img class="circle" src="../images/site/placeholder.jpg">
                    <span class="name"></span>
                    <span class="email"></span>
                </div>
            </li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Dashboard</a></li>
            <li><a href="#!analytics"><i class="fas fa-chart-line"></i>Analytics</a></li>
            <li><a class="subheader">Content Management</a></li>
            <li><a href="#!content"><i class="fa fa-archive"></i>Catalog</a></li>
            <li><a href="#!genre"><i class="fa fa-music"></i>Genre</a></li>
            <li><a class="subheader">Marketing</a></li>
            <li><a href="#!promotions"><i class="fa fa-bullhorn"></i>Promotions</a></li>
            <li><a class="subheader">General</a></li>
            <li><a href="#!settings"><i class="fa fa-cog"></i>Settings</a></li>
            <li><a onclick="signout()"><i class="fas fa-sign-out-alt"></i>Sign Out</a></li>
        </ul>
    </body>
    <script>
        userview();
        
        function userview()
        {
            document.getElementsByClassName("name")[0].textContent = ""+sessionStorage.getItem("fullname");
            document.getElementsByClassName("email")[0].textContent = ""+sessionStorage.getItem("email");
        }
        
        function signout(){
            sessionStorage.clear();
        }
    </script>
</html>
