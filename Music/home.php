<?php
require_once('db.php');
?>
<head>
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'></head>
<script>

var i=0;
var activeSong;
var seekBar = document.getElementById('seek-bar');
function xplay(id){
document.getElementById('play').innerHTML='pause';
activeSong=document.getElementById('a');
activeSong.src="music/"+id+".mp3";
activeSong.play();
i=1;
}
function play(){
if(i==1)
{activeSong.pause();
document.getElementById('play').innerHTML='play_arrow';
i=0;
}
else
{activeSong.play();
document.getElementById('play').innerHTML='pause';
}
}


function updateTextInput(val) {
         activeSong.currentTime=(val*activeSong.duration)/100;
        }
function updateTime(){
    var currentSeconds = (Math.floor(activeSong.currentTime % 60) < 10 ? '0' : '') + Math.floor(activeSong.currentTime % 60);
    var currentMinutes = Math.floor(activeSong.currentTime / 60);
    document.getElementById('x').innerHTML = currentMinutes + ':' + currentSeconds + ' / ' + Math.floor(activeSong.duration / 60) + ':' + (Math.floor(activeSong.duration % 60) < 10 ? '0' : '') + Math.floor(activeSong.duration % 60);
    document.getElementById('seek-bar').value=(activeSong.currentTime/activeSong.duration)*100;

}
function setVolume(volume) {
   activeSong.volume = volume;
}
</script>
<div style='width:100%;height:15%;background-color:#0066ff'><span style='position:fixed;left:20px;font-size:40px;color:white;top:30px;font-family:monospace'><b>Music<b></span>
<input type=text  placeholder='search' style='position:fixed;top:45px;right:50px;background-color:white;border-radius:20px'></div>
<iframe src='main.php' frameborder='0' width='100%' height='70%'></iframe>

<div style='width:100%;height:15%;background-color:#DCDCDC'>
<center></center>
<br><br>
<a href='#' style='text-decoration:none;color:black;font-size:30px'>
<i class='material-icons' style='font-size:30px'>skip_previous</i></a>
<a onclick="play()" style='cursor:pointer;'  >
<i class='material-icons' style='font-size:30px' id='play'>play_arrow</i></a>
<a href='#' style='text-decoration:none;color:black'><i class='material-icons' style='font-size:30px'>skip_next</i></a>
<input type='range' id='seek-bar' value='0'  onchange='updateTextInput(this.value);' style='width:50%;background-color:#DCDCDC'>
<span id=x></span>
<i class='material-icons' style='font-size:30px'>volume_up</i>
    <input type='range' onchange='setVolume(this.value)' id='rngVolume' min='0' max='1' step='0.01' value='1' style='width:10%;background-color:#DCDCDC'>
</div> <audio id='a' ontimeupdate='updateTime()'  ></audio>

