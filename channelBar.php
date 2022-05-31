<!--
    affiche la liste des salons de discussion
    dans une liste ul li

    si l'utilisateur est connecté, il peut créer un salon de discussion à l'aide d'un bouton qui sera affiché dans le haut de la div
-->
<div id="Lbar">
    <?php
        //si l'utilisateur est connecté on affiche le bouton pour créer un salon de discussion
    ?>
    <ul>
        <?php
            //on lit le fichier csv pour afficher la liste des salons de discussion
            $nbSalons = 0;
            echo("il y a $nbSalons salon de discution");

            //
             //   exemple d'element de liste : 
             //   <li><a href="channel.php?name= le nom du chanel"> nomDuChannel :: Admin : nomDuCreateur</a></li>
            //
        ?>
    </ul>
</div>