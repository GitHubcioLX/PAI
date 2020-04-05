function isWhiteSpaceOrEmpty(str) {
	return /^[\s\t\r\n]*$/.test(str);
}

function isEmailInvalid(str) {
	let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
	return !email.test(str);
}

function checkStringAndFocus(obj, msg, fun) {
	let str = obj.value;
	let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
	if (fun(str)) {
		document.getElementById(errorFieldName).innerHTML = msg;
		obj.focus();
		return false;
	} else {
		document.getElementById(errorFieldName).innerHTML = "";
		return true;
	}
}

function validate(formularz) {
	let fields = ["f_imie", "f_nazwisko", "f_email", "f_kod", "f_ulica", "f_miasto"];
	let alerts = ["Podaj imię!", "Podaj nazwisko!", "Podaj poprawny adres e-mail!", "Podaj kod pocztowy!", "Podaj nazwę ulicy!", "Podaj nazwę miasta!"];
		
	for(let i=0; i<fields.length; i++) {
		if(fields[i] == "f_email") {
			if(!checkStringAndFocus(formularz.elements["f_email"], alerts[i], isEmailInvalid)) return false;
		} else if(!checkStringAndFocus(formularz.elements[fields[i]], alerts[i], isWhiteSpaceOrEmpty)) return false;
	}
	
	return true;
}

function showElement(e) {
	document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e) {
	document.getElementById(e).style.visibility = 'hidden';
}

function alterRows(i, e) {
	if (e) {
		if (i % 2 == 1) {
			e.setAttribute("style", "background-color: Aqua;");
		}
		e = e.nextSibling;
		while (e && e.nodeType != 1) {
			e = e.nextSibling;
		}
		alterRows(++i, e);
	}
}

function nextNode(e) {
	while (e && e.nodeType != 1) {
		e = e.nextSibling;
	}
	return e;
}

function prevNode(e) {
	while (e && e.nodeType != 1) {
		e = e.previousSibling;
	}
	return e;
}

function swapRows(b) {
	let tab = prevNode(b.previousSibling);
	let tBody = nextNode(tab.firstChild);
	let lastNode = prevNode(tBody.lastChild);
	tBody.removeChild(lastNode);
	let firstNode = nextNode(tBody.firstChild);
	tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
	if (form.value.length > maxSize)
		form.value = form.value.substring(0, maxSize);
	else
		msg.innerHTML = maxSize - form.value.length;
}
