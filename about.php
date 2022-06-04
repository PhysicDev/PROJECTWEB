<!-- page inutile pour meubler encore -->
<?php 
include("php/sessionManager.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>About</title>
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
<h2>what is this website ?</h2>
<p>
This is a website made for the PEIP2 web development course.
<br>
it has no purpose except to create a live chat with an ajax application
<br>
but i will maybe add a multiplayer connect4 game in the future.
</p>
</div>

<?php
        include 'messageBar.php';
    ?>
</div>
</body>