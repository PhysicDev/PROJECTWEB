
window.onload = function(){
    //on met la scroll bar en bas
    document.getElementById("msgArea").scrollTop = document.getElementById("msgArea").scrollHeight;
    setInterval(askNewMSG,1000);

    //convert to int
    lastMSG = 8090920;//parseInt(document.getElementById("msgArea").getAttribute("nbMSG"));
    channel = document.getElementById("Rbar").getAttribute("name");

    document.getElementById("messageDat").onclick = resetTextArea;
    
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