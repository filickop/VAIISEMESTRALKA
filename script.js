function showConfig(str) {
    const $select = document.querySelector('#configSelector');
    $select.value = str;
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
    if(str == 1) {
        xhttp.open("GET", "csgoconfig.php?q="+str, true);
    }
    else if(str == 2) {
        xhttp.open("GET", "valorantconfig.php?q="+str, true);
    }
    else if(str == 3) {
        xhttp.open("GET", "fortniteconfig.php?q="+str, true);
    }

    xhttp.send();
}

function setConfig(str) {
    var xhttp;
    if (str == "") {
        document.getElementById("setConfig").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("setConfig").innerHTML = this.responseText;
        }
    };
    if(str == 1) {
        xhttp.open("GET", "setCsgoconfig.php?q="+str, true);
    }
    else if(str == 2) {
        xhttp.open("GET", "setValorantconfig.php?q="+str, true);
    }
    else if(str == 3) {
        xhttp.open("GET", "setFortniteconfig.php?q="+str, true);
    }

    xhttp.send();
}

function players(game, page) {
    var xhttp;
    if (page == "") {
        page = 1;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("playersList").innerHTML = this.responseText;
        }
    };

        xhttp.open("GET", "players.php?game="+game+"&page="+page, true);


    xhttp.send();
}

//PASSWORD CHECKER

$(document).ready(function () {
    $(".pass").keyup(function () {
        var isOneDigit = false;
        var isLowerCaseLetter = false;
        var isUpperCaseLetter = false;
        var isSpecialChar = false;
        var isMinChars = false;
        var pass = $(".pass").val();
        if(/\d/.test(pass)){
            isOneDigit = true;
        }
        if(/[a-z]/.test(pass)) {
            isLowerCaseLetter = true;
        }
        if(/[A-Z]/.test(pass)) {
            isUpperCaseLetter = true;
        }
        if(/[#$@!%&*?]/.test(pass)) {
            isSpecialChar = true;
        }
        if(/^.{8,}$/.test(pass)) {
            isMinChars = true;
        }
        if(pass != "") {
            if(isOneDigit || isLowerCaseLetter || isUpperCaseLetter || isMinChars || isSpecialChar) {
                $(".weak").css('background-color', 'red');
                $(".medium").css('background-color', 'lightgrey');
                $(".strong").css('background-color', 'lightgrey');
                $(".weak-pass").html("Weak Password.");
                $(".weak-pass").css('display', 'block');
            }
            if(isOneDigit && isLowerCaseLetter && isUpperCaseLetter && isMinChars) {
                $(".weak").css('background-color', 'red');
                $(".medium").css('background-color', 'orange');
                $(".strong").css('background-color', 'lightgrey');
                $(".weak-pass").html("Good Password.");
                $(".weak-pass").css('display', 'block');

            }
            if(isOneDigit && isLowerCaseLetter && isUpperCaseLetter && isMinChars && isSpecialChar) {
                $(".weak").css('background-color', 'red');
                $(".medium").css('background-color', 'orange');
                $(".strong").css('background-color', 'green');
                $(".weak-pass").html("Strong Password.");
                $(".weak-pass").css('display', 'block');
            }
        }
        else {
            $(".weak").css('background-color', 'lightgrey');
            $(".medium").css('background-color', 'lightgrey');
            $(".strong").css('background-color', 'lightgrey');
            $(".weak-pass").css('display', 'none');
        }
    });
})

//CONFIRM PASSWORD CHECKER
$(document).ready(function () {
    $(".confirm-pass").keyup(function () {
        var cpass = $(".confirm-pass").val();
        var pass = $(".pass").val();
        if(cpass != pass || cpass == "") {
            $(".signup").attr('disabled', 'disabled');

            $(".weak").css('background-color', 'red');
            $(".medium").css('background-color', 'red');
            $(".strong").css('background-color', 'red');
            $(".weak-pass").html("Password not match!");
            $(".weak-pass").css('display', 'block');
        }
        else {
            $(".signup").removeAttr('disabled', 'disabled');

            $(".weak").css('background-color', 'green');
            $(".medium").css('background-color', 'green');
            $(".strong").css('background-color', 'green');
            $(".weak-pass").html("Password match.");
            $(".weak-pass").css('display', 'block');
        }

    })
})
