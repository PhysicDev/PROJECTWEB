<!-- -->
<?php
    $recherche = $_POST['search'];
    $i =0;

    session_start();

    if (!function_exists('str_contains')) {
        function str_contains($haystack, $needle) {
            return $needle !== '' && mb_strpos($haystack, $needle) !== false;
        }
    }

    $lesChannels = file("../data/channel.csv");
    foreach ($lesChannels as $line) {
        $data = explode("#", $line);
        $channel = explode("|", $data[0]);
        $nameChannel = $channel[0];
        $admin = $channel[1];

        if (str_contains(strtolower($nameChannel), strtolower($recherche)) || trim($recherche)=="") {
            $i++;
            echo("<li id='$nameChannel' class='".($i%2==0?"even":"odd")."'><span>$nameChannel |</br> Admin : $admin</span>");
            if(strcmp(trim($data[1]),"null")){
                    if(!in_array($_SESSION["user"],$channel)){
                        echo("<img src='images/lock.png' class='icon'/>");
                    }else{
                        echo("<img src='images/quit.png' class='icon Hicon' onClick='leaveChannel(\"$nameChannel\")'/>");
                        echo("<img src='images/lockopen.png' class='icon'/>");
                    }
            }
            echo("</li>");
        }
    }

?>