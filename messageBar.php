<!--
    Un fichier qui affiche les messages des salons de discussions
    positionner à droite de la page
-->

<script type="text/javascript" src="JS/message.js"></script>
<?php
    if (isset($_COOKIE["channel"]) && $_COOKIE["channel"] && file_exists("data/messages/" . $_COOKIE["channel"] . ".txt") && isset($connected) && $connected) {
            $channel = $_COOKIE["channel"];
            //echo("<li> $channel </li> </li>");
            
            echo("<div name='$channel' class='bar' id=Rbar>");
            echo("<h2>canal : $channel </h2>");
            $lesMsg = file("data/messages/$channel.txt");
            echo("<ul id='msgArea'>");
            foreach ($lesMsg as $msg) {
                $msgEtPers = explode("|", $msg);
                $leMsg = $msgEtPers[1];
                $pers = $msgEtPers[0];
                $i++;
                //le truc avec le $i c'est pour le style css.
                echo("<li class='".($i%2==0?"even":"odd")."'>$pers : $leMsg</li>");
            }     
            
            echo("</ul>");
        }
    else {        
        echo("<div class='bar' id="."\"Rbar\""." style=\"display:none\">");
    }


?>
<div id="textMessage">
<textarea id="messageDat" placeholder="envoyer un message"></textarea>
<img id="sendButton" src="images/send.png" type="submit" value="submit" onclick="sendMSG()" />
</div>
</div>