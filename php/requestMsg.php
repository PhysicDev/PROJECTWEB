<?php
    //affiche les messages d'un canal, si l'utilisateur n'est pas autorisé à le voir, affiche un message d'inscription

        if(!isset($channel)){
            $channel = $_POST["channelName"];
            setcookie("channel", $channel, time() + 86400,"/");
        }

        //if not session started start it
        if (!isset($_SESSION)) {
            include("sessionManager.php");
        }
        //echo("<li> $channel </li> </li>");
        echo("<h2>canal : $channel </h2>");
        include("util.php");
        $Dat = readChannel();
        if(!strcmp($Dat[$channel][1],"null") || in_array($user,$Dat[$channel][2])){
        if(!file_exists("../data/messages/$channel.txt")){
            $lesMsg = file("data/messages/$channel.txt");
        }else{
            $lesMsg = file("../data/messages/$channel.txt");
        }
        echo("<ul id='msgArea' nbMSG='".count($lesMsg)."'>");
        $i=0;
        foreach ($lesMsg as $msg) {
            $msgEtPers = explode("|", $msg);
            $leMsg = $msgEtPers[1];
            $pers = $msgEtPers[0];
            $i++;$pref="";if(!file_exists("login.php")){$pref="../";}
            $img='images/profil.png';
            if(file_exists($pref."images/profil/$pers.png"))
                $img = "images/profil/$pers.png";
            elseif(file_exists($pref."images/profil/$pers.jpg"))
                $img = "images/profil/$pers.jpg";
            elseif(file_exists($pref."images/profil/$pers.jpeg"))
                $img = "images/profil/$pers.jpeg";
            //le truc avec le $i c'est pour le style css.
            echo("<li class='".($i%2==0?"even":"odd")."'> <span><img src='$img' class='icon' /> $pers  <span>: <span> $leMsg</span></li>");
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
            echo('<div id="msgForm"><input type="password" id="msgPass" placeholder="mot de passe" /><input type="submit" id="sendPass" value="valider" onClick="addUser()"/><div id="msgErr" class="error" onClick="resetDiv()"></div></div>');
        }
?>
