<!-- basic HTML page -->
<?php 
include("php/sessionManager.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
<h2>Page principale</h2>
<p>
Ceci est la page principale du site</br>
pour avoir plus d'information sur le site vous pouvez aller sur la page "About"
<br>
<br>
le code du site est disponible sur <a href="https://github.com/PhysicDev/PROJECTWEB">github</a>
</p>
</div>

<?php
        include 'messageBar.php';
    ?>
</div>
</body>
<script type="text/javascript" src="JS/init.js"></script>