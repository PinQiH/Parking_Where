<?php
    if (session_status() === PHP_SESSION_NONE){
		session_start();
	}
    $link = require_once("../config.php");
    $iconid = $_POST["iconid"];
    if($_POST["method"] != "loot"){
        if($_POST["method"] != "charged"){
            $sql="select point from user where user_id=". $_SESSION['user_id']. "";
            $result = mysqli_query($link,$sql);
            while ($record = mysqli_fetch_row($result))
            {
                $record[0] -= 5;
                if ($record[0] < 0)
                {
                    echo "<script>alert('點數不足！');
                            window.location.href='./圖標小舖.php';
            　　　        </script>";
                }
                else
                {
                    $sql1="update user set point = '$record[0]' where user_id =". $_SESSION['user_id']. "";
                    $result1 = mysqli_query($link,$sql1);

                    $sql2="insert into credit (user_id, cr_value, cr_name) VALUES(". $_SESSION['user_id']. ",'-5','購買圖標')";
                    $result2 = mysqli_query($link,$sql2);

                    $sql_i_loot = "select icon_loot from user where user_id = ". $_SESSION['user_id']. "";
                    $rs_i_loot = mysqli_query($link,$sql_i_loot);
                    $i_loot_r = mysqli_fetch_row($rs_i_loot);
                    $icon_loot = $i_loot_r[0].$iconid.', ';
                    $sql_i_loot_up = "update user set icon_loot = '". $icon_loot. "' where user_id = ". $_SESSION['user_id']. "";
                    mysqli_query($link,$sql_i_loot_up);
                }
            }
        }
        else{
            if($_SESSION["authority"] == 1){
                $sql_i_loot = "select icon_loot from user where user_id = ". $_SESSION['user_id']. "";
                $rs_i_loot = mysqli_query($link,$sql_i_loot);
                $i_loot_r = mysqli_fetch_row($rs_i_loot);
                $icon_loot = $i_loot_r[0].$iconid.', ';
                $sql_i_loot_up = "update user set icon_loot = '". $icon_loot. "' where user_id = ". $_SESSION['user_id']. "";
                mysqli_query($link,$sql_i_loot_up);
            }
            else{
                echo "<script>alert('您不是付費會員！');
                    window.location.href='./圖標小舖.php';
                    </script>";
                exit;
            }
        }
    }
    $sql_icon_name = "select i_photo from icon where i_id = ". $iconid. "";
    $rs_i_name = mysqli_query($link,$sql_icon_name);
    $icon_name = mysqli_fetch_row($rs_i_name);

    $sql="update user set icon_id = '". $icon_name[0]. "' where user_id = ". $_SESSION['user_id']. "";
    echo "<script>alert('更換成功！');
            window.location.href='./圖標小舖.php';
            </script>";
    mysqli_query($link,$sql);
    exit;
?>