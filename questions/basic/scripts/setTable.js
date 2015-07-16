function setTableColor(){
	var setTable=document.getElementsByClassName("setTable");
	for(var j=0;j<setTable.length;j++){
		for(var i=0;i<setTable[j].rows.length;i++){   //rows[]数组：包含表格中所有行
			if(i%2==0){
				setTable[j].rows[i].style.backgroundColor="#CCCC66";
			}else{
				setTable[j].rows[i].style.backgroundColor="#CCCC99";
			}
		}
	}
}