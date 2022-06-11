<!-- page inutile pour meubler encore -->
<?php 
include("php/sessionManager.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/sideBar.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="icon" href="images/chat.png" />
</head>
<body>
<?php
    include 'header.php';
?>
<div id="main">
    <?php
        include 'channelBar.php';
    ?>
<div id="content">
<h2>c'est quoi ce site web ?</h2>
<p>
Ceci est un site web crée pour le projet web de Peip2.
<br>
<br>
Le but de ce site est de proposer des canaux de discution pour les utilisateurs.
Vous pouvez créer des channels après vous être connecté 
<br>
<br>
Si vous ne renseignez pas de mot de passe dans votre canal, il sera public et tout le monde pourra le rejoindre.
<br>
Si vous placez un mot de passe dans votre canal, seul les utilisateurs qui ont le mot de passe pourront le rejoindre, voir les messages et discutter.
<br>
<br>
Pour rejoindre un canal, cliquez sur le nom du canal.
<br>
Si vous êtes le dernier utilisateur à quitter un canal, ce dernier sera supprimé.
<br>
Pour gerer vos canaux, vous pouvez aller sur votre page de profil.
</p>
<p style="color:#ffffff;">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    un de mes vieux projet est caché sur le site.
</p>
</div>
<?php
        include 'messageBar.php';
    ?>
</div>
</body>
<script type="text/javascript" src="JS/init.js"></script>