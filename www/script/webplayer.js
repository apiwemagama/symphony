/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
//    window.addEventListener("click", play());

//    function play(){
        var wavesurfer = WaveSurfer.create({
            backgroundColor: '#f5f5f5',
            container: '#waveform',
            cursorWidth: 0,
            hideScrollbar: true,
            mediaType:'audio',
            waveColor: '#9e9e9e',
            progressColor: '#ff9800',
            fillParent: true, 
            barWidth: 3,
            height: 80,
            responsive: true
        });
        var cue;
        
        $(document).on("click",".btn-play", function(){
            wavesurfer.loaded = false;
            wavesurfer.song = $(this).attr("data-track");
            wavesurfer.artwork = $(this).attr("data-artwork");
            wavesurfer.title = $(this).attr("data-title");
            wavesurfer.musician = $(this).attr("data-musician");
            wavesurfer.version = $(this).attr("data-version");
            wavesurfer.release = $(this).attr("data-release");
            wavesurfer.genre = $(this).attr("data-genre");
            
            if(sessionStorage.getItem("session") !== null){
               

                wavesurfer.load(wavesurfer.song);

                cue = $(this).closest('tr').index();
                
                wavesurfer.on('ready', function (){
                    if(!wavesurfer.loaded) {
                        //wavesurfer.loaded = true;

                        //$("btn-playback").html("<i class='fa fa-pause grey-text'></i>");

                        $("#lg-artwork").attr("src",wavesurfer.artwork);
                        $("#lg-title").html(wavesurfer.title);
                        $("#lg-musician").html(wavesurfer.musician);
                        $("#lg-version").html(wavesurfer.version);
                        $("#lg-release").html(" &#183; "+formatDate(wavesurfer.release));
                        $("#lg-genre").html(" &#183; "+wavesurfer.genre);
                        $("#lg-duration").html(" &#183; "+formatDuration(wavesurfer.getDuration()));

                        $("#sm-title").html(wavesurfer.title);
                        $("#sm-musician").html(" &#183; "+wavesurfer.musician);

                        $("#btn-playback").html("<i class='fa fa-play grey-text'></i></i>");
                        //$(".responsive-table #btn-play:eq("+cue+")").html("<i class='fa fa-play grey-text'></i>");

                        wavesurfer.play();
                    }
                });
                $("#btn-playback").on('click', function(){
                    wavesurfer.playPause();
                });
                $("#btn-mute").on('click', function(){
                    if(wavesurfer.isMuted)
                    {
                        wavesurfer.setMute(false);
                        $("#btn-mute").html("<i class='fa fa-volume-up grey-text'></i>");
                    }
                    else
                    {
                        wavesurfer.setMute(true);
                        $("#btn-mute").html("<i class='fa fa-volume-off grey-text'></i>");
                    }
                });
                wavesurfer.on("loading", function () {
                    if(!wavesurfer.loaded) {

                        $("#btn-playback").html("<i class='fas fa-circle-notch fa-spin grey-text'></i></i>");
                        //$(".card-shopping #btn-play .center-block:eq("+cue+")").html("<i class='fas fa-circle-notch fa-spin grey-text'></i>");
                        $(".responsive-table #btn-play:eq("+cue+")").html("<i class='fas fa-circle-notch fa-spin grey-text'></i>");
                    }
                });
                wavesurfer.on("play", function () {
                    $("#btn-playback").html("<i class='fa fa-pause grey-text'></i>");
                    $(".responsive-table #btn-play:eq("+cue+")").html("<i class='fas fa-spinner fa-pulse orange-text'></i>");
                    //$(".responsive-table tbody tr:eq("+cue+")").css({"background-color":"#ffa726","color":"green"});
                });
                wavesurfer.on("pause", function () {
                    $("#btn-playback").html("<i class='fa fa-play grey-text'></i>");
                    $(".responsive-table #btn-play:eq("+cue+")").html("<i class='fa fa-play grey-text'></i>");
                    //$(".responsive-table tbody tr:eq("+cue+")").css({"background-color":"#ffffff","color":"green"});
                });
                wavesurfer.on('audioprocess', function() {
                    if(wavesurfer.isPlaying()) {
                        $("#lg-remaining").html(" &#183; "+formatCurrentTime(wavesurfer.getCurrentTime()));
                    }
                });
            }
            else
            {
                $.viewport = $(window).width();
                
                if($.viewport > 600)
                {
                    $("#session-modal-artwork").attr("src",wavesurfer.artwork);
                    $('.modal.stream.default').modal('open');
                }
                else
                {
                    $("#session-modal-bottom-sheet-artwork").attr("src",wavesurfer.artwork);
                    $('.modal.stream.bottom-sheet').modal('open');
                }
            }
        });
        
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.toLocaleString('default', {month: 'long'}))+',',
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join(' ');
        }
        function formatCurrentTime(currentTime) {
            currentTime = Math.floor(currentTime);
            var hours = Math.floor(currentTime / 3600);
            var minutes = Math.floor((currentTime - (hours * 3600)) / 60);
            var seconds = currentTime - (hours * 3600) - (minutes * 60);

            hours = hours < 10 ? '' + hours : hours;
            minutes = minutes < 10 ? '' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            return minutes + ':' + seconds;
        }
        function formatDuration(duration) {
            var minutes = Math.floor(duration / 60);
            var seconds = Math.floor(duration - minutes * 60);

            return minutes+":"+seconds;
        }
//    }
});