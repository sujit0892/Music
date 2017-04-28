<?php
require_once('db.php');
?>
<head>
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'></head>
<script>

var i=0;var j;var c=0;
var queue=[1];
var activeSong;
var seekBar = document.getElementById('seek-bar');
function xplay(id){
idx=id;
document.getElementById('play').innerHTML='pause';
activeSong=document.getElementById('a');
activeSong.src="music/"+id+".mp3";
activeSong.play();
i=1;
}
function queue1(id)
{idy=id;
queue.push(idy);
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
function for1(){
j=linearsearch(idx);
xplay(queue[j+1]);
}
function rew1(){
j=linearsearch(idx);
if(j==1)
{
j=queue.length-1;
xplay(queue[j]);
}
if(j==0)
{j=queue.length-2;
xplay(queue[j]);
}
else
xplay(queue[j-1]);
}
function inc(){
document.getElementById("search").style.width="50%";
}
function dec(){
document.getElementById("search").style.width="200px";
}

function updateTextInput(val) {
         activeSong.currentTime=(val*activeSong.duration)/100;
        }
function updateTime(){
    var currentSeconds = (Math.floor(activeSong.currentTime % 60) < 10 ? '0' : '') + Math.floor(activeSong.currentTime % 60);
    var currentMinutes = Math.floor(activeSong.currentTime / 60);
    document.getElementById('x').innerHTML = currentMinutes + ':' + currentSeconds + ' / ' + Math.floor(activeSong.duration / 60) + ':' + (Math.floor(activeSong.duration % 60) < 10 ? '0' : '') + Math.floor(activeSong.duration % 60);
    document.getElementById('seek-bar').value=(activeSong.currentTime/activeSong.duration)*100;
if(activeSong.currentTime==activeSong.duration)
{var j=linearsearch(idx);

xplay(queue[j+1]);
}

}
function setVolume(volume) {
   activeSong.volume = volume;
}
function mute(){
    if(c==0){
    activeSong.volume=0;
    document.getElementById("mute").innerHTML="volume_off";
    c=1;}
    else{
    activeSong.volume=document.getElementById("rngVolume").value;
    document.getElementById("mute").innerHTML="volume_up";
    c=0;}
}
   

function search(event){
if(event.keyCode=="13")
{
document.getElementById('frame').src = "search.php?msg="+document.getElementById('search').value;
}
}
function linearsearch(id)
{var j;
for(j=1;j<queue.length;j++)
{if(queue[j]==idx)
{break;
}
}
if(j==(queue.length-1))
{j=0;
}
return j;
}
function home(){
document.getElementById('frame').src ="main.php";
}
</script>
<div style='width:100%;height:15%;background-color:#0066ff'><span style='position:fixed;left:20px;font-size:40px;color:white;top:30px;font-family:monospace'><a  style="cursor:pointer" onclick="home();"><b>Music<b></a></span>
<input id="search" list="song"  placeholder='search' style='position:fixed;top:45px;right:50px;background-color:white;border-radius:20px' onfocus="inc();" onfocusout="dec();" onkeydown="search(event);">
<?php
echo "<datalist id='song'>";
$data=mysqli_query($con,"SELECT * FROM music");
while($row=mysqli_fetch_assoc($data))
{echo "<option value='".$row['name']."'>";
}
while($row=mysqli_fetch_assoc($data))
{echo "<option value='".$row['album']."'>";
}
?>
</div>
<iframe id="frame" src='main.php' frameborder='0' width='100%' height='70%'></iframe>

<div style='width:100%;height:15%;background-color:#DCDCDC'>
<center></center>
<br><br>
<a href='#' style='text-decoration:none;color:black;font-size:30px' onclick='rew1();'>
<i class='material-icons' style='font-size:30px'>skip_previous</i></a>
<a onclick="play()" style='cursor:pointer;'  >
<i class='material-icons' style='font-size:30px' id='play'>play_arrow</i></a>
<a href='#' style='text-decoration:none;color:black'><i class='material-icons' style='font-size:30px' onclick='for1();'>skip_next</i></a>
<input type='range' id='seek-bar' value='0'  onchange='updateTextInput(this.value);' style='width:50%;background-color:#DCDCDC'>
<span id=x></span>
<a onclick="mute()" style='cursor:pointer;'  >
<i class='material-icons' style='font-size:30px' id="mute">volume_up</i></a>
    <input type='range' onchange='setVolume(this.value)' id='rngVolume' min='0' max='1' step='0.01' value='1' style='width:10%;background-color:#DCDCDC'>
</div> <audio id='a' ontimeupdate='updateTime()'  ></audio>


