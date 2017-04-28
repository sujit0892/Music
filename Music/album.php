<?php
require_once("db.php");
echo "
<head>
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
<script>
function xplay(id){
parent.xplay(id);
parent.queue1(id);
    }
function queue(id)
{parent.queue1(id);
}
</script></head>";
$data=mysqli_query($con,"SELECT * FROM music WHERE album LIKE '".$_GET['msg']."'");
$row=mysqli_num_rows($data);
while($row=mysqli_fetch_assoc($data))
{
echo "<div  style='position:relative;float:left;margin-left:20px;margin-top:20px;height:250px;width:200px;box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);'><img id='".$row['id']."' src='pic/".$row['album'].".jpg' height=70% width=100% onclick='xplay(id)' ><a href='#' style='position:relative;left:10px;font-size:12px;text-decoration:none;color:black'>name: ".$row['name']."
</br>album : ".$row['album']." <br> rating : ".$row['rate']."</a>
<a id='".$row['id']."' onclick='queue(id)' style='cursor:pointer;position:absolute;right:0px;bottom:0px;'><i class='material-icons'>queue</i></a></div>";
}

?>
