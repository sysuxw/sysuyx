function getHTTPObject() {
	if (typeof XMLHttpRequest == 'undefined') {
		XMLHttpRequest = function() {
			try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); }
				catch(e) {}
			try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); }
				catch(e) {}
			try { return new ActiveXObject("Msxml2.XMLHTTP"); }
				catch(e) {}
			return false;
		}
	}
	return new XMLHttpRequest();
}


function checkName() {
	var request = getHTTPObject();	//不能是 global ，否则与 checkEmail() 相互影响
	var name = document.getElementById('name');
	var para = document.getElementById('p_name');
	if (name.value == '')	return false;
	if (request) {
		request.open("GET", "checkName.php?name=" + name.value, true);	//调用js的目录为基准
		request.onreadystatechange = function() {	//写函数名时不加(),否则就执行了
			if (request.readyState == 4) {
				var feedback = document.createElement('span');	// 	反馈的检查信息
				feedback.innerHTML = request.responseText;
				removeAndAdd(para, feedback);
			} else {
				// loding
				var loading = document.createElement('img');
				loading.src = '../img/ajax-loader.gif';
				removeAndAdd(para, loading);
			}
		};
		request.send(null);
	} else {
		alert("很抱歉，您的浏览器不支持XMLHttpRequest.");
	}
}
function checkEmail() {
	var request = getHTTPObject();
	var email = document.getElementById('email');
	var para = document.getElementById('p_email');
	if (email.value == '') return false;
	if (request) {
		request.open("GET", "checkEmail.php?email=" + email.value, true);
		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				var feedback = document.createElement('span');
				feedback.innerHTML = request.responseText;
				removeAndAdd(para, feedback);
			} else {
				// loding
				var loading = document.createElement('img');
				loading.src = '../img/ajax-loader.gif';
				removeAndAdd(para, loading);
			}
		};
		request.send(null);
	} else {
		alert("很抱歉，您的浏览器不支持XMLHttpRequest.");
	}
}

// 插入新的节点元素
function insertAfter(newElement, targetElement) {
	var parent = targetElement.parentNode;
	if (targetElement == parent.lastChild) {
		parent.appendChild(newElement);
	} else {
		parent.insertBefore(newElement, targetElement.nextSibling);
	}
}

// 移除上一次检测增加的检查信息，并添加新的
function removeAndAdd(beforeRemoveItem, addItem) {
	if (beforeRemoveItem.nextSibling) {
		beforeRemoveItem.parentNode.removeChild(beforeRemoveItem.nextSibling);
	}
	insertAfter(addItem, beforeRemoveItem);
}