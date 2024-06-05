<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex" />
        <title></title>
        <script src="script/components-initialization.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container grey-text">
            <h4>Populate</h4>
            <form method="POST" enctype="multipart/form-data" id="genreForm" name="genreForm" ng-submit="genre()" ng-controller="genreController">
                <div class="row">
                    <h5>Genre</h5>
                </div>
                <div class="row">
                    <div class="col s12 l3">

                        <div class="row">
                            <div class="col s12 l12">
                                <div style="width: 100%; height: 0; padding-top: 100%; background-color: whitesmoke; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0;">
                                        <img id="stockimg-container" width="100%"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l12">
                                <div class="file-field input-field">
                                    <div class="btn grey">
                                        <span>Stock</span>
                                        <input type="file" id="stockimg" name="stockimg" data-error=".stockimg" ng-model="stockimg" onchange="PreviewStockimg()" accept="image/*" valid-file required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Choose stock image">
                                    </div>
                                    <span class="helper-text stockimg" ng-show="genreForm.stockimg.$invalid && genreForm.stockimg.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 l12">
                        
                                <div class="input-field">
                                    <input type="text" placeholder="Style" id="style" name="style" data-error=".style" ng-model="style" ng-required="true">
                                    <span class="helper-text style" ng-show="genreForm.style.$invalid && genreForm.style.$touched">This field is required.</span>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 l12">
                                <div class="input-field">
                                    <input type="text" placeholder="Grouping" id="grouping" name="grouping" data-error=".grouping" ng-model="grouping" ng-required="true">
                                    <span class="helper-text grouping" ng-show="genreForm.grouping.$invalid && genreForm.grouping.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 l12">    
                                <div class="input-field">
                                    <button type="submit" class="btn waves-effect waves-light grey submit" id="upload" name="upload" ng-disabled="genreForm.$invalid">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
