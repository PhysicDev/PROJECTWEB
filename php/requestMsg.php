<?php
    //if (isset($_GET["channel"]) && $_GET["channel"] && file_exists("data/messages/" . $_GET["channel"] . ".txt") && isset($connected) && $connected) {
        $channel = $_POST["channelName"];
        //echo("<li> $channel </li> </li>");
        
        echo("<h2>canal : $channel </h2>");
        $lesMsg = file("../data/messages/$channel.txt");
        echo("<ul>");
        foreach ($lesMsg as $msg) {
            $msgEtPers = explode("|", $msg);
            $leMsg = $msgEtPers[1];
            $pers = $msgEtPers[0];
            echo("<li>$pers : $leMsg</li>");
        }     
        
        echo("</ul>");
    //}

    /*
    if (isset($_GET["channel"]) && $_GET["channel"] && file_exists("data/messages/" . $_GET["channel"] . ".txt") && isset($connected) && $connected) {
            $channel = $_GET["channel"];
            //echo("<li> $channel </li> </li>");
            
            echo("<div class='bar' id="."\"Rbar\""." style=\"display:block\">");
            echo("<h2>canal : $channel </h2>");
            $lesMsg = file("data/messages/$channel.txt");
            echo("<ul>");
            foreach ($lesMsg as $msg) {
                $msgEtPers = explode("|", $msg);
                $leMsg = $msgEtPers[1];
                $pers = $msgEtPers[0];
                echo("<li>$pers : $leMsg</li>");
            }     
            
            echo("</ul>");
        }
    else {        
        echo("<div id="."\"Rbar\""." style=\"display:none\">");
    }
    */

    // Warning: file(data/messages/test1234.txt): Failed to open stream: No such file or directory in C:
    //   \XAMPP\htdocs\Application_du_Web\Projet\PROJECTWEB\php\requestMsg.php on line 7
?>
