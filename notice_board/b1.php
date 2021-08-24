<?php
include_once "config.php";
$sql=mysqli_query($conn,"select * from time_slide where board='b1'");
$r=mysqli_fetch_array($sql);
$id=$r["id"];
$div=$r["divide"];
$l[]=0;
function dis_name($id)
{
	include "config.php";
	$que=mysqli_query($conn,"select * from tbl_images where board='b1' and id=$id");
	$r1=mysqli_fetch_array($que);
	return $r1["name"];
}
function dis_dur($id)
{
	include "config.php";
	$que=mysqli_query($conn,"select * from tbl_images where board='b1' and id=$id");
	$r1=mysqli_fetch_array($que);
	return $r1["dur"];
}
function dis_type($id)
{
	include "config.php";
	$que=mysqli_query($conn,"select * from tbl_images where board='b1' and id=$id");
	$r1=mysqli_fetch_array($que);
	return $r1["type"];
}
function dis_check($id)
{
	include "config.php";
	$que=mysqli_query($conn,"select * from tbl_images where board='b1' and id=$id");
	$r1=mysqli_num_rows($que);
	return $r1;
}
?>
<html>
<head>
<style>
table {
	border: 1px solid #000;
  table-layout: auto;
  width:85%;
        height:100%;
}
img
{
	height: auto;
}
video
{
	 width: 100%;
  max-width: 80%;
}
td
{
	border: 1px solid #000;
}
</style>
</head>
<body>
<center>
<table cellspacing="0">
<?php
if($div==1)
{
	echo "id is ".$id;
	?>
	<tr>
	<?php
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='1' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='1' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_1" style="display:none;"><?php echo $dur; ?></p><p id="ty_1" style="display:none;"><?php echo $ty; ?></p></center></td>
	</tr>
	<?php
}
elseif($div==2)
{
	?>
	<tr>
	<?php
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='1' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='1' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_1" style="display:none;"><?php echo $dur; ?></p><p id="ty_1" style="display:none;"><?php echo $ty; ?></p></center></td>
	<?php
	$id=$id+1;
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='2' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='2' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_2" style="display:none;"><?php echo $dur; ?></p><p id="ty_2" style="display:none;"><?php echo $ty; ?></p></center></td>
	</tr>
	<?php
}
elseif($div==3)
{
	?>
	<tr>
	<?php
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='1' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='1' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_1" style="display:none;"><?php echo $dur; ?></p><p id="ty_1" style="display:none;"><?php echo $ty; ?></p></center></td>
	<?php
	$id=$id+1;
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='2' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='2' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_2" style="display:none;"><?php echo $dur; ?></p><p id="ty_2" style="display:none;"><?php echo $ty; ?></p></center></td>
	
	<?php
	$id=$id+1;
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='3' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='3' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_3" style="display:none;"><?php echo $dur; ?></p><p id="ty_3" style="display:none;"><?php echo $ty; ?></p></center></td>
	
	</tr>
	<?php
}
elseif($div==4)
{
	?>
	<tr>
	<?php
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='1' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='1' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_1" style="display:none;"><?php echo $dur; ?></p><p id="ty_1" style="display:none;"><?php echo $ty; ?></p></center></td>
	<?php
	$id=$id+1;
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='2' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='2' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_2" style="display:none;"><?php echo $dur; ?></p><p id="ty_2" style="display:none;"><?php echo $ty; ?></p></center></td>
	
	</tr>
	<tr>
	<?php
	$id=$id+1;
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='3' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='3' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_3" style="display:none;"><?php echo $dur; ?></p><p id="ty_3" style="display:none;"><?php echo $ty; ?></p></center></td>
	<?php
	$id=$id+1;
	$ty=dis_type($id);
	$name=dis_name($id);
	$dur=dis_dur($id);
	$l[]=$dur;
	if($ty=="img")
	{
		$val="<img id='4' src='file/".$name."' width='100%' />";
	}
	elseif($ty=="vid")
	{
		$val="<video id='4' controls> <source src='file/".$name."' type='video/mp4'></video>";
	}
	elseif($ty=="tex")
	{
		$val="<h3>$name</h3>";
	}
	else
	{
		$val=" ";
		$id=$id-1;
	}
	?>
	<td><center><?php echo $val; ?><p id="dur_4" style="display:none;"><?php echo $dur; ?></p><p id="ty_4" style="display:none;"><?php echo $ty; ?></p></center></td>
	
	</tr>
	<?php
}
$idd=$id;
?>
</table>
</center>
<?php
$aa=mysqli_query($conn,"select * from tbl_images where board='b1'");
$a1=mysqli_num_rows($aa);

if(intval($idd)==intval($a1))
{
	mysqli_query($conn,"update time_slide set id=1 where board='b1'");
}
else
{
	$idd=$idd+1;
	mysqli_query($conn,"update time_slide set id=$idd where board='b1'");
}
rsort($l);
?>
<button style="display:none;" id="butt" onclick="fun()">click here</button>
<script>
function fun()
{
	var div=<?php echo $div ?>;
	var dur=5;
	dur=<?php echo $l[0]; ?>;
	var i=0;
	
	while(i<div)
	{
		i=i+1;
		if(document.getElementById("ty_"+i).innerHTML=="vid")
		{
			document.getElementById(i).load();
			document.getElementById(i).onloadstart = function() 
			{
			
			}		
			document.getElementById(i).currentTime=2;
		document.getElementById(i).play();	
		}
	}
	setTimeout("location.href='b1.php'",dur+"000");
}
document.getElementById("butt").click();
</script>
</body>
</html>