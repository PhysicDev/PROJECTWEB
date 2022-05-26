<!--formulaire de connexion-->
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript" src="JS/login.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'header.php';?>
<div>
<h2>Connexion :</h2>
<form id="login" action="index.php?connected='ok'" method="post" onsubmit="return checkform()" onreset="resetform()">
    <input type="text" name="login" placeholder="pseudo" required ></input>
    <input type="password" name="password" placeholder="password" required></input>
    <input type="password" name="password2" placeholder="confirm password" required></input>
    <input type="submit" value="submit"></input>
    <input type="reset" value="reset"></input>
</form>
</div id="error" style="visibility:hidden">
<div>
</div>
</body>