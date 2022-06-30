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
    $environment=$_POST["environment"];
    $ordering=$_POST["ordering"];
    $balance=$_POST["balance"];
    $message=$_POST["message"];
   
    if ((($_FILES["file0"]["type"] == "image/gif") || ($_FILES["file0"]["type"] == "image/jpeg") || ($_FILES["file0"]["type"] == "image/jpg") || ($_FILES["file0"]["type"] == "image/png"))  && ($_FILES["file0"]["size"] < 200000)) {
        if ($_FILES["file0"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file0"]["error"] . "<br />";
        } 
        else {
            if (file_exists("../../icon/停車場圖片/" . $_FILES["file0"]["name"])) {
                echo $_FILES["file0"]["name"] . " already exists. ";
            } 
            else {
                move_uploaded_file(
                    $_FILES["file0"]["tmp_name"],
                    "../../icon/停車場圖片/" . $_FILES["file0"]["name"]
                );
            }
        }
    } 
    
    
    $file = $_FILES["file0"]["name"];
    $link = require_once("../../config.php");
    $sql = "INSERT INTO `Comment` (`user_id`, `p_id`, `environment`, `ordering`, `balance`, `opinion`, `c_photo`) VALUES('".$user_id."','".$p_id."','".$environment."','".$ordering."','".$balance."','".$message."','".$file."')";
    
    if (mysqli_query($link, $sql)){
        $sql2="select * from comment ORDER BY c_id DESC LIMIT 1";
        $result2 = mysqli_query($link,$sql2);
        if (mysqli_num_rows($result2) > 0) {
            $row2 = mysqli_fetch_assoc($result2);            
            echo "<script>alert('評分成功!');
            window.location.href='../../使用者回報/對系統建議/對系統建議.php?p_id=$p_id&c_id=".$row2['c_id']."'</script>";                    
        }
    }
?>
