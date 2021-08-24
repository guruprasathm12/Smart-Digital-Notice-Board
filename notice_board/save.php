<html>
<head>
<script>
function load()
{
	setTimeout(function(){ location.href="index.php";	},3000);
}
</script>
<style>

body{
  font-family: 'Big Shoulders Stencil Text', cursive;
}
.loading{
  width: 150px;
  height: 150px;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}
.loading::after,
.loading::before{
  content: "";
  border-radius: 50%;
  position: absolute;
  transform: translate(0,-50%);
  top: 50%;
  animation: rotate-scale-up 2.5s infinite linear both;
  background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='200' ry='200' stroke='%2330DACDFF' stroke-width='10' stroke-dasharray='15%2c 15%2c 1' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
}

.loading::after{
  width: 100%;
  height: 100%;
  left: 25%;
  transform-origin: 75% 50%;
}
.loading::before{
  width: 75%;
  height: 75%;
  left: 75%;
  transform-origin: 0 50%;
  animation-direction: reverse;
}
.loading span{
  position: absolute;
  top: 150%;
  left: 50%;
  transform: translate(-50%,-50%);
  letter-spacing: 20px;
  font-size: 2em;
  cursor: default;
  background: linear-gradient(90deg, rgba(33,33,33,1) 0%, rgba(33,33,33,1) 35%, rgba(247,247,247,1) 35%, rgba(247,247,247,1) 40%, rgba(33,33,33,1) 40%, rgba(33,33,33,1) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: gradiantShift 3s infinite cubic-bezier(0,.33,1,.69);
  background-size: 400% 400%;
}

@keyframes gradiantShift {  
  0% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0 50%;
  }
}
@-webkit-keyframes rotate-scale-up {
  0% {
    -webkit-transform: translate(-50%,-50%) rotateZ(0);
    transform: translate(-50%,-50%) rotateZ(0);
  }
  50% {
    -webkit-transform: translate(-50%,-50%) rotateZ(180deg);
    transform: translate(-50%,-50%) rotateZ(180deg);
  }
  100% {
    -webkit-transform: translate(-50%,-50%) rotateZ(360deg);
            transform: translate(-50%,-50%) rotateZ(360deg);
  }
}
@keyframes rotate-scale-up {
  0% {
    -webkit-transform: translate(-50%,-50%) rotateZ(0);
            transform: translate(-50%,-50%) rotateZ(0);
  }
  50% {
    -webkit-transform: translate(-50%,-50%) rotateZ(180deg);
            transform: translate(-50%,-50%) rotateZ(180deg);
  }
  100% {
    -webkit-transform: translate(-50%,-50%) rotateZ(360deg);
            transform: translate(-50%,-50%) rotateZ(360deg);
  }
}
</style>
</head>
<body onload="load()">
<?php 
include_once "config.php";
include_once "getID3-master/getID3-master/getid3/getid3.php";
	if($_POST['bgm']=="bgmusic"){
	$bgtime=$_POST['bgtime'];
	$board=$_POST["board"];
	$sql = "update time_slide set bgtime='$bgtime' where board='$board'";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	}

$sql=mysqli_query($conn,"select id from tbl_images");
$tot=mysqli_num_rows($sql);


if(isset($_POST["upload"])){
$type="null";
if($_POST["sel"]=="sin"){
	
        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];  
		list($width, $height, $type, $attr) = getimagesize($name);
		if($width>$height)
		{
			$size="l";
		}
		elseif($width<$height)
		{
			$size="p";
		}
		elseif($width==$height)
		{
			$size="s";
		}
            $location = 'file/'.$name;      
			echo $name;
			$ext=strtolower(end(explode('.',$name)));
			if($ext=="jpg" or $ext=="png")
			{
				$type="img";
			}
			elseif($ext=="mp4" or $ext=="ogg" or $ext=="webm")
			{
				$type="vid";		
		}
			elseif($ext=="mp3")
			{
				$type="aud";
				$size="m";		
		}
		$typ=$type;
		if($_POST["find"]=="tex")
{
foreach($_POST["board"] as $board){	
echo "<br>".$board." ".$id."<br>";	
$sql=mysqli_query($conn,"select id from tbl_images where board='$board'");
$tot=mysqli_num_rows($sql);
		if($tot==0)
{
	$id=1;
}else
{
	$i=mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `tbl_images` WHERE id=(select max(id) from tbl_images where board='$board') and board='$board' limit 1"));
	echo "<br><br>max of id".$i["id"]."<br><br>";
	$id=$i["id"]+1;
}
	
	$name=$_POST["text_in"];
	$as=mysqli_query($conn,"insert into tbl_images(id,name,type,size,board,dur) values('$id','$name','tex','l','$board','5')");
		
}
}
            if(move_uploaded_file($temp_name,$location)){
                echo 'File uploaded successfully<br>';
				$obj=$location.$name;

	echo "<br><br>board: ".$board."<br><br>";
		foreach($_POST["board"] as $board){	
echo "<br>".$board." ".$id."<br>";	
$sql=mysqli_query($conn,"select id from tbl_images where board='$board'");
$tot=mysqli_num_rows($sql);
		if($tot==0)
{
	$id=1;
}else
{
	$i=mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `tbl_images` WHERE id=(select max(id) from tbl_images where board='$board') and board='$board' limit 1"));
	echo "<br><br>max of id".$i["id"]."<br><br>";
	$id=$i["id"]+1;
}


		$as=mysqli_query($conn,"insert into tbl_images(id,name,type,size,board) values('$id','$name','$typ','l','$board')");
		echo "<br>".$name."<br>";
if($as){
	echo "inserted successfully";
	mysqli_query($conn,"update tbl_images set dur=5 where id=$id and board='$board'");
	if($type="vid" || $type="aud")
	{
		$getID3 = new getID3;
		$video_file = $getID3->analyze("file/".$name);
		$duration_seconds = $video_file['playtime_seconds'];
		echo "playtime seconds ".$duration_seconds;
		mysqli_query($conn,"update tbl_images set dur=$duration_seconds where id=$id and board='$board'");
	}
	
}
else{
	echo "not inserted successfully";
}
		}		}
	  
	  else{
		  echo "file uploaded failed";
}
}

elseif($_POST["sel"]=="mul"){
	  foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
              
            $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
            $file_name = $_FILES['files']['name'][$key]; 
            $file_size = $_FILES['files']['size'][$key]; 
            $ext = strtolower(end(explode('.',$file_name)));
list($width, $height, $type, $attr) = getimagesize($name);
		if($width>$height)
		{
			$size="l";
		}
		elseif($width<$height)
		{
			$size="p";
		}
		elseif($width==$height)
		{
			$size="s";
		}		
		
  
            // Set upload file path 
            $filepath = 'file/'.$file_name; 
  
            // Check file type is allowed or not 
         
  
                // Verify file size - 2MB max  
             
  
                // If file with name already exist then append time in 
                // front of name of the file to avoid overwriting of file 
              
                
                  
                    if( move_uploaded_file($file_tmpname, $filepath)) { 
					foreach($_POST["board"] as $board){	
					$sql=mysqli_query($conn,"select id from tbl_images where board='$board'");
$tot=mysqli_num_rows($sql);
		if($tot==0)
{
	$id=1;
}else
{
	$i=mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `tbl_images` WHERE id=(select max(id) from tbl_images where board='$board') and board='$board' limit 1"));
	echo "<br><br>max of id".$i["id"]."<br><br>";
	$id=$i["id"]+1;
}
if($ext=="jpg" or $ext=="png")
			{
				$type="img";
			}
			elseif($ext=="mp4" or $ext=="ogg" or $ext=="webm")
			{
				$type="vid";
			}
			elseif($ext=="mp3")
			{
				$type="aud";
				$size="m";
		}
		else
		{
			$type="null";
		}
					mysqli_query($conn,"insert into tbl_images(id,name,type,size,board) values('$id','$file_name','$type','l','$board')");
					mysqli_query($conn,"update tbl_images set dur=5 where id=$id and board='$board'");
	if($type="vid" || $type="aud")
	{
		$getID3 = new getID3;
		$video_file = $getID3->analyze("file/".$file_name);
		$duration_seconds = $video_file['playtime_seconds'];
		echo "playtime seconds ".$duration_seconds;
		mysqli_query($conn,"update tbl_images set dur=$duration_seconds where id=$id and board='$board'");
	}
					}
						echo "{$file_name} successfully uploaded <br />"; 
						$id=$id+1;
                    } 
                    else {                      
                        echo "Error uploading {$file_name} <br />";  
                    } 
                
            

        } 
}
}else if(isset($_POST["del"]))
{
	echo $_POST["board1"];
	if(mysqli_query($conn,"delete from tbl_images where id='".$_POST["id"]."' and board='".$_POST["board1"]."'")){
		if(mysqli_num_rows(mysqli_query($conn,"select id from tbl_images where name='".$_POST["name"]."'"))==0){
		unlink("file/".$_POST["name"]);	
		}
		echo "deleted successfully";
		$s_id=$_POST["id"];
		$id=$s_id+1;
		while($s_id<$tot)
		{
			$id=$s_id+1;
			mysqli_query($conn,"update tbl_images set id='$s_id' where id='$id' and board='".$_POST["board1"]."'");
			$s_id=$s_id+1;
	}
	}
	else
	{
		echo "deleted unsuccessfully";
	}
}else if(isset($_POST["del_all"]))
{
	$sql_q=mysqli_query($conn,"select * from tbl_images");
	while($r=mysqli_fetch_array($sql_q)){
	if(mysqli_query($conn,"delete from tbl_images where id='".$r["id"]."'")){
		unlink("file/".$r["name"]);
		echo "deleted successfully";
	}
	else
	{
		echo "deleted unsuccessfully";
	}}
}else if(isset($_POST["upd"]))
{
	$type="null";
        $name       = $_FILES['file1']['name'];  
        $temp_name  = $_FILES['file1']['tmp_name'];  
            $location = 'file/'.$name;      
			echo $name;
			$ext=end(explode('.',$name));
			if($ext=="jpg" or $ext=="png")
			{
				$type="img";
			}
			elseif($ext=="mp4" or $ext=="ogg" or $ext=="webm")
			{
				$type="vid";
			}
			elseif($ext=="mp3")
			{
				$type="aud";
			}
            if(move_uploaded_file($temp_name,$location)){
                echo 'File uploaded successfully<br>';
				$obj=$location.$name;
				mysqli_query($conn,"update tbl_images set name='$name',type='$type' where id='".$_POST['id']."' and board='".$_POST["board1"]."'");
mysqli_query($conn,"update tbl_images set dur=5 where id='".$_POST['id']."' and board='".$_POST["board1"]."'");
	if($type="vid" || $type="aud")
	{
		$getID3 = new getID3;
		$video_file = $getID3->analyze("file/".$name);
		$duration_seconds = $video_file['playtime_seconds'];
		echo "playtime seconds ".$duration_seconds;
		mysqli_query($conn,"update tbl_images set dur=$duration_seconds where id=".$_POST['id']."");
	}
unlink("file/".$_POST["name"]);	 
	 }
	  else{
		  echo "file uploaded failed";
	  }
}else if(isset($_POST["time_slide"]))
{
	if(mysqli_query($conn,"update time_slide set time_slide='".$_POST['tim']."' where 1")){}
}

?>
<div class="loading">
  <span>loading</span>
</div>
</body>
</html>