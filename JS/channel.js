function checkform(){

    let ok = true;
    document.getElementById("error").style.visibility = "hidden";
    document.getElementById("error").style.display = "none";
    document.getElementById("error").innerHTML = "";
    var name = document.getElementById("name").value;
    var errors  = [""];

    for(let i=0;i<document.getElementById("channel").children.length;i++){
        if(document.getElementById("channel").children[i].type=="text"||document.getElementById("channel").children[i].type=="password" ){
           if(document.getElementById("channel").children[i].value==""){
                ok=false;
                document.getElementById("error").innerHTML += "le champ "+document.getElementById("channel").children[i].placeholder+" est vide</br>";
                document.getElementById("error").style.visibility = "visible";
                document.getElementById("error").style.display = "block";
                return;
            }
        }
    }
    

    if(name.length<3){
        ok=false;
        document.getElementById("error").innerHTML += "le nom doit faire plus de 3 caractères</br>";
    }

    //verifie si le nom du channel contient au moins une lettre
    if(!name.match(/[a-zA-Z]/)){
        ok=false;
        document.getElementById("error").innerHTML += "le nom doit contenir au moins une lettre</br>";
    }

    //verifie que le nom ne contient pas de caractere speciaux

    if(ok){
        new simpleAjax("php/channelFormValid.php","post","name="+name,errorMsg);
    }else{
        document.getElementById("error").style.visibility = "visible";
        document.getElementById("error").style.display = "block";
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

window.onload = function(){
    //on cache la div si on clique dessus
    document.getElementById("error").onclick = function(){
        document.getElementById("error").style.visibility = "hidden";
        document.getElementById("error").style.display = "none";
    }
}