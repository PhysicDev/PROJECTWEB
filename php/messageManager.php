<?php
session_start();

include("util.php");

if(!isset($_SESSION['user'])){
    http_response_code(403);
}

$user=$_SESSION['user'];

if(!isset($_POST["channel"])){
    http_response_code(400);
}

$channel = $_POST["channel"];

if(!isset($_POST["message"]) && !isset($_POST["lastMSG"])){
    http_response_code(400);
}

if(!file_exists("../data/messages/$channel.txt")){
    http_response_code(404);
}

if(isset($_POST["message"])){
    //requête envoyer message
    $message = $_POST["message"];
    
    //sécurité pour éviter que l'utilisateur bidouille dans le code
    if(preg_match("/[<>\"'\/]/", $message)){
        http_response_code(400);
        echo "{\"state\":false,\"user\":\"$user\"}";
    }else{
        $file = fopen("../data/messages/$channel.txt", "a");
        fwrite($file, $user."|".$message."\n");
        fclose($file);
        echo "{\"state\":true,\"user\":\"$user\"}";
    }

}else{
    //requête recupérer message
    $lastMSG = intval($_POST["lastMSG"])-1;
    $MSG=readMSG($channel);
    http_response_code(200);
    if($lastMSG+1<count($MSG)){
            echo "{\"state\":\"new\",\"dat\":\"";
            $i=$lastMSG+1;
            for($i;$i<count($MSG);$i++){
                echo("<li class='".($i%2==0?"even":"odd")."'>".$MSG[$i][0]." : ".$MSG[$i][1]."</li>");
            }
            echo"\",\"last\":".count($MSG)."}";
    }else{
        echo "{\"state\":\"RAS\",\"last\":".count($MSG)."}";
    }
}


?>