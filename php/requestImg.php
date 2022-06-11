<?php
    $noAllow = true;
    include("../php/sessionManager.php");

    print_r($_FILES);
    $path = "../images/profil/".$user.".".(explode("/",$_FILES['data']['type'])[1]);
    echo($path);

    if ($_FILES["data"]["error"] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["data"]["tmp_name"];
        echo($tmp_name);
        move_uploaded_file($tmp_name, $path);
    }

    header("Location: ../profil.php");

?>