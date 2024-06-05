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
        <script src="script/components-initialization.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container grey-text">
            <h4>Upload content</h4>
            <form method="POST" enctype="multipart/form-data" id="catalogForm" name="catalogForm" ng-submit="catalog()" ng-controller="catalogController">
                <div class="row">
                    <h5>Basic info</h5>
                </div>
                <div class="row">
                    <div class="col s12 l3">
                        <div style="width: 100%; height: 0; padding-top: 100%; background-color: whitesmoke; position: relative;">
                            <div style="position: absolute; top: 0; left: 0;">
                                <img id="artwork-container" width="100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 l6">    
                        <div class="row">
                            <div class="col s12 l6">
                                <div class="file-field input-field">
                                    <div class="btn grey">
                                        <span>Artwork</span>
                                        <input type="file" id="artwork" name="artwork" data-error=".artwork" ng-model="artwork" onchange="PreviewArtwork()" accept="image/*" valid-file required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Choose artwork image">
                                    </div>
                                    <span class="helper-text artwork" ng-show="catalogForm.artwork.$invalid && catalogForm.artwork.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 l6">
                                <div class="input-field">
                                    <input type="text" placeholder="Album" id="album" name="album" data-error=".album" ng-model="album" ng-required="true">
                                    <span class="helper-text album" ng-show="catalogForm.album.$invalid && catalogForm.album.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 l6">
                                <div class="input-field">
                                    <input type="text" placeholder="Title" id="title" name="title" data-error=".title" ng-model="title" ng-required="true">
                                    <span class="helper-text title" ng-show="catalogForm.title.$invalid && catalogForm.title.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col s12 l6">
                                <div class="input-field">
                                    <select id="musician" name="musician" class="browser-default" data-error=".musician" ng-model="musician" ng-required="true">
                                        <option value="" disabled="" selected="">Musician...</option>
                                        <option value="Kloug McGama">Kloug McGama</option>
                                    </select>
                                    <span class="helper-text musician" ng-show="catalogForm.musician.$invalid && catalogForm.musician.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 l6">
                                <div class="input-field">
                                    <?php
                                        include('../config/database/connection.php');
                                    
                                        $query = "SELECT * FROM genre";
                                        $result = mysqli_query($link, $query);
                                        
                                        if($result)
                                        {
                                            echo("<select id='genre' name='genre' class='browser-default' data-error='.genre' ng-model='genre' ng-required='true'>");
                                                echo("<option value='' disabled selected>Genre...</option>");
                                                
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $genreID = $row['id'];
                                                    $style = $row['style'];
                                                    $grouping = $row['grouping'];
                                                    
                                                    echo("<option value='$genreID'>$style $grouping</option>");
                                                }
                                            echo("</select>");
                                        }
                                    ?>
                                    
<!--                                    <select id="genre" name="genre" class="browser-default" data-error=".genre" ng-model="genre" ng-required="true">
                                        <option value="" disabled selected>Genre...</option>
                                        <option value="1">Afro House</option>
                                        <option value="2">Classic Out</option>
                                        <option value="3">Deep House</option>
                                        <option value="4">Electronic</option>
                                        <option value="5">Lounge</option>
                                        <option value="6">Soulful House</option>
                                    </select>-->
                                    
                                    <span class="helper-text genre" ng-show="catalogForm.genre.$invalid && catalogForm.genre.$touched">This field is required.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="row"><h5>Metadata</h5></div>
                <div class="row">
                    <div class="col s12 l3">
                        <div class="input-field">
                            <input type="text" placeholder="UPC"  id="upc" name="upc" data-error=".upc" ng-model="upc" ng-minlength="12" ng-maxlength="12" ng-required="true">
                            <div ng-show="catalogForm.$submitted || catalogForm.upc.$touched">    
                                <span class="helper-text upc" ng-show="catalogForm.upc.$invalid && catalogForm.upc.$touched">This field is required.</span>
                                <span class="helper-text upc" ng-show="catalogForm.upc.$error.maxlength">Please match the requested format (exactly 12 characters long).</span>
                                <span class="helper-text upc" ng-show="catalogForm.upc.$error.minlength">Please match the requested format (exactly 12 characters long).</span>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 l3">
                        <div class="input-field">
                            <input type="text" placeholder="ISRC" id="isrc" name="isrc" data-error=".isrc" ng-model="isrc" ng-minlength="12" ng-maxlength="12" ng-required="true">
                            <div ng-show="catalogForm.$submitted || catalogForm.isrc.$touched">
                                <span class="helper-text isrc" ng-show="catalogForm.isrc.$error.required">This field is required.</span>
                                <span class="helper-text isrc" ng-show="catalogForm.isrc.$error.maxlength">Please match the requested format (exactly 12 characters long).</span>
                                <span class="helper-text isrc" ng-show="catalogForm.isrc.$error.minlength">Please match the requested format (exactly 12 characters long).</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l3">
                        <div class="file-field input-field">
                            <div class="btn grey">
                                <span>Audio</span>
                                <input type="file" id="audio" name="audio" data-error=".audio" ng-model="audio" accept="audio/mp3" valid-file required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload the audio file">
                            </div>
                            <span class="helper-text audio" ng-show="catalogForm.audio.$invalid && catalogForm.audio.$touched">This field is required.</span>
                        </div>
                    </div>
                    <div class="col s12 l3">
                        <div class="input-field">
                            <select id="format" name="format" class="browser-default" data-error=".format" ng-model="format" ng-required="true">
                                <option value="" disabled selected>File format...</option>
                                <option value="MP3">MPEG</option>
                                <option value="OGG">OGG</option>
                                <option value="WAV">WAV</option>
                            </select>
                            <span class="helper-text format" ng-show="catalogForm.format.$invalid && catalogForm.format.$touched">This field is required.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l3">
                        <div class="input-field">
                            <input type="text" placeholder="Version" id="version" name="version" data-error=".version" ng-model="version">
                            <span class="helper-text version"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l3">
                        <div class="input-field">
                            <input type="text" placeholder="Select release date" id="date" name="date" class="datepicker" data-error=".date" ng-model="date" ng-required="true">
                            <div ng-show="catalogForm.$submitted || catalogForm.date.$touched">    
                                <span class="helper-text date" ng-show="catalogForm.date.$error.required">This field is required.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"><h5>Permissions</h5></div>
                <div class="row">
                    <div class="col s12 l3">
                        <div class="input-field">
                            <select id="price" name="price" class="browser-default" data-error=".price" ng-model="price" ng-required="true">
                                <option value="" disabled selected>Price...</option>
                                <option value="5.99">R5.99 ZAR</option>
                            </select>
                            <span class="helper-text price" ng-show="catalogForm.price.$invalid && catalogForm.price.$touched">This field is required.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l12">
                        <div class="input-field">
                            <p>
                                <label>
                                    <input id="indeterminate-checkbox" type="checkbox" id="agreement" name="agreement" data-error=".agreement" ng-model="agreement" ng-required="true">
                                    <span>I agree to the <b>terms of service</b></span>
                                </label>
                            </p>
                            <span class="helper-text agreement" ng-show="catalogForm.agreement.$invalid && catalogForm.agreement.$touched">This field is required.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l12">
                        <div class="input-field">
                            <button type="submit" class="btn waves-effect waves-light grey submit" id="upload" name="upload" ng-disabled="catalogForm.$invalid">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l12">
                        <div id="result"></div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>