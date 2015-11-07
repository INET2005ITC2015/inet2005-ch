var xmlHTTP;
function showMatches(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
    }
    else if (str.length > 2) {
        xmlHTTP = GetXmlHttpObject();
        if (xmlHTTP == null) {
            alert("Your browser does not support XML HTTP!");
            return;
        }
        var url = "../commonFiles/newEmployeeSearcher.php";
        url = url + "?q=" + str;
        url = url + "&sid=" + Math.random();
        xmlHTTP.onreadystatechange = stateChanged;
        xmlHTTP.open("GET", url, true);
        xmlHTTP.send(null);
    }
}

function stateChanged() {
    if (xmlHTTP.readyState == 4) {
        document.getElementById("txtHint").innerHTML = xmlHTTP.responseText;
    }
}