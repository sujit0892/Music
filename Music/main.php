<?php
require_once("db.php");
echo "
<script>
function xplay(id){
parent.xplay(id);
    }
</script>";
$i=200;
$data=mysqli_query($con,"SELECT * FROM music");
while($row=mysqli_fetch_assoc($data))
{
echo "<div  style='position:relative;float:left;margin-left:20px;margin-top:20px;height:250px;width:200px;box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);'><img id='".$row['id']."' src='pic/".$row['album'].".jpg' height=70% width=100% onclick='xplay(id)' ><a href='#' style='position:relative;left:10px;font-size:12px;text-decoration:none;color:black'>name: ".$row['name']."
</br>album : ".$row['album']." <br> rating : ".$row['rate']."</a></div>";

}

?>
