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
<li><a href="login.php">Login</a></li>
<li><a href="signIn.php">Sign in</a></li>
<?php
if(isset($connected) && $connected){
    echo "<li><a href='profil.php'>$user</a></li>";
    echo "<li><a href='php/logout.php'>Logout</a></li>";
}
?>
</ul>
</div>