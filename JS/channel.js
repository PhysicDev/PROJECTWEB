
//**
var newChan = "";
var nbSalon = "";
function checkform() {
    let ok = true;
    document.getElementById("error").style.visibility = "hidden";
    document.getElementById("error").style.display = "none";
    document.getElementById("error").innerHTML = "";
    var name = document.getElementById("name").value;
    var errors = [""];

    for (let i = 0; i < document.getElementById("channel").children.length; i++) {
        if (document.getElementById("channel").children[i].type == "text") {
            if (document.getElementById("channel").children[i].value == "") {
                ok = false;
                document.getElementById("error").innerHTML += "le champ " + document.getElementById("channel").children[i].placeholder + " est vide</br>";
                document.getElementById("error").style.visibility = "visible";
                document.getElementById("error").style.display = "block";
                return;
            }
        }
    }
    let password = "null";
    if(!document.getElementById("psw").value == ""){
        password = document.getElementById("psw").value;
    }

    if (name.length < 5) {
        ok = false;
        errors.push('le nom doit faire plus de 5 caractères');
    }

    //verifie si le nom du channel contient au moins une lettre
    if (!name.match(/[a-zA-Z]/)) {
        ok = false;
        errors.push('le nom doit contenir au moins une lettre');
    }

    //verifie que le nom ne contient que des chiffres et des lettres
    if (!name.match(/^[a-zA-Z0-9]+$/)) {
        ok = false;
        errors.push('le nom ne doit contenir que des chiffres et des lettres');
    }

    if (ok) {
        newChan = name;
        new simpleAjax("php/channelFormValid.php", "post", "name=" + name + "&password=" +password, errorMsg);
    } else {
        addErrors(errors);
    }
}


function errorMsg(xmlhttp) {
    let jsonDat = JSON.parse(xmlhttp.responseText);
    if (jsonDat["valid"]) {
        document.getElementById("channelList").innerHTML+="<li id="+newChan+" class=>"+newChan+"| Admin : "+jsonDat["user"]+"</li>";
        document.getElementById("name").value = "";
    } else {
        addErrors(jsonDat["error"]);
    }
}

function addErrors(array) {
    document.getElementById("error").innerHTML = "<p><ul>" + (array.length - 1) + " erreur ont été détectées:<br>";
    for (let i = 1; i < array.length; i++) {
        document.getElementById("error").innerHTML += "<li>" + array[i] + "</li>";
    }
    document.getElementById("error").innerHTML += "</ul></p>";
    document.getElementById("error").style.visibility = "visible";
    document.getElementById("error").style.display = "block";
}



function goToMsg() {
    var channel = this.id;
    simpleAjax("php/requestMsg.php", 'post', "channelName=" + channel, on_success, on_failure);
    function on_success(xmlhttp) {
        document.getElementById("Rbar").innerHTML = xmlhttp.responseText;
        document.getElementById("Rbar").setAttribute("name",channel);
        document.getElementById("Rbar").setAttribute("style", "display:block");
        initMSG();
    }

    function on_failure(xmlhttp) {
    }
}


function rechercheCanaux() {
    function on_success(xmlhttp) {
        document.getElementById("channelList").innerHTML = xmlhttp.responseText;
        var parcours = document.querySelectorAll("#channelList li");
        for (let i = 0; i < parcours.length; i++) {
            parcours[i].onclick = goToMsg;
        }
        document.getElementById("nbSalons").innerHTML = parcours.length;
    }
    function on_failure(xmlhttp) {
        alert("Erreur de rechercheCanaux()");
    }
   simpleAjax("php/requestSearch.php", "post" , "search=" + document.getElementById("search").value, on_success, on_failure);
    
}

function leaveChannel(channel){
    simpleAjax("php/ChannelManager.php", 'post', "channel=" + channel, on_success, on_failure);

    function on_success(xmlhttp) {
        let dat = JSON.parse(xmlhttp.responseText);
        if(dat["deleted"]){
            document.getElementById(channel).remove();
            document.getElementById("nbSalons").innerHTML = document.getElementById("channelList").children.length;
        }else if(dat["state"]){
            document.getElementById(channel).removeChild(document.getElementById(channel).children[1]);
            document.getElementById(channel).removeChild(document.getElementById(channel).children[1]);
            document.getElementById(channel).innerHTML +="<img src='images/lock.png' class='icon'/>";
        }
    }
    function on_failure(xmlhttp) {
    }
}
