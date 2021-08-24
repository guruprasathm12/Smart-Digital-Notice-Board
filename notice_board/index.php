<!DOCTYPE html>
<?php
include_once "config.php";
$que=mysqli_query($conn,"select * from time_slide");
$ts=mysqli_fetch_array($que);
$tim_slide=$ts["time_slide"];
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="jquery.min.js"></script>
<script>
var valu;
var tttt="sam";
var bgs="<?php echo $ts['bg_status']; ?>";
var bgf="<?php echo $ts['bgimg_status']; ?>";
var c=0;
var tim11=7000;
function cha1(){
	document.getElementById("file").setAttribute("name", "file");
	document.getElementById("file").removeAttribute("multiple");
	document.getElementById("sel").value="sin";
}
function cha2(){
	document.getElementById("file").setAttribute("multiple","");
	document.getElementById("file").setAttribute("name", "files[]");
	document.getElementById("sel").value="mul";
}
function cha()
{
	if(document.getElementById("mult").checked)
	{
		cha2();
	}
	else if(!document.getElementById("mult").checked)
	{
		cha1();
	}
}

function load()
{
	document.getElementById("divide").options[<?php echo $ts['divide'] ?>-1].selected=true;
	cha_back();
	if(bgs=="on")
	{
		document.getElementById("bgs").checked=true;
	}
	else if(bgs=="off"){
		document.getElementById("bgs").checked=false;
	}
	if(bgf=="on")
	{
		document.getElementById("bgf").checked=true;
	}
	else if(bgf=="off"){
		document.getElementById("bgf").checked=false;
	}
}

function bgs1()
{
	var bgm ="bgmusic";
	if(document.getElementById("bgs").checked==true)
	{
		var bg_status="on";	
	}
	else
	{
		var bg_status="off";
	}$.ajax({
				url: "process.php",
				type: "POST",
				data: {
					bgm: bgm,
					bg_status:bg_status
				}
			});
	
}
function bgf1()
{
	var bgf ="bgframe";
	if(document.getElementById("bgf").checked==true)
	{
		var bgimg_status="on";	
	}
	else
	{
		var bgimg_status="off";
	}$.ajax({
				url: "process.php",
				type: "POST",
				data: {
					bgf: bgf,
					bgimg_status:bgimg_status
				}
			});
	
}
		function cha_back(){
			if (c==0)
				{
					document.body.style.backgroundImage="url('download.png')";
					c=1;
					setTimeout("cha_back()",tim11);
					
				}
			else if (c==1)
				{
				document.body.style.backgroundImage="url('download.png')";
					c=0;
					setTimeout("cha_back()",tim11);
					
				}
		} 
		function div()
		{
			var div="divide";
			var div1=document.getElementById("divide").selectedIndex;
			var divide=document.getElementById("divide").options[div1].value;
	$.ajax({
				url: "process.php",
				type: "POST",
				data: {
					div: div,
					divide: divide
				}
			});
			
		}
		
</script>
<style>
embed
{
	border-radius: 15%;
}
.cchek{
	height: 0;
	width: 0;
	visibility: hidden;
}

.cchek1 {
	cursor: pointer;
	text-indent: -9999px;
	width: 50px;
	height: 20px;
	background: grey;
	display: block;
	border-radius: 100px;
	position: relative;
}

.cchek1:after {
	content: '';
	position: absolute;
	top: 5px;
	left: 5px;
	width: 5px;
	height: 10px;
	background: #fff;
	border-radius: 90px;
	transition: 0.3s;
}

input:checked + label {
	background: #bada55;
}

input:checked + label:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

.cchek1:active:after {
	width: 40px;
}

// centering
body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}

table,tr
{
		width: 50%;
}
	.cchek{
		height: 34px;
		width: 90px;
		background-color: rgba(251,211,2,0.86);
		border: 2px solid rgba(255,140,0,0.7);
		color: #fff;
	}
	.cchek:hover{
	height: 34px;
		width: 90px;
		background-color:#FF9933;
		border: 2px solid rgba(255,140,0,0.7);
		
		
	}
	.upload1
	{
		background-color: rgba(251,211,2,0.86);
		border: 2px solid rgba(255,140,0,0.7);
		color: #fff;
	}
	.upload1:hover{
	height: 34px;
		width: 90px;
		background-color:#FF9933;
		border: 2px solid rgba(255,140,0,0.7);
		
		
	}
	button
	{
			height: 34px;
		width: 90px;
		background-color: rgba(251,211,2,0.86);
		border: 2px solid rgba(255,140,0,0.7);
		color: #fff;
	}
		button:hover{
	height: 34px;
		width: 90px;
		background-color:#FF9933;
		border: 2px solid rgba(255,140,0,0.7);
		
		
	}
	div.sticky {
  position : sticky;
	top :0;
	z-index: 100;
}

</style>
</head>
<body onload="load()" style="background-image: url('download.png');background-repeat: no-repeat;background-position: center;background-size: cover; background-attachment: fixed;">
<div class="sticky" style="height:110px;background-color: #404040;position:sticky;top:0px;">
	<marquee direction="up" behavior="slide"><center><font size="+3" style="postion:relative;bottom:50px;" color="#ff6600"><h3 style="postion:relative;bottom:180px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DIGITAL NOTICE BOARD</h3></font></center></marquee>
<img src="logo.jpg" alt="not supported" style="position:relative;bottom:122px;" />
</div>	
<form method="post" action="save.php" enctype="multipart/form-data">
<br><br><br><br><br><br><br><br><br>
<table style="position: relative;bottom: 150px;float: left;">
<?php
$sql=mysqli_query($conn,"select * from tbl_images");
$co=0;
while($r=mysqli_fetch_array($sql)){
	$co++;
	?>
	<tr>
	<td style="color: #ff6600;text-align:center;width: 3%;border-bottom:2px solid #ff6600;"><font size="+3"><?php echo $co; ?></font></td>
	<td style="width: 1%;border-radius:15%;border-left:2px solid #ff6600;border-top:2px solid #ff6600;border-right:2px solid #ff6600;">
	<center><input type="radio" onclick="document.getElementById('tex').value='<?php echo $r['id']; ?>';document.getElementById('tex1').value='<?php echo $r['name']; ?>';document.getElementById('tex2').value='<?php echo $r['board']; ?>'" />
	</center></td>
	<td style="color: #ff6600;text-align:center;width: 5%;border-bottom:2px solid #ff6600;"><font size="+3"><?php echo $r["board"]; ?></font></td>
	<td style="width:5%;border-left:2px solid #ff6600;">
	<?php
	if($r["type"]=="tex")
	{
	?>
	<h4>
	<?php echo $r["name"]; ?>
	</h4>
	<?php	
	}
	else
	{
	?>
	<embed autostart="false" src="file/<?php echo $r["name"]; ?>" style="height:130px;width:130px;" height="341" allow="autoplay" id="oo">
	<?php
	}
	?>
	<br />
	</td></tr>
	<?php
}
?>
</table>
<center>
<font size="+3">
<center><div id="sim" style="position: relative;top: 30px;">
<span id="upplooad" class="upload1" style="height: 40px;width: 90px;position:relative;top:5px;" onclick="document.getElementById('file').click();">upload file</span>
<h1 onclick="one()"><input id="tex_che" type="checkbox" style="height:30px;width:30px;" />Text</h1>
<input style="display:none;" type="text" id="output" />
<div id="texttt" style="display:none;" >
<textarea id="text" name="text_in" ></textarea>
<img style="height:20px;width:20px;position:relative;right:30px;bottom:10px;" onclick="runSpeechRecognition()" src="mic.png" /> &nbsp; <span style="display:none;" id="action"></span>
</div>
<input style="display:none;" type="text" name="find" id="find" value="no_tex" />
<input type="file" name="file" id="file" style="color:aliceblue;display:none;" />
<?php
$board=mysqli_query($conn,"select board from board");
?>
<select name="board[]" multiple size=3>
<?php
while($b=mysqli_fetch_array($board)){
?>
<option value="<?php echo $b['board']; ?>" selected><?php echo $b["board"]; ?></option>
<?php
}
?>
</select>
<h3><br /></h3>
<select id="divide" onchange="div()" class="custom-select sources">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
</div>
<input name="sel" value="sin" id="sel" style="display:none;" />
<p style="position: relative;bottom: 100px;color:#ff6600;">Multiple Input
  <input type="checkbox" class="cchek" onclick="cha()" id="mult" /><label class="cchek1" style="position:relative;left: 25%;" for="mult"></label></p>
<input type="submit" style="position:relative;bottom:50px;" value="submit" id="upl" name="upload" />
<br /><br />
<input type="text" id="tex" name="id" style="display: none;" />
<input type="text" id="tex1" name="name" style="display: none;" />
<input type="text" id="tex2" name="board1" style="display: none;" />
</center>
	</font>
	<div style="position: relative;bottom: 25px;">
<input type="submit" value="delete" name="del" />
<input type="submit" value="delete all" name="del_all" />
<br><br>
<input style="display:none;" type="file" name="file1" id="file1">
<span style="height: 40px;width: 120px;" class="upload1" onclick="document.getElementById('file1').click();"><font size="+2">update file</font></span>
<input type="submit" value="update" name="upd" />
<br><br>
<input type="number" name="tim" value="<?php echo $tim_slide; ?>" />
<input type="submit" name="time_slide" value="update timing" />
	</div>
</form>
	</center>
	<div id="contact" align="right" style="height: 300px;width: 500px;"></div>
<script>
function one()
{
	
	if(document.getElementById('tex_che').checked==true)
	{
		document.getElementById("texttt").style.display="block";
		document.getElementById("upplooad").style.opacity=0;
		document.getElementById("file").disabled=true;
		document.getElementById("find").value="tex";
	}
	else
	{
		document.getElementById("texttt").style.display="none";
		document.getElementById("upplooad").style.opacity=1;
		document.getElementById("file").disabled=false;
		document.getElementById("find").value="no_tex";
	}
	
}
/* JS comes here */
		    function runSpeechRecognition() {
		        // get output div reference
		        var output = document.getElementById("text");
		        // get action element reference
		        var action = document.getElementById("action");
                // new speech recognition object
                var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                var recognition = new SpeechRecognition();
            
                // This runs when the speech recognition service starts
                recognition.onstart = function() {
                    action.innerHTML = "<small>listening, please speak...</small>";
                };
                
                recognition.onspeechend = function() {
                    action.innerHTML = "<small>stopped listening, hope you are done...</small>";
                    recognition.stop();
                }
              
                // This runs when the speech recognition service returns result
                recognition.onresult = function(event) {
                    var transcript = event.results[0][0].transcript;
                    var confidence = event.results[0][0].confidence;
					output.value=transcript;
                    output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
                    output.classList.remove("hide");
                };
              
                 // start recognition
                 recognition.start();
	        }
</script>
</body>
</html>