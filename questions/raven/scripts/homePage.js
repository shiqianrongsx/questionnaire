var max=0; 
function keeptext() { 
	max=keeptext.arguments.length; 
	for(var i=0;i<=max;i++) 
	this[i]=keeptext.arguments[i]; 
} 
mytext=new keeptext("睡眠研究问卷调查"); 
var x=0,pos=0; 
var len=mytext[0].length; 
function typetext() { 
	var mytt=document.getElementById("typefield"); 
	mytt.value=mytext[x].substring(0,pos)+"_"; 
	if(pos++==1) 
	{ 
		setTimeout("typetext()",200); 
		if(++x==max) x=0; 
		len=mytext[x].length; 
	} 
	else setTimeout("typetext()",100); 
	setTimeout("displayButton()",1300);
} 
//显示按钮
function displayButton(){ 
	button.style.display="block";
}
