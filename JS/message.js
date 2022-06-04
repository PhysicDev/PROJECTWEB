
var lastMSG;
var channel;

function askNewMSG(){

}


function sendMSG(){

    document.getElementById("messageDat").onclick = resetTextArea;
    channel = document.getElementById("Rbar").getAttribute("name");
    var message = document.getElementById("messageDat").value;
    if(message.length > 256){
        document.getElementById("messageDat").placeholder="message trop long";
        document.getElementById("messageDat").style.border = "1px solid red";
        document.getElementById("messageDat").value="";
        return;
    }
    if(message.length == 0){
        document.getElementById("messageDat").placeholder="message vide";
        document.getElementById("messageDat").style.border = "1px solid red";
        document.getElementById("messageDat").value="";
        return;
    }
    //before sending the new message we check if there are new messages
    askNewMSG();

    new simpleAjax("php/messageManager.php","post","channel="+channel+"&message="+message+"",addMessage,errorMsg);
}

function addMessage(xmlhttp){
    var response = JSON.parse(xmlhttp.responseText);
    if(response.state){
        lastMSG++;
        document.getElementById("msgArea").innerHTML += "<li class='"+(lastMSG%2==1?"even":"odd")+"'>"+response.user+":"+document.getElementById("messageDat").value+"</li>";
        document.getElementById("messageDat").value="";
        document.getElementById("msgArea").scrollTop = document.getElementById("msgArea").scrollHeight;
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

