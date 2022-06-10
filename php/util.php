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
        $path = "../data/channel.csv";
        if(!file_exists($path)){
            $path = "data/channel.csv";
        }
        $file = fopen($path, "r");
        $users = array();
        $lines = explode("\n", fread($file, filesize($path)));
        foreach($lines as $line){
            //check if the line is empty
            if(!empty($line)){
                $dat = explode("#",$line);
                $subDat = explode("|",$dat[0]);
                $allowed = array_slice($subDat, 1, count($subDat));
                $users[$subDat[0]] = array($subDat[1],trim($dat[1]),$allowed);
            }
        }
        fclose($file);
        return $users;        
    }

    function readMSG($channel){
        $conv = array();
        $lines = explode("\n", file_get_contents("../data/messages/$channel.txt"));
        $i=0;
        foreach($lines as $line){
            //check if the line is empty
            if(!empty($line)){
                $dat = explode("|",$line);
                $conv[$i] = [$dat[0],$dat[1]];
                $i++;
            }
        }
        return $conv;        
    }

    ?>