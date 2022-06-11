<!--header avec menu de navigation-->
<script type="text/javascript" src="JS/simpleAjax.js"></script>
<script type="text/javascript" src="JS/init.js"></script>

<div id="container">
<div id="header" onclick="puissQuatre()">
<h1>Super projet PEIP2</h1>
</div>
<div id="nav">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
<?php
    if(!isset($connected) || !$connected){
        echo "<li><a href='login.php'>connection</a></li>";
        echo "<li><a href='signIn.php'>inscription</a></li>";
    }
?>
<?php
    $img='images/profil.png';
    if(isset($connected) && $connected){

        echo "<li><a href='profil.php'>$user</a></li>";
        echo "<li><img src=$img alt='icone de profil' id='monImg' onclick=chooseImg()>". "<input id='cheminImg' type='text' name='name' placeholder='chemin du fichier' style='visibility: hidden'>"."<input type='submit' id='boutonImg' onclick='appliquerImg()' style='visibility:hidden'></input>"."</li>";
        echo "<li><a href='php/logout.php'>déconnexion</a></li>";
    }
?>
</ul>
</div>