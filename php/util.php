<?php 

error_reporting(E_ERROR | E_PARSE);
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

    function readChannel(){
        $file = fopen("../data/channel.csv", "r");
        $users = array();
        $lines = explode("\n", fread($file, filesize("../data/channel.csv")));
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

    ?>