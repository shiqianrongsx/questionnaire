function emailCheck(obj, labelName) {
	var objName = eval("document.all."+obj);
	var pattern = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	if (!pattern.test(objName.value)) {
		alert("请输入正确的邮箱地址。");
		objName.focus();
		return false;
	}
	return true;
}



 
