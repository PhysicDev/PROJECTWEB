<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_POST["password"]) || !isset($_POST["channel"])){
    http_response_code(400);
    exit();
}

$channel = $_POST["channel"];
$password = $_POST["password"];

include("util.php");
$channels = readChannel();

if(!isset($channels[$channel])){
    http_response_code(404);
    echo("channelNotFound");
    exit();
}

if(strcmp($password,$channels[$channel][1])){
    echo("{\"state\":false}");
}else{
    echo("{\"state\":true}");
    if(!in_array($_SESSION["user"],$channels[$channel][2])){
        array_push($channels[$channel][2],$_SESSION["user"]);
        writeChannel($channels);
    }
}


?>