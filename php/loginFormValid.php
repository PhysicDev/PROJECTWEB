<?php

$password = $_POST['password'];
$user= $_POST["pseudo"];

include("util.php");
$users = readUsers();

$password=hash("sha512",$password);
if(isset($users[$user]) && $users[$user]==$password){
    session_unset();
    session_reset();
    session_start();
    $_SESSION['user']=$user;
    echo('{"valid":true}');
}else{
    echo('{"valid":false}');
}

?>