var tot=2;
var i=0;
var ty;
var tim=2000;
	function doHide(){
		var t=arguments[0];
		alert("five inside fun argument:"+t);
		document.getElementById(t).style.display = "none" ;
	if(t!=tot){
		alert("six repeating fun");
	img();
		}
		else
		{
			alert("completed");
		}
	}
function img()
{
	alert("inside the fun before one");
	i++;
	alert("one:"+i);
	ty=document.getElementById("q"+i).innerHTML;
	alert("two:"+ty);
	if(ty=="img")
	{
		tim=5000;// 5 seconds
		alert("three inside img:"+tim);
	}
	elseif(ty=="vid" or ty=="aud")
	{
		tim=document.getElementById(i).duration;
		alert("three inside med:"+tim);
		document.getElementById(i).play();
	}
	alert("four");
		setTimeout( "doHide(1)", 5000 ) ;
}
function med()
{
	alert("working");
}