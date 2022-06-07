
var ping=null;
window.onload = function(){
    //on met la scroll bar en bas
    if(document.getElementById("msgArea")){
        initMSG();
    }

    
    //on cache la div si on clique dessus
    document.getElementById("error").onclick = function () {
        document.getElementById("error").style.visibility = "hidden";
        document.getElementById("error").style.display = "none";
    }
    //------------------------------------------------------------------------//

    var parcours = document.querySelectorAll("#channelList li");
    for (let i = 0; i < parcours.length; i++) {
        parcours[i].onclick = goToMsg;
    }

}

function initMSG(){
    console.log(document.getElementById("msgArea"));
    document.getElementById("msgArea").scrollTop = document.getElementById("msgArea").scrollHeight;

    //convert to int
    lastMSG = parseInt(document.getElementById("msgArea").getAttribute("nbMSG"));
    channel = document.getElementById("Rbar").getAttribute("name");
    if(!ping){
        ping=setInterval(askNewMSG,1000);
    }
    document.getElementById("messageDat").onclick = resetTextArea;
}