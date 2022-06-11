<!-- page inutile pour meubler -->
<?php 
include("php/sessionManager.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
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
<h2>Contact</h2>
<p> vous pouvez nous contacter :
<ul>
<li> par mail : vincent.etud@gmail.com</li>
<li> par mail : maxime.azemard@gmail.com </li>
</li>
</ul>
</p>
</div>

<?php
        include 'messageBar.php';
    ?>
</div>
</body>
<script type="text/javascript" src="JS/init.js"></script>