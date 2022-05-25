var users = [];

function checkform(){

}

function resetform(){
    for(let i=0;i<document.getElementById("signIn").children.length;i++){
        if(document.getElementById("signIn").children[i].type=="text"){
            document.getElementById("signIn").children[i].value = "";
        }
    }
}