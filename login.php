<!-- basic HTML page -->
<!DOCTYPE html>
<html>
<head>
<title>Main Page</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php include 'header.php';?>
<div>
<h2>Connexion :</h2>
<form action="index.php?connected='ok'" method="post" onsubmit="return checkform()" onreset="resetform()">
    <input type="text" name="login" placeholder="login" required></input>
    <input type="password" name="password" placeholder="password" required></input>
    <input type="password" name="password2" placeholder="confirm password" required></input>
    <input type="submit" value="submit"></input>
    <input type="reset" value="reset"></input>
</form>
</div>
</body>