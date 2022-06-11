<?php

//peut prendre deux requêtes differentes selon les paramètres envoyés
//le programme va soit envoyer les nouveaux messages soit enregistrer un nouveau message
session_start();

include("util.php");

if(!isset($_SESSION['user'])){
    http_response_code(403);
    exit();
}

$user=$_SESSION['user'];

if(!isset($_POST["channel"])){
    http_response_code(400);
    exit();
}

$channel = $_POST["channel"];


$channels = readChannel();
if(!in_array($user,$channels[$channel][2]) && !strcmp(trim($data[1]),"null")){
    http_response_code(403);
    exit();
}

if(!isset($_POST["message"]) && !isset($_POST["lastMSG"])){
    http_response_code(400);
    exit();
}

if(!file_exists("../data/messages/$channel.txt")){
    http_response_code(404);
    exit();
}

if(isset($_POST["message"])){
    //requête envoyer message
    $message = $_POST["message"];
    
    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    //sécurité pour éviter que l'utilisateur bidouille dans le code
    if(preg_match("/[<>\"\/]/", $message)){
        http_response_code(400);
        echo "{\"state\":false,\"user\":\"$user\"}";
    }else{

        
        $i=0;
        while(str_contains($message, "'''''")){
            //replace only first occurence
            $message = preg_replace("/'''''/", $i%2==0?"<i><b>":"</i></b>", $message, 1);
            $i++;
        }
        $i=0;
        while(str_contains($message, "'''")){
            $message = preg_replace("/'''/", $i%2==0?"<b>":"</b>", $message, 1);
            $i++;
        }
        $i=0;
        while(str_contains($message, "''")){
            $message = preg_replace("/''/", $i%2==0?"<i>":"</i>", $message, 1);
            $i++;
        }

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