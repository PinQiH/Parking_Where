<?php
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    $pid = $_POST["pid"];
    $favorite = $_POST["favorite"];
    $searchtxt = $_POST["search"];
    
    $link = require_once("../config.php");
    if($favorite == 1){
        $sql="DELETE FROM favorite WHERE p_id = $pid and user_id = ". $_SESSION['user_id'];
    }
    else{
        $sql="INSERT INTO favorite (f_id, p_id, user_id) VALUES (NULL, ". $pid. ", ". $_SESSION['user_id']. ")";
    }
    mysqli_query($link,$sql);
    header('Location: ./搜尋結果.php?searchtxt='. $searchtxt);
    exit();
?>