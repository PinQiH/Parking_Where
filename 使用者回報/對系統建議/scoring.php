<?php
    if (session_status() === PHP_SESSION_NONE) 
	{
		session_start();
	}

    if (isset($_SESSION["user_id"]))
    {
        $user_id = $_SESSION["user_id"];
    }

    $p_id = $_POST["p_id"];
    $c_id = $_POST["c_id"];
    $message = $_POST["message"];    

    $link = require_once("../../config.php");
    
    $sql="update comment set advice = '$message', time = cast(sysdate() as datetime) where p_id = '$p_id' and c_id='$c_id'";

    $sql2="select `point` from user where `user_id`='$user_id'";
    $result1 = mysqli_query($link,$sql2);

    $sql4="INSERT INTO `Credit` (`user_id`, `cr_value`, `cr_name`) VALUES('".$user_id."','+2','評分成功')";
    $result4 = mysqli_query($link,$sql4);

    while ($record = mysqli_fetch_row($result1))
    {
        $record[0] += 2;
        $sql3="UPDATE user SET `point` = '$record[0]' WHERE `user_id` ='$user_id'";
        $result2 = mysqli_query($link,$sql3);
    }
    if (mysqli_query($link, $sql))
    {
        echo "<script>
                alert('評分成功!');
                window.location.href='../../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=$p_id#loot';
              </script>";
    }
    mysqli_close($conn);   
?>