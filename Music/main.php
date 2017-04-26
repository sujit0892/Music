<?php
require_once("db.php");
echo "
<script>
function xplay(id){
parent.xplay(id);
    }
</script>";
$data=mysqli_query($con,"SELECT * FROM music");
while($row=mysqli_fetch_assoc($data))
{$name=$row['name'];
$album=$row['album'];
$rate=$row['rate'];
echo "<div  style='height:250px;width:200;box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);'><img id='".$name."' src='".$name.".jpg' height=70% width=100% 
onclick='xplay(id)' ><div style='position:relative;left:10px;font-size:12px'>name: ".$name."
</br>album : ".$album." <br> rating : ".$rate."<div></div>";
}

?>
