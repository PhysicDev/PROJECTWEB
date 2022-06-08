<!--
    fichier qui genère le code html pour afficher les messages d'un canal
envoie une requête ajax pour récupérer les messages depuis le serveur
obtient le nom du canal depuis un cookie

si le cookie n'est pas encore assigé, la div est cachée
-->

<script type="text/javascript" src="JS/message.js"></script>
<?php
    if (isset($_COOKIE["channel"]) && $_COOKIE["channel"] && file_exists("data/messages/" . $_COOKIE["channel"] . ".txt") && isset($connected) && $connected) {
            $channel = $_COOKIE["channel"];
            
            echo("<div name='$channel' class='bar' id=Rbar>");
            include("php/requestMsg.php");
        }
    else {        
        echo("<div class='bar' id="."\"Rbar\""." style=\"display:none\">");
    }


?>
</div>