<!-- -->
<?php
    $recherche = $_POST['search'];
    $i =0;

    $lesChannels = file("../data/channel.csv");
    foreach ($lesChannels as $line) {
        $data = explode("#", $line);
        $channel = explode("|", $data[0]);
        $nameChannel = $channel[0];
        $admin = $channel[1];

        if (str_contains(strtolower($nameChannel), strtolower($recherche)) || trim($recherche)=="") {
            $i++;
            echo("<li id='$nameChannel' class='".($i%2==0?"even":"odd")."'>$nameChannel |</br> Admin : $admin");
            if(strcmp(trim($data[1]),"null")){
                echo("<img src='images/lock.png' class='icon'/>");
            }
            echo("</li>");
        }
    }

?>