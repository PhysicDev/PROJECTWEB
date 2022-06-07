<?php
    //if (isset($_GET["channel"]) && $_GET["channel"] && file_exists("data/messages/" . $_GET["channel"] . ".txt") && isset($connected) && $connected) {
        $channel = $_POST["channelName"];
        //echo("<li> $channel </li> </li>");
        
        setcookie("channel", $channel, time() + 86400,"/");
        
        echo("<h2>canal : $channel </h2>");
        $lesMsg = file("../data/messages/$channel.txt");
        echo("<ul id='msgArea' nbMSG='".count($lesMsg)."'>");
        $i=0;
        foreach ($lesMsg as $msg) {
            $msgEtPers = explode("|", $msg);
            $leMsg = $msgEtPers[1];
            $pers = $msgEtPers[0];
            $i++;
            //le truc avec le $i c'est pour le style css.
            echo("<li class='".($i%2==0?"even":"odd")."'>$pers : $leMsg</li>");
        }
        echo("</ul>");
    //}
?>
<div id="textMessage">
<textarea id="messageDat" placeholder="envoyer un message"></textarea>
<img id="sendButton" src="images/send.png" type="submit" value="submit" onclick="sendMSG()" />
</div>
</div>

