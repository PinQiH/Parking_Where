<?php
    $fid = substr($_POST["bk"], 1);
    $searchtxt = $_POST["search"];
    $link = require_once("../config.php");
    $sql="DELETE FROM favorite WHERE favorite.f_id = $fid";
    mysqli_query($link,$sql);
    header('Location: ./喜好清單.php?searchtxt='. $searchtxt);
    exit;
?>