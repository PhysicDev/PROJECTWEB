<!-- pagede profil qui contiendra plusieurs statistiques à l'avenir -->
<?php 
$noAllow = true;
include("php/sessionManager.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Profil</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/sideBar.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'header.php';?>

<div id="main">
<div id="Lbar" class="bar">
    <h2>liste de vos canaux</h2>
<ul id='channelList'>
<?php
$_POST["search"] = "";
$_POST["admin"] = $user;
include ("php/requestSearch.php");
?>
</ul>
</div>
<div id="content">
    <?php 
        if(isset($connected) && $connected){
            echo "pseudo : ".$_SESSION['user']."<br>";
            echo "<a href='php/logout.php'>se deconnecter</a>";
        }
    ?>
</div>
</div>
</body>
<script type="text/javascript" src="JS/init.js"></script>