<!--
    Un fichier qui affiche les messages des salons de discussions
    positionner à droite de la page

    simpleAjax est déjà inclu dans le fichier channelBar.php
-->
<script type="text/javascript" src="JS/message.js"></script>
<?php
    /*
    if (isset($_GET["channel"]) && $_GET["channel"] && file_exists("data/messages/" . $_GET["channel"] . ".txt") && isset($connected) && $connected) {
            $channel = $_GET["channel"];
            //echo("<li> $channel </li> </li>");
            
            echo("<div name='$channel' class='bar' id="."\"Rbar\"".">");
            echo("<h2>canal : $channel </h2>");
            $lesMsg = file("data/messages/$channel.txt");
            echo("<ul id='msgArea' nbMSG=".count($lesMsg).">");
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
        }
    else {        
        echo("<div id="."\"Rbar\""." style=\"display:none\">");
    }
    
    // echo("</div>");
    */
    


    echo("<div class='bar' id="."\"Rbar\""." style=\"display:none\">");
?>
<div id="textMessage">
<textarea id="messageDat" placeholder="envoyer un message"></textarea>
<img id="sendButton" src="images/send.png" type="submit" value="submit" onclick="sendForm()" />
</div>
</div>