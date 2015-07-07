function checkFull(radioNum){
	var count=document.getElementsByTagName("input").length;
	var num=0;
	for(var i=0;i<count;i++){
		var obj=document.getElementsByTagName("input")[i];	
		//检查text框是否填写完整
		if(obj.type=="text"){				
			if(obj.value==""){
				 obj.focus();
				 alert("当前表单不能有空项");
				 return false;
			}			  
		}
		//检查radio框是否填写完整
		if(obj.type=="radio"){
			if(obj.checked==true){
				num++;
			}
		}
	}
	if(num<radioNum){alert("当前表单不能有空项"); return false;}
}


