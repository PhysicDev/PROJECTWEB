
var ping=null;
window.onload = function(){
    //on met la scroll bar en bas
    if(document.getElementById("msgArea")){
        initMSG();
    }

    
    //on cache la div si on clique dessus
    if(document.getElementById("error")){
        document.getElementById("error").onclick = function () {
            document.getElementById("error").style.visibility = "hidden";
            document.getElementById("error").style.display = "none";
        }
    }
    //------------------------------------------------------------------------//

    var parcours = document.querySelectorAll("#channelList li");
    for (let i = 0; i < parcours.length; i++) {
        parcours[i].onclick = goToMsg;
    }

}

function initMSG(){
    
    if(document.getElementById("msgArea")){
        document.getElementById("msgArea").scrollTop = document.getElementById("msgArea").scrollHeight;

        //convert to int
        lastMSG = parseInt(document.getElementById("msgArea").getAttribute("nbMSG"));
        channel = document.getElementById("Rbar").getAttribute("name");
        if(!ping){
            ping=setInterval(askNewMSG,1000);
        }
        document.getElementById("messageDat").onclick = resetTextArea;
    }
}

function puissQuatre(){
    window.location.href = "https://ialake.netlify.app/game.html";
}

function chooseImg(){
    document.getElementById("cheminImg").setAttribute("style","visibility=visible");
    document.getElementById("boutonImg").setAttribute("style","visibility=visible");
}

function appliquerImg(){
    
    function on_success(xmlhttp) {
        //alert(xmlhttp.responseText);
        document.getElementById("cheminImg").setAttribute("style","visibility: hidden");
        document.getElementById("boutonImg").setAttribute("style","visibility: hidden");
        document.getElementById("monImg").setAttribute("src",xmlhttp.responseText);
        
    }
    function on_failure(xmlhttp) {
        alert("Erreur de appliquerImg()");
    }

    var cheminImg = document.getElementById("cheminImg").value;
    simpleAjax("php/requestImg.php", 'post', "cheminImg=" + cheminImg, on_success, on_failure);
    
    /*
    document.getElementById("monImg").setAttribute("src",document.getElementById("cheminImg").value);
    document.getElementById("cheminImg").setAttribute("style","visibility=hidden");
    document.getElementById("boutonImg").setAttribute("style","visibility=hidden");
    */
}
