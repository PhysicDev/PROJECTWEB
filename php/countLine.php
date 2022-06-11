<?php
//parce que j'ai pas que ça à faire de relire tous mes fichiers pour compter les lignes
$nbLine = 0;
$files = scandir("./");
print_r($files);
foreach($files as $file){
    if($file != "." && $file != ".."){
        $dat = file_get_contents($file);
        $dat = explode("\n",$dat);
        foreach($dat as $line){
            if(strlen(trim($line)) > 0){
                $nbLine++;
            }
        }
        echo($nbLine."<br>");
    }
}echo($nbLine);
?>