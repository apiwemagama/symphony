/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

$(document).ready(function() {
    $("#btn-playback").on('click', function(){
        wavesurfer.playPause()
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
});

