function deleteItems() {
    if (!validateCheked()) {
        alert("Please check one item at least before deleting");
        return false;
    }
    return confirm('Are you sure you want to delete these items?');
}


function select_change(value, name) {
    if(value==""){
        return;
    }
    document.getElementById(name).value = value;
}

function showImage(img) {
    window.open(img.src);
}

function findObj(theObj, theDoc) {
    var p, i, foundObj;

    if (!theDoc) theDoc = document;
    if ((p = theObj.indexOf("?")) > 0 && parent.frames.length) {
        theDoc = parent.frames[theObj.substring(p + 1)].document;
        theObj = theObj.substring(0, p);
    }
    if (!(foundObj = theDoc[theObj]) && theDoc.all) foundObj = theDoc.all[theObj];
    for (i = 0; !foundObj && i < theDoc.forms.length; i++)
        foundObj = theDoc.forms[theObj];
    for (i = 0; !foundObj && theDoc.layers && i < theDoc.layers.length; i++)
        foundObj = findObj(theObj, theDoc.layers.document);
    if (!foundObj && document.getElementById) foundObj = document.getElementById(theObj);

    return foundObj;
}


var tableName = "suppliersTable";
var hiddenName = "suppliers_ids";

function insertRow(text, value, imgUrl) {
    if (checkRepeat(value)) {
        document.getElementById(hiddenName + "Error").innerHTML = "[" + text + "] has added and cannot be added again!";
        return;
    } else {
        document.getElementById(hiddenName + "Error").innerHTML = "";
    }
    var table = document.getElementById(tableName);
    var rowIndex = table.rows.length;
    var tr = table.insertRow(rowIndex);
    tr.id = "trItem" + value;
    var td1 = tr.insertCell(0);
    td1.className = "td1content";
    td1.innerHTML = "<label>" + text + "</label>";
    var td2 = tr.insertCell(1);
    td2.className = "td2content";
    var str = "<img alt='delete supplier' src='" + imgUrl + "' style='cursor:pointer' ";
    str += "onclick='deleteRow(" + value + ")'/>";
    td2.innerHTML = str;
    addValueToHidden(value);
}

function deleteRow(value) {
    document.getElementById(hiddenName + "Error").innerHTML = "";
    var trid = "trItem" + value;
    var table = document.getElementById(tableName);
    var tr = document.getElementById(trid);
    table.deleteRow(tr.rowIndex);
    deleteValueFromHidden(value);
}

function checkRepeat(value) {
    var values = document.getElementById(hiddenName).value;
    if (values == "") return false;
    var array = values.split(",");
    for (var i = 0; i < array.length; i++) {
        if (array[i] == value) {
            return true;
        }
    }
    return false;
}

function addValueToHidden(value) {
    var values = document.getElementById(hiddenName).value;
    if (values == "") document.getElementById(hiddenName).value = value;
    else document.getElementById(hiddenName).value += "," + value;
}
function deleteValueFromHidden(value) {
    var values = document.getElementById(hiddenName).value;
    if (values == "") return;
    var array = values.split(",");
    var str = "";
    for (var i = 0; i < array.length; i++) {
        if (array[i] != value) {
            if (str == "") str = array[i];
            else str += "," + array[i];
        }
    }
    document.getElementById(hiddenName).value = str;
}

function goToEditPage(url){
	window.location.href= url;
}