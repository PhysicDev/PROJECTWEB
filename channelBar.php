<div id="Lbar" class="bar">
    <?php
        //si l'utilisateur est connecté on affiche le bouton pour créer un salon de discussion

        if (isset($connected) && $connected) {
            include 'channelButton.php';
            include 'recherche.php';
        }else{
            echo("vous devez être connecté pour créer des canaux");
        }
    ?>
        <?php
            //on lit le fichier csv pour afficher la liste des salons de discussion
            $nbSalons = 0;
            $lesChannels = file("data/channel.csv");
            $nbSalons = count($lesChannels);
            echo("<p style='margin-left:10px;margin-top:0px'>il y a <span id='nbSalons'>$nbSalons</span> salons de discution" . "</p>" . "<ul id='channelList'>");
            $i = 0;
            foreach ($lesChannels as $line) {
                $i++;
                $data = explode("#", $line);
                $channel = explode("|", $data[0]);
                $nameChannel = $channel[0];
                $admin = $channel[1];
                //$nbSalons++;
                //le truc avec le $i c'est pour le style css.
                echo("<li id='$nameChannel' class='".($i%2==0?"even":"odd")."'>$nameChannel |</br> Admin : $admin");
                if(strcmp(trim($data[1]),"null")){
                    echo("<img src='images/lock.png' class='icon'/>");
                }
                echo("</li>");
            }
        ?>
    </ul>
</div>