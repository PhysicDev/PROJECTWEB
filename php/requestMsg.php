<?php
    //if (isset($_GET["channel"]) && $_GET["channel"] && file_exists("data/messages/" . $_GET["channel"] . ".txt") && isset($connected) && $connected) {
        if(!isset($channel)){
            $channel = $_POST["channelName"];
        }
        //echo("<li> $channel </li> </li>");
        echo("<h2>canal : $channel </h2>");
        include("util.php");
        $Dat = readChannel();
        if(!strcmp($Dat[$channel][1],"null")){

        
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
            echo ('
            <div id="textMessage">
            <textarea id="messageDat" placeholder="envoyer un message"></textarea>
            <img id="sendButton" src="images/send.png" type="submit" value="submit" onclick="sendMSG()" />
            </div>
            </div>');
        }
        else{
            echo("<h2>Vous n'êtes pas autorisé à parler sur ce canal</h2>");
            echo('<p> veuillez entrer le mot de passe pour accéder au canal :</p>');
            echo('<div id="msgForm"><input type="password" id="msgPass" placeholder="mot de passe" /><input type="submit" id="sendPass" value="valider" onClick="addUser()"/><div class="error"></div></div>');
        }
        
        setcookie("channel", $channel, time() + 86400,"/");
?>
