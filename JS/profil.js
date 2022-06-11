
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
