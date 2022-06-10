<?php

if(!isset($_SESSION)){
    session_start();
}

if( !isset($_POST["channel"])){
    http_response_code(400);
    exit();
}

$channel = $_POST["channel"];

include("util.php");
$channels = readChannel();

if(!isset($channels[$channel])){
    http_response_code(404);
    echo("channelNotFound");
    exit();
}

if(isset($_POST["password"])){
    $password = $_POST["password"];
    //requête connection channel
    if(strcmp($password,$channels[$channel][1])){
        echo("{\"state\":false}");
    }else{
        echo("{\"state\":true}");
        if(!in_array($_SESSION["user"],$channels[$channel][2])){
            array_push($channels[$channel][2],$_SESSION["user"]);
            writeChannel($channels);
        }
    }
}else{
    //requête quitter channel
    if(in_array($_SESSION["user"],$channels[$channel][2])){
        //remove user from channel
        $key = array_search($_SESSION["user"],$channels[$channel][2]);
        unset($channels[$channel][2][$key]);
        echo("{\"state\":true,\"deleted\":");
        if(count($channels[$channel][2])==0){
            unset($channels[$channel]);
            echo("true}");
        }else{
            echo("false}");
        }
        writeChannel($channels);
    }
}


?>