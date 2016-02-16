var X_REGEXP_ALPHA = /^[a-zA-Z]+$/;
var X_REGEXP_NUM = /^[0-9]+$/;
var X_REGEXP_ALNUM = /^[A-Za-z0-9]+$/;
var X_REGEXP_INTEGER = /^(\+|\-|\d*)\d+$/;
var X_REGEXP_FLOAT = /^(\-|\+|\d*)\d+(\.|\d)\d*$/;
var X_REGEXP_HEXA = /^(\+|\-|[a-fA-F0-9]*)[a-fA-F0-9]+$/;
var X_REGEXP_ALLPHONE = /(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$/;
var X_REGEXP_PHONE = /^((\(\d{2,4}\))|(\d{2,4}\-))?[0-9]\d{6,7}$/;
var X_REGEXP_MOBILE = /^((\(\d{2,4}\))|(\d{2,4}\-))?[0-9]\d{6,10}$/;
var X_REGEXP_EMAIL = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

var X_DELIMITER_NUMBER = /([^0-9\.\-])/g;
var X_DELIMITER_CHAR = /(\,|\.|\/|\$|\^|\*|\(|\)|\+|\?|\\|\{|\}|\||\[|\]|-|:)/g;

var X_PASS = document.getElementById("customerPassword");
var X_COMPASS = document.getElementById("PasswordAgain");

var vars = [
        "required",
        "dollar",
		"PasswordAgain",
        "phone",
        "email",
        "mobile",
        "float"
		
    ];
function validation() {
    if (!checkInput()) return false;
    if (!checkTextArea()) return false;
    return true;
}

function checkInput() {
    var objs = document.getElementsByTagName("input");
    for (var i = 0; i < objs.length; i++) {
        if (objs[i].getAttribute("validate") != null) {
        	if(! injectionCheck(objs[i])){
        		return false;
        	}
            if (!getTypes(objs[i])) {
                return false;
            }
        }
    }
    return true;
}

function checkTextArea() {
    var objs = document.getElementsByTagName("textarea");
    for (var i = 0; i < objs.length; i++) {
        if (objs[i].getAttribute("validate") != null) {
        	if(! injectionCheck(objs[i])){
        		return false;
        	}
            if (!getTypes(objs[i])) {
                return false;
            }
        }
    }
    return true;
}

function injectionCheck(obj){
	if((obj.value.indexOf('"') !=-1 || obj.value.indexOf("'") !=-1)){
		alert("Single quotes and double quotation marks are forbidden to input !");
		return false;
	}
	return true;
}

function getTypes(obj) {
    var types = obj.getAttribute("validate").split(",");
    for (var i = 0; i < types.length; i++) {
        if (!handOut(obj, types[i])) 
		{
		return false;
		}
		
    }
    return true;
}
function handOut(obj, type) {
    if (type == vars[0]) {
        if (!validateRequired(obj)) {
            return false;
        }
    } else if (type == vars[1]) {
        if (!validateDollar(obj)) {
            return false;
        }
    } else if (type == vars[2]) {
        if (!validatePasswordAgain(obj)) {
            return false;
        }
    }else if (type == vars[3]) {
        if (!validatePhone(obj)) {
            return false;
        }
    } else if (type == vars[4]) {
        if (!validateEmail(obj)) {
            return false;
        }
    }
    else if (type == vars[5]) {
        if (!validateMobile(obj)) {
            return false;
        }
    }
	

    return true;
}

function setPrompt(obj, flag, str) {
    if (!flag) {
        setCss(obj);
        if (document.getElementById(obj.id + "Error"))
            document.getElementById(obj.id + "Error").innerHTML = str;
        else if(document.getElementById("msg"))
            document.getElementById("msg").innerHTML = str;
    } else {
        unsetCss(obj);
        if (document.getElementById(obj.id + "Error"))
            document.getElementById(obj.id + "Error").innerHTML = "";
        else if (document.getElementById("msg"))
            document.getElementById("msg").innerHTML = "";
    }
}

function setCss(obj) {
    obj.style.backgroundColor = "#EEFFB6";
    obj.focus();
}
function unsetCss(obj) {
    obj.style.backgroundColor = "#FFFFFF";
}





function validateRequired(obj) {

    var flag = true;
    if (!obj.value) flag = false;
    if (flag && /^\s*$/.test(obj.value)) flag = false;
    if (flag && obj.type == "checkbox" && !obj.checked) flag = false;
    if (flag && obj.type == "radio" && !obj.checked) flag = false;
    if (flag && (obj.type == "select-one" || obj.type == "select-multiple") && !obj.selectedIndex == -1) flag = false;

    setPrompt(obj, flag, "This is a required item");
	
    return flag;
}


function validatePhone(obj) {
    var flag = true;

    if (!obj.value) return true;
    if (!(X_REGEXP_PHONE.test(obj.value))) {
        flag = false;
    }
    setPrompt(obj, flag, "Wrong format, 2 to 4 area code- 7 to 8 nums(eg:xx-xxxxxxx)")
    return flag;
}

function validateEmail(obj) {
    var flag = true;

    if (!obj.value) return true;
    if (!(X_REGEXP_EMAIL.test(obj.value))) {
        flag = false;
    }
    setPrompt(obj, flag, "Wrong email format.(eg:xxx@xxx.xxx)")
    return flag;
}

function validateMobile(obj) {
    var flag = true;

    if (!obj.value) return true;
    if (!(X_REGEXP_MOBILE.test(obj.value))) {
        flag = false;
    }
    setPrompt(obj, flag, "Wrong format, 2 to 4 area code - 7 to 11 nums(eg:xxx-xxxxxxxx)")
    return flag;
}

function validatePasswordAgain(obj){
	alert("pass");
	var flag = true;
	if (!obj.value) return true;
	if (!(X_PASS.text(obj.value))){
		flag = false;
		}
		setPrompt(obj, flag, "twice input in password are not match !")
		return flag;
	}

function validateDollar(obj) {
    var flag = true;
    if (!obj.value) return true;

    var val = obj.value; //.replace(X_DELIMITER_NUMBER, "");
    if (!(X_REGEXP_INTEGER.test(val)) && !(X_REGEXP_FLOAT.test(val))) {

        flag = false;
    }
    if (!(/^\d{1,4}(\.\d{1,2})?$/.test(val))) {
        flag = false;
    }
    setPrompt(obj, flag, "Wrong format,the scope should be from 0 to 9999.99");

    return flag;
}

function validateFloat(obj) {
    var flag = true;

    if (!obj.value) return true;
    if (!(X_REGEXP_INTEGER.test(obj.value)) && !(X_REGEXP_FLOAT.test(obj.value))) {

        flag = false;
    }

    return flag;
}




function checkLength(obj, maxlength) {
    if (obj.value.length > maxlength) {
        obj.value = obj.value.substring(0, maxlength);
    }
}