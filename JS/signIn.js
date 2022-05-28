function checkform(){
    var pseudo = document.getElementById("pseudo").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    var errors  = [""];
    let ok = true;

    //preverification pour eviter d'envoyer trop de requetes inutiles

    for(let i=0;i<document.getElementById("signIn").children.length;i++){
        if(document.getElementById("signIn").children[i].type=="text"||document.getElementById("signIn").children[i].type=="password" ){
           if(document.getElementById("signIn").children[i].value==""){
               ok = false;
               errors.push("le champ "+document.getElementById("signIn").children[i].placeholder+" est vide");
           }
        }
    }
    if(ok){
        if(pseudo.length<5){
            ok=false;
            errors.push("Le pseudo doit contenir au moins 5 caractères");
        }

        //check if pseudo contain only letters and number
        if(!pseudo.match(/^[a-zA-Z0-9]+$/)){
            ok=false;
            errors.push("Le pseudo ne doit contenir que des lettres et des chiffres");
        }

        //check if password contain at least one number
        if(!password.match(/[0-9]/)){
            ok=false;
            errors.push("Le mot de passe doit contenir au moins un chiffre");
        }

        if(!password.match(/[a-zA-Z]/)){
            ok=false;
            errors.push("Le mot de passe doit contenir au moins une lettre");
        }

        if(password.length<8){
            ok=false;
            errors.push("Le mot de passe doit contenir au moins 8 caractères");
        }

        if(password!=password2){
            ok=false;
            errors.push("Les mots de passe ne correspondent pas");
        }        
    }

    if(ok){
        new simpleAjax("php/signFormValid.php","post","pseudo="+pseudo+"&password="+password+"&password2="+password2+"",errorMsg);
    }else{
        addErrors(errors);
    }
}

function errorMsg(xmlhttp){
    let jsonDat = JSON.parse(xmlhttp.responseText);
    if(jsonDat["valid"]){
        window.location.href = "PopUp.php";
    }else{
        addErrors(jsonDat["error"]);
    }
}

function addErrors(array){
    document.getElementById("error").innerHTML ="<p><ul>"+(array.length-1)+" erreur ont été détectées:<br>";
    for(let i=1 ;i< array.length;i++){
        document.getElementById("error").innerHTML += "<li>"+array[i]+"</li>";
    }
    document.getElementById("error").innerHTML +="</ul></p>";
    document.getElementById("error").style.visibility = "visible";
    document.getElementById("error").style.display = "block";
}



function resetform(){
    for(let i=0;i<document.getElementById("signIn").children.length;i++){
        if(document.getElementById("signIn").children[i].type=="text"||document.getElementById("signIn").children[i].type=="password" ){
            document.getElementById("signIn").children[i].value = "";
        }
    }
}

window.onload = function(){
    //on cache la div si on clique dessus
    document.getElementById("error").onclick = function(){
        document.getElementById("error").style.visibility = "hidden";
        document.getElementById("error").style.display = "none";
    }
}