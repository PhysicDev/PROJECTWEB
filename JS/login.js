function checkform(){

    let ok = true;
    document.getElementById("error").style.visibility = "hidden";
    document.getElementById("error").style.display = "none";
    document.getElementById("error").innerHTML = "";
    
    for(let i=0;i<document.getElementById("login").children.length;i++){
        if(document.getElementById("login").children[i].type=="text"||document.getElementById("login").children[i].type=="password" ){
            document.getElementById("login").children[i].style.borderColor = "unset";
        }
    }

    for(let i=0;i<document.getElementById("login").children.length;i++){
        if(document.getElementById("login").children[i].type=="text"||document.getElementById("login").children[i].type=="password" ){
           if(document.getElementById("login").children[i].value==""){
                ok=false;
                document.getElementById("error").innerHTML += "le champ "+document.getElementById("login").children[i].placeholder+" est vide</br>";
                errorDiv(document.getElementById("login").children[i]);
            }
        }
    }
    if(ok){
        var pseudo = document.getElementById("pseudo").value;
        var password = document.getElementById("password").value;
        new simpleAjax("php/loginFormValid.php","post","pseudo="+pseudo+"&password="+password,next);
    }else{
        document.getElementById("error").style.visibility = "visible";
        document.getElementById("error").style.display = "block";
    }
}

function errorDiv(element){
    element.style.borderColor = "red";
}

function next(xmlhttp){
    let jsonDat = JSON.parse(xmlhttp.responseText);
    if(jsonDat.valid){
        document.location.href="index.php";
    }else{
        document.getElementById("error").innerHTML = "mauvais identifiant ou mot de passe</br>";
        document.getElementById("error").style.visibility = "visible";
        document.getElementById("error").style.display = "block";
    }
}


window.onload = function(){
    //on cache la div si on clique dessus
    document.getElementById("error").onclick = function(){
        document.getElementById("error").style.visibility = "hidden";
        document.getElementById("error").style.display = "none";
        for(let i=0;i<document.getElementById("login").children.length;i++){
            if(document.getElementById("login").children[i].type=="text"||document.getElementById("login").children[i].type=="password" ){
                document.getElementById("login").children[i].style.borderColor = "unset";
            }
        }
    }
}

