<?php
    header("Content-Type:text/html; charset=utf-8");

	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}

    $user_id = $_SESSION["user_id"];
    $newnickname = $_POST["nickname"];
    $newemail = $_POST["email"];
    $newphone = $_POST["phone"];
    $link=require_once("../config.php");
    $sql = "update User set nickname = '$newnickname', email = '$newemail', phone = '$newphone' where user_id = '$user_id'";

    if (mysqli_query($link, $sql))
    {
        echo "<script>alert('修改成功!');
                window.location.href='./個人資料.php';
              </script>";
    }
?>
