<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}

	if (isset($_SESSION["user_id"]))
	{
        $user_id = $_SESSION["user_id"];
	}
	header("Content-Type:text/html; charset=utf-8");

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true) {
		echo "<script>alert('請先登入!');
				window.location.href='../登入/登入.html';
			　</script>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>儲值</title>

		<link rel="icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">

		<style>
			#whole {
				width: 90%;
				height:10%;
				position:fixed;
				top:2%;
				margin-left:5%; 
			}

			#left {
				width:10%;
				height:10%;
				position:fixed;
				top:5%;
				margin-left:5%; 
			}

			#title {
				width:40%;
				height:10%;
				position:fixed;
				top:2%;
				margin-left: 23%;
			}
			#money{
				width:150%;
				height:10%;
				border:1px;
				position:fixed;
				top:15%;
				margin-left: 24%;	
			}
			.buttom{ 	
				width:70%;
				height:7%;
				background-color:#408080;
				border-radius:10px;
				position:fixed;
				bottom: 55%;
				margin-left:13%; 
				color:#ffff;
				font-size:170%;
				text-align: center;
			}

		</style>
	</head>

	<body>
		<div id="whole">
			<div id="title"><h2 style="text-align:center;">儲值</h2></div>
			<div id="left" ><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
		</div>
		
		<form action="credit.php" method="POST">
			<div id="money">
			<p><font size="5">請選擇儲值金額</font><p>
			<select name="credit" style="font-size:20px; margin-left:2%; padding-right:2%;">
				<option>請選擇金額</option>
				<option>50</option>
				<option>150</option>
				<option>200</option>
				<option>300</option>
				<option>500</option>
			</select>		
			</div>
		<input type='submit' class="buttom" value='完成'>
		</form>
	</body>
	
</html>