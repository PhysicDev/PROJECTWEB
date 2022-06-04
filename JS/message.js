
var lastMSG;
var channel;

function askNewMSG(){

}


function sendMSG(){
    alert("bruh");
    var message = document.getElementById("messageDat").value;
    if(message.length > 256){
        document.getElementById("messageDat").placeholder="message trop long";
        document.getElementById("messageDat").style.border = "1px solid red";
        document.getElementById("messageDat").value="";
    }
    //before sending the new message we check if there are new messages
    askNewMSG();
    new simpleAjax("php/messageManager.php","post","channel="+channel+"&message="+message+"",addMessage,errorMsg);
}

function addMessage(xmlhttp){
    var response = parseJSON(xmlhttp.responseText);
    if(response.state == "ok"){
        lastMSG++;
        document.getElementById("msgArea").innerHTML += "<li class='"+(lastMSG%2==0?"even":"odd")+"'>"+document.getElementById("messageDat").value+":"+document.getElementById("messageDat").value+"</li>";
        document.getElementById("messageDat").value="";
    }else{
        errorMsg();
    }
}

function errorMsg(xmlhttp){
    document.getElementById("messageDat").placeholder="un erreur est survenue, message non envoyé";
    document.getElementById("messageDat").style.border = "1px solid red";
    document.getElementById("messageDat").value="";
}

function resetTextArea(){
    document.getElementById("messageDat").placeholder="envoyer un message";
    document.getElementById("messageDat").style.border = "unset";
}

window.onload = function(){
    //on met la scroll bar en bas
    document.getElementById("channelList").scrollTop = document.getElementById("channelList").scrollHeight;
    setInterval(askNewMSG,1000);

    //convert to int
    lastMSG = parseInt(document.getElementById("msgArea").getAttribute("nbMSG"));
    channel = document.getElementById("Rbar").getAttribute("name");

    document.getElementById("sendButton").onclick = sendMSG;
    document.getElementById("messageDat").onclick = resetTextArea;
}