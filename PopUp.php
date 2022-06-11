<!--formulaire pour afficher des messages (ne sertr que pour l'inscription pour l'instant) -->
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script type="text/javascript" src="JS/login.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="icon" href="images/chat.png" />
</head>
<body>
<div>
    <?php
    if(!isset($_GET["type"])){
    echo'
<h2>Bienvenue !</h2>
votre inscription a réussi, vous pouvez vous <a href="login.php">connecter</a>';
    }
    else if($_GET["type"]=="channel"){
    echo'
<h2>nouveau Canal créé avec succès</h2>
<a href="index.php">Retour à l\'accueil </a>';
}

?>
</div>
</body>