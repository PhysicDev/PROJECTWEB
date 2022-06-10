<!--formulaire de connexion-->
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript" src="JS/simpleAjax.js"></script>
<script type="text/javascript" src="JS/login.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'header.php';?>
<div id="content">
    <h2>Connexion :</h2>
    <div class="form" id="login">
        <input id="pseudo" type="text" name="login" placeholder="pseudo"></input>
        <input id="password" type="password" name="password" placeholder="password"></input>
        <input class="button" type="submit" value="submit" onclick="checkform()"></input>
    </div>
    <div id="error" class="error" style="visibility:hidden"></div>
</div>
</body>