<?php
/*
    $pathNewImg = $_POST['cheminImg'];
    $chemin = explode("\\", $pathNewImg);
    $leBonChemin="";
    for ($i=0; $i < count($chemin)-1; $i++) {
        $leBonChemin .= $chemin[$i]."/";
    }
    $leBonChemin .= $chemin[count($chemin)];
    echo $leBonChemin;
    */

    $pathNewImg = $_POST['cheminImg'];
    $leBonChemin = "images/" . $pathNewImg;

    if ($pathNewImg==""){
        $leBonChemin = "images/profil.png";
    }

    echo $leBonChemin;
?>