<div id="Lbar" class="bar">
    <?php
        //si l'utilisateur est connecté on affiche le bouton pour créer un salon de discussion

        if (isset($connected) && $connected) {
            
            include 'channelButton.php';
        }
    ?>
        <?php
            //on lit le fichier csv pour afficher la liste des salons de discussion
            $nbSalons = 0;
            $lesChannels = file("data/channel.csv");
            $nbSalons = count($lesChannels);
            echo("<p style='margin-left:10px;margin-top:20px'>il y a $nbSalons salons de discution" . "</p>" . "<ul id='channelList'>");
            $i = 0;
            foreach ($lesChannels as $channel) {
                $i++;
                $channel = explode("|", $channel);
                $nameChannel = $channel[0];
                $admin = $channel[1];
                //$nbSalons++;
                //le truc avec le $i c'est pour le style css.
                echo("<li id='$nameChannel' class='".($i%2==0?"even":"odd")."'>$nameChannel | Admin : $admin</li>");
            }

        ?>
    </ul>
</div>