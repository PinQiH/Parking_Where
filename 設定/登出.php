<?php 
    session_start(); 
    $_SESSION = array(); 
    session_destroy(); 
    header('location:../首頁/首頁(1.1.1).php'); 
?>
