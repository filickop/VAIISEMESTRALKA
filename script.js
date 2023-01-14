function showCustomer(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("config").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("config").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "csgoconfig.php?q="+str, true);
    xhttp.send();
}