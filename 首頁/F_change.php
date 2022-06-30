<?php
    if (session_status() === PHP_SESSION_NONE){
        session_start();
    }
    $fid = substr($_POST["bk"], 1);
    $pid = $_POST["pid"];
    $favorite = $_POST["favorite"];
    
    $link = require_once("../config.php");
    if($favorite == 1){
        $sql="DELETE FROM favorite WHERE favorite.f_id = $fid";
    }
    else{
        $sql="INSERT INTO favorite (f_id, p_id, user_id) VALUES (NULL, ". $pid. ", ". $_SESSION['user_id']. ")";
    }
    mysqli_query($link,$sql);
    header('Location: ./首頁(1.1.1).php');
    exit();
?>