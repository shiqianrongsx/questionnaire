function emailCheck(obj, labelName) {
	var objName = eval("document.all."+obj);
	var pattern = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	if (!pattern.test(objName.value)) {
		alert("��������ȷ�������ַ��");
		objName.focus();
		return false;
	}
	return true;
}



 
