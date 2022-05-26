<!--formulaire d'inscription-->
<!DOCTYPE html>
<html>
<head>
<title>signIn</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript" src="JS/signIn.js"></script>
<script type="text/javascript" src="JS/simpleAjax.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'header.php';?>
<div>
<h2>Inscription :</h2>
<div id="signIn">
    <input id="pseudo" type="text" name="pseudo" placeholder="pseudo" required></input>
    <input id="password" type="password" name="password" placeholder="password" required></input>
    <input id="password2" type="password" name="password2" placeholder="confirm password" required></input>
    <input type="submit" value="submit" onclick="checkform();"></input>
    <input type="reset" value="reset" onclick="resetform();"></input>
</div>
</div>
<div id="error" style="visibility:hidden"></div>
</body>