<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}
	header("Content-Type:text/html; charset=utf-8");
	$c_id = $_GET['c_id'];
	$user_id = $_GET['user_id'];
	$p_id = $_GET['p_id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>檢舉評論</title>
		<meta charset="utf-8">
		
		<style>
			#whole{
				width:90%;
				height:10%;
				position:fixed;
				top:2%;
				margin-left:5%;
			}

			#left{
				width:10%;
				height:10%;
				position:fixed;
				top:5%;
				margin-left:5%;
			}

			#title{
				width:40%;
				height:10%;
				position:fixed;
				top:2%;
				margin-left:25%;
			}

			.buttom{ 	
				width:90%;
				height:7%;
				background-color:#408080;
				border-radius:10px;
				position:fixed;
				bottom:20%;
				margin-left:3.5%; 
				color:#ffff;
				font-size:170%;
				text-align: center;
			}


			.middle_2{
				width:100%;
				height:35%;
				position:absolute;
				top:35%;
				margin-left:10%;
				text-align:left;
				font-size: 130%;
				font-weight:lighter;
				vertical-align: center;
				border-radius: 20px;
				background-color: #F8F8F8;
				box-shadow:0 0 11px rgba(0, 0, 0, 0.322);
			}
			#form{
				height: 70%;
				width:80%;
				position: fixed;
				top: 20%;
				font-size: 5vw;
			}
			
			#first{
				height: 30%;
				width: 90%;
				font-size: 150%;
				position: fixed;
				margin-left: 10%;
			}
		</style>
	</head>

	<body>
		
		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">檢舉評論</h2></div>
		</div>

		
		<form action="report.php" method="POST">
			<input type="hidden" name="c_id" value="<?php echo $c_id;?>">
			<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
			<input type="hidden" name="p_id" value="<?php echo $p_id;?>">
			<div id="form">
				<div id="first">
					<div>請告訴我們檢舉的理由</div>
						<input type="radio" name="reason" value="資訊與實際情況不符"  checked="true"> 資訊與實際情況不符<br>
						<input type="radio" name="reason" value="沒有意義的留言"> 沒有意義的留言<br>
						<input type="radio" name="reason" value="沒有意義的照片"> 沒有意義的照片<br>
						<input type="radio" name="reason" value="其他..."> 其他...<br>
				</div>
				<textarea class="middle_2" id="message" name="message" placeholder="留言..."></textarea>
				<input type='submit' class="buttom" value='完成' id='btnTest' >
				</div>
			</div>
						
		</form>	 


		
		
		
	</body>
</html>