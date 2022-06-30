<?php
header("Content-Type:text/html; charset=utf-8");

$conn=require_once("../../config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $c_id=$_POST["c_id"]; 
    
    $user_id=$_POST["user_id"];
    
    $reason=$_POST["reason"];
    
    $message=$_POST["message"];

    $p_id=$_POST["p_id"];
    
    $sql="INSERT INTO Reported (c_id, user_id, reason, message)VALUES('".$c_id."','".$user_id."','".$reason."','".$message."')";
    
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('檢舉成功!我們將於近日篩檢!');
                window.location.href='../../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=$p_id#charged';
              </script>";
    }
    else{
        echo "<script>alert('Error!');
                window.location.href='../../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=$p_id#charged';    
              </script>";  
        mysqli_error($conn);
    }
}
mysqli_close($conn);    
?>