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
        <title>Atonal Records - Label & Content System</title>
								
        <link href="../images/site/favicon.png" rel="shortcut icon" type="image/x-icon" />
        <link href="../css/font-face.css" rel="stylesheet" type="text/css"/>
        <link href="../css/materialize.min.css" rel="stylesheet" type="text/css"/>
        <link href="../icons/material-icons/css/material-icons.css" rel="stylesheet" type="text/css"/>
        <link href="../icons/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/materialize.min.js" type="text/javascript"></script>
        <script src="../js/angular.min.js" type="text/javascript"></script>
        <script src="../js/angular-ui-router.min.js" type="text/javascript"></script>
        <script src="../js/chart.min.js" type="text/javascript"></script>
        <script src="script/components-initialization.js" type="text/javascript"></script>
        
        <script>
            var app = angular.module('myApp', ['ui.router']);
            
            app.config(['$stateProvider', function($stateProvider) {
                $stateProvider
                .state('login', {
                    url: '/login',
                    views:{
                        'content': {templateUrl : "login.php"}
                    }
                })
                .state('analytics', {
                    url: '/analytics',
                    views:{
                        'navigation': {templateUrl: "navigation.php"},
                        'content': {templateUrl : "analytics.php"},
                        'footer': {templateUrl : "footer.php"}
                    }
                })
                .state("content", {
                    url: "/content",
                    views:{
                        'navigation': {templateUrl: "navigation.php"},
                        'content': {templateUrl : "content.php"},
                        'footer': {templateUrl : "footer.php"}
                    }
                })
                .state("genre", {
                    url: "/genre",
                    views:{
                        'navigation': {templateUrl: "navigation.php"},
                        'content': {templateUrl : "genre.php"},
                        'footer': {templateUrl : "footer.php"}
                    }
                });
            }]);
            app.controller("catalogController", function($scope, $http){
                $scope.catalog = function(){
                    var catalogForm = document.getElementById('catalogForm');
                    var data = new FormData(catalogForm);
                    
                    $.ajax({
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        crossDomain: true,
                        method: 'POST',
                        url: 'service/content.php',
                        data: data,
                        beforeSend: function(){
                            document.getElementById("upload").innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
                        },
                        success: function(){
                            M.toast({html: 'Record uploaded successfully.', classes: 'grey'});
                        },
                        error: function(){
                            M.toast({html: 'An error occured. Please try again.', classes: 'grey'});
                        },
                        complete: function(){
                            document.getElementById("upload").innerHTML = "Upload";
                        }
                    });
                }
            });
            app.controller("genreController", function($scope, $http){
                $scope.genre = function(){
                    var genreForm = document.getElementById('genreForm');
                    var data = new FormData(genreForm);
                    
                    $.ajax({
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        crossDomain: true,
                        method: 'POST',
                        url: 'service/genre.php',
                        data: data,
                        beforeSend: function(){
                            document.getElementById("upload").innerHTML = "<i class='fa fa-spinner fa-spin'></i>";
                        },
                        success: function(){
                            M.toast({html: 'Record uploaded successfully.', classes: 'grey'});
                        },
                        error: function(){
                            M.toast({html: 'An error occured. Please try again.', classes: 'grey'});
                        },
                        complete: function(){
                            document.getElementById("upload").innerHTML = "Upload";
                        }
                    });
                }
            });
            app.directive('validFile',function(){
                return {
                    restrict: 'A',
                    require:'ngModel',
                    link:function(scope, el, attrs, ngModel){
                        //change event is fired when file is selected
                        el.bind('change',function(){
                            scope.$apply(function(){
                                ngModel.$setViewValue(el.val());
                                ngModel.$render();
                            });
                        });
                    }
                }
            });
            app.run(['$location', '$rootScope', function($location, $rootScope) {
                $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
                    if (current.hasOwnProperty('$$route'))
                    {
                        $rootScope.title = current.$$route.title;
                    }
                });
            }]);
        </script>
        <script type="text/javascript">
            function PreviewArtwork() {
                var filereader = new FileReader();
                filereader.readAsDataURL(document.getElementById("artwork").files[0]);

                filereader.onload = function (filereaderEvent) {
                    document.getElementById("artwork-container").src = filereaderEvent.target.result;
                };
            };
        
            function PreviewStockimg() {
                var filereader = new FileReader();
                filereader.readAsDataURL(document.getElementById("stockimg").files[0]);

                filereader.onload = function (filereaderEvent) {
                    document.getElementById("stockimg-container").src = filereaderEvent.target.result;
                };
            };
        </script>
    </head>
    <body ng-app="myApp">
        <main>
<!--            <div id="network-connectivity-status" class="w-100 h-100 pin-absolute z-index-1000 grey white-text">
                <div class="container valign-wrapper w-100 h-100">
                    <div>
                        <h3>No internet connection</h3>
                        <p>Please try reconnecting once more</p>  
                    </div>
                </div>
            </div>-->
            <div ui-view="navigation">
            </div>
            <div ui-view="content">
            </div>
            <div ui-view="footer">
            </div>
        </main>
        <script>
            window.addEventListener('offline', function(e) {
                e.preventDefault();
                document.getElementById("network-connectivity-status").style.position = "fixed";
                document.getElementById("network-connectivity-status").style.display = "block";
                document.getElementsByTagName("BODY")[0].style.overflow = "hidden";
            });
            window.addEventListener('online', function(e) {
                e.preventDefault();
                document.getElementById("network-connectivity-status").style.display = "none";
                document.getElementsByTagName("BODY")[0].style.overflow = "scroll";
            });
            
            if (navigator.onLine)
            {
                document.getElementById("network-connectivity-status").style.display = "none";
                document.getElementsByTagName("BODY")[0].style.overflow = "scroll";
            } 
            else 
            {
                document.getElementById("network-connectivity-status").style.position = "fixed";
                document.getElementById("network-connectivity-status").style.display = "block";
                document.getElementsByTagName("BODY")[0].style.overflow = "hidden";
            }
        </script>
    </body>
</html>