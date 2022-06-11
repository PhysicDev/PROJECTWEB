<!--header avec menu de navigation-->
<div id="container">
<div id="header">
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
    if(isset($connected) && $connected){
        echo "<li><a href='profil.php'>$user</a></li>";
        echo "<li><a href='php/logout.php'>déconnexion</a></li>";
    }
?>
</ul>
</div>