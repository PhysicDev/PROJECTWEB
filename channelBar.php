<!--
    affiche la liste des salons de discussion
    dans une liste ul li

    si l'utilisateur est connecté, il peut créer un salon de discussion à l'aide d'un bouton qui sera affiché dans le haut de la div
-->
<div id="Lbar" class="bar">
    <?php
        //si l'utilisateur est connecté on affiche le bouton pour créer un salon de discussion

        if (isset($connected) && $connected) {
            
            include 'channelButton.php';
            //echo '<button class="button" onclick="showChannel()">Créer un salon de discussion</button>';
        }
    ?>
        <?php
            //on lit le fichier csv pour afficher la liste des salons de discussion
            $nbSalons = 0;

            //
             //   exemple d'element de liste : 
             //   <li><a href="channel.php?name= le nom du chanel"> nomDuChannel :: Admin : nomDuCreateur</a></li>
            //

            $lesChannels = file("data/channel.csv");
            $nbSalons = count($lesChannels);
            echo("<p style='margin-left:10px;margin-top:20px'>il y a $nbSalons salons de discution" . "</p>" . "<ul id='channelList'>");
            foreach ($lesChannels as $channel) {
                $channel = explode("|", $channel);
                $nameChannel = $channel[0];
                $admin = $channel[1];
                //$nbSalons++;
                echo("<li>$nameChannel | Admin : $admin</li>");
            }
           
           


        ?>
    </ul>
</div>