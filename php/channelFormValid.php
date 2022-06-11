<?php

    $name= $_POST["name"];
    include("../php/sessionManager.php");

    
    if(!isset($connected) || !$connected){
       header("Location: ../index.php");
    }else{

        include("util.php");

        $channel = readChannel();

        $ok = true;
        $php_errormsg='[""';

        // même si la majorité des verification ont déjà été faîtes sur le code js, on reverifie au cas où un
        // utilisateur essaie d'envoyer des rêquête http sans passer par le code js

        //verifie que le pseudo ne contient que des lettres et des chiffres
        if(isset($channel[$name])){
            $ok = false;
            $php_errormsg .= ',"Le nom de canal est déjà utilisé"';
        }

        if(!preg_match("/^[a-zA-Z0-9]+$/",$name)){
            $ok = false;
            $php_errormsg .= ',"Le nom du canal ne doit contenir que des lettres et des chiffres"';
        }
        
        if(strlen($name)<5){
            $ok = false;
            $php_errormsg .= ',"Le nom de canal doit contenir au moins 5 caractères"';
        }


        if($ok){
            $file = fopen("../data/channel.csv", "a");
            fwrite($file, $name."|".$user);
            if(isset($_POST["password"]))
                fwrite($file,"#".$_POST["password"]."\n");
            else
                fwrite($file,"#null\n");
            fclose($file);
            //create a new file for the message
            $file = fopen("../data/messages/".$name.".txt", "w");
            fwrite($file,"serveur| début du canal ".$name."\n");
            fclose($file);
        }


        $php_errormsg .= "]";
        echo('{"valid":'.($ok?"true":"false").',"error":'.$php_errormsg.',"user":"'.$user.'"}');
    }
?>
