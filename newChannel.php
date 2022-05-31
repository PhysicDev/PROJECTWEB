<!--formulaire d'ajout des channels-->
<?php 
$noAllow = true;
include("php/sessionManager.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>AddChannel</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript" src="JS/simpleAjax.js"></script>
<script type="text/javascript" src="JS/channel.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'header.php';?>
<div id="content">
    <h2>Nouveau canal :</h2>
    <div class="form" id="channel">
        <input id="name" type="text" name="channel" placeholder="nom du canal"></input>
        <input class="button" type="submit" value="submit" onclick="checkform()"></input>
    </div>
    <div id="error" style="visibility:hidden"></div>
</div>
</body>