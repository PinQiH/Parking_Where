<?php
define('DB_SERVER', '220.132.243.142:3306');
define('DB_USERNAME', 'sa1');
define('DB_PASSWORD', '123');
define('DB_NAME', 'SA');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// 輸入中文也OK的編碼
mysqli_query($link, 'SET NAMES utf8');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    return $link;
}
?>