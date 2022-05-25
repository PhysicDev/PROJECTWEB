var users = [];
var pswd = [];

function checkform(){

}

function resetform(){
    for(let i=0;i<document.getElementById("login").children.length;i++){
        if(document.getElementById("login").children[i].type=="text"){
            document.getElementById("login").children[i].value = "";
        }
    }
}