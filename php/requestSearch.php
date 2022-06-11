<?php

    //montre les channels qui correspondent à la recherche
    $recherche = $_POST['search'];

    // si on veut filtrer en fonction de l'admin
    $userIn ="_";
    if(isset($_POST['admin'])){
        $userIn = $_POST['admin'];
    }

    $i =0;
    if(!isset($_SESSION)){
        session_start();
    }

    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    $path = "../data/channel.csv";
    if(!file_exists($path)){
        $path = "data/channel.csv";
    }

    $lesChannels = file($path);
    foreach ($lesChannels as $line) {
        $data = explode("#", $line);
        $channel = explode("|", $data[0]);
        $nameChannel = $channel[0];
        $admin = $channel[1];

        if (str_contains(strtolower($nameChannel), strtolower($recherche)) || ($userIn=="_" && trim($recherche)=="") || in_array($userIn,$channel)) {
            $i++;
            echo("<li id='$nameChannel' class='".($i%2==0?"even":"odd")."'><span>$nameChannel |</br> Admin : $admin</span>");
            if(strcmp(trim($data[1]),"null")){
                    if(!in_array($_SESSION["user"],$channel)){
                        echo("<img src='images/lock.png' class='icon'/>");
                    }else{
                        echo("<img src='images/quit.png' class='icon Hicon' onClick='leaveChannel(\"$nameChannel\")'/>");
                        echo("<img src='images/lockopen.png' class='icon'/>");
                    }
            }else if(in_array($userIn,$channel)){
                echo("<img src='images/quit.png' class='icon Hicon' onClick='leaveChannel(\"$nameChannel\")'/>");
            }
            echo("</li>");
        }
    }

?>