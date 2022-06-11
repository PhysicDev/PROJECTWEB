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
    <link rel="icon" href="images/chat.png" />
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
<script type="text/javascript" src="JS/profil.js"></script>
<div id="content" style="text-align:center">
    <?php 
    $img='images/profil.png';
        if(isset($connected) && $connected){
            if(file_exists('images/profil/'.$user.'.png')){
                $img='images/profil/'.$user.'.png';
            }
            else if(file_exists('images/profil/'.$user.'.jpg')){
                $img='images/profil/'.$user.'.jpg';
            }
            else if(file_exists('images/profil/'.$user.'.jpeg')){
                $img='images/profil/'.$user.'.jpeg';
            }
            echo "pseudo : ".$_SESSION['user']."<br>";
            echo "<a href='php/logout.php'>se deconnecter</a>";
            
            echo "
                <br>
                  <img src=$img alt='icone de profil' id='monImg' onclick=chooseImg()>
                  <form action='php/requestImg.php' method='post' id='profilPic' enctype='multipart/form-data'>
                    <input id='cheminImg' type='file' name='data' style='visibility: hidden'>
                    <input type='submit' id='boutonImg' onclick='appliquerImg()' style='visibility:hidden'>
                  </form>";
        }
    ?>
</div>
</div>
</body>
<script type="text/javascript" src="JS/init.js"></script>