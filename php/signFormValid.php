<?php

    $password = $_POST['password'];
    $user= $_POST["pseudo"];

    $users = readUsers();

    $ok = true;
    $php_errormsg='[""';

    // même si la majorité des verification ont déjà été faîtes sur le code js, on reverifie au cas où un
    // utilisateur essaie d'envoyer des rêquête http sans passer par le code js

    //verifie que le pseudo ne contient que des lettres et des chiffres
    if(isset($users[$user])){
        $ok = false;
        $php_errormsg .= ',"Le pseudo est déjà utilisé"';
    }

    if(!preg_match("/^[a-zA-Z0-9]+$/",$user)){
        $ok = false;
        $php_errormsg .= ',"Le pseudo ne doit contenir que des lettres et des chiffres"';
    }
    
    if(strlen($user)<5){
        $ok = false;
        $php_errormsg .= ',"Le pseudo doit contenir au moins 5 caractères"';
    }

    //verifie que le mot de passe contient au moins un nombre et une lettres
    if(!preg_match("/[0-9]/",$password)){
        $ok = false;
        $php_errormsg .= ',"Le mot de passe doit contenir au moins un chiffre"';
    }

    if(!preg_match("/[a-zA-Z]/",$password)){
        $ok = false;
        $php_errormsg .= ',"Le mot de passe doit contenir au moins une lettre"';
    }

    if(strlen($password)<8){
        $ok = false;
        $php_errormsg .= ',"Le mot de passe doit contenir au moins 8 caractères"';
    }


    if($ok){
        //encryptage du mot de passe
        $password = hash("sha512",$password);

        $file = fopen("../data/users.csv", "a");
        fwrite($file, $user."|".$password."\n");
        fclose($file);
    }

    function readUsers(){
        $file = fopen("../data/users.csv", "r");
        $users = array();
        $lines = explode("\n", fread($file, filesize("../data/users.csv")));
        foreach($lines as $line){
            //check if the line is empty
            if(!empty($line)){
                $dat = explode("|",$line);
                $users[$dat[0]] = $dat[1];
            }
        }
        fclose($file);
        return $users;        
    }

    $php_errormsg .= "]";
    echo('{"valid":'.($ok?"true":"false").',"error":'.$php_errormsg.'}');
?>
