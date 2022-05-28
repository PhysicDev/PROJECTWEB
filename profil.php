<!-- pagede profil qui contiendra plusieurs statistiques à l'avenir -->
<?php 
$noAllow = true;
include("php/sessionManager.php");
?>
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
<div id="main">
    <?php 
        if(isset($connected) && $connected){
            echo "pseudo : ".$_SESSION['user']."<br>";
            echo "message envoyé : NaN <br>";
            echo "partie jouée : NaN <br>";
            echo "<a href='php/logout.php'>se deconnecter</a>";
        }
    ?>
</div>
</body>