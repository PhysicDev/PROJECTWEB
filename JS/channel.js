var newChan="";
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
    

    if(name.length<5){
        ok=false;
        errors.push('le nom doit faire plus de 5 caractères');
    }

    //verifie si le nom du channel contient au moins une lettre
    if(!name.match(/[a-zA-Z]/)){
        ok=false;
        errors.push('le nom doit contenir au moins une lettre');
    }

    //verifie que le nom ne contient que des chiffres et des lettres
    if(!name.match(/^[a-zA-Z0-9]+$/)){
        ok=false;
        errors.push('le nom ne doit contenir que des chiffres et des lettres');
    }

    if(ok){
        newChan = name;
        new simpleAjax("php/channelFormValid.php","post","name="+name,errorMsg);
    }else{
        addErrors(errors);
    }
}


function errorMsg(xmlhttp){
    let jsonDat = JSON.parse(xmlhttp.responseText);
    if(jsonDat["valid"]){
        document.getElementById("channelList").innerHTML+="<li>"+newChan+"| Admin : "+jsonDat["user"]+"</a></li>";
        document.getElementById("name").value = "";
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