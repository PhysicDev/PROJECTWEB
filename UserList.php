<?php
    $file = fopen("data/users.csv", "r");
    $users = array();
    $lines = explode("\n", fread($file, filesize("data/users.csv")));
    foreach($lines as $line){
        //check if the line is empty
        if(!empty($line)){
            $dat = explode("|",$line);
            echo"$dat[0]";
        }
    }
    fclose($file);   
?>