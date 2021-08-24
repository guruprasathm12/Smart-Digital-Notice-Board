<?php
include_once "config.php";

if($_POST["sam"]=="sam")
{
	mysqli_query($conn,"update time_slide set bg_status='sam' where1");
}
if($_POST['bgm']=="bgmusic"){
	$bg_status=$_POST['bg_status'];
	$sql = "update time_slide set bg_status='$bg_status' where 1";
	mysqli_query($conn, $sql);
	}
	elseif($_POST['bgf']=="bgframe"){
	$bgimg_status=$_POST['bgimg_status'];
	$sql = "update time_slide set bgimg_status='$bgimg_status' where 1";
	mysqli_query($conn, $sql);
	}
	if($_POST["div"]=="divide")
	{
		mysqli_query($conn,"update time_slide set divide='".$_POST['divide']."' where 1");
	}
?>