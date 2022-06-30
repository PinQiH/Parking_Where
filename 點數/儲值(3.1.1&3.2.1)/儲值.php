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

			#right {
				width:10%;
				height:10%;
				position:fixed;
				top:4%;
				margin-left:77%;
			}
	
			.buttom { 	
				width:90%;
				height:5%;
				background-color:#F8F8F8;
				border-radius:10px;
				position:fixed;
				bottom:5%;
				margin-left:3.5%; 
			}		

			img.pic1 {
			border-radius: 5vw;
			box-shadow:1vw 1vw 7vw gray;
			}

			.circle {
            width: 1vw;
            height: 20vw;
            border-radius: 30px;
            background:#F8F8F8;
      		}

			.link-top {
				width: 400%;
				height: 1px;
				border-top: solid #CCCCCC 1px;
				margin-left: -3%;
			}
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="title"><h2 style="text-align:center;">點數</h2></div>
			<div id="left" ><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
		</div>

		<table class="point">
			<tr>
				<th colspan="4"><a href="儲值2.php"><img class="pic1" src="credit.png" border="0" style="height:40vw; width:80vw;padding:3px; margin: 110px 20px 25px 23px"></th>				
			</tr>
			<tr>
					<th colspan="2" style="padding:3px; margin: 110px 20px 25px 23px"><font size="4" color="gray">剩餘點數</font></th>
					<th class=circle colspan="2">
						<a href="../確認點數(3.1.1)/確認點數(3.1.1).php" style="text-decoration:none;color:black;">
							<font size="5">
								<?php
									$conn=require_once('../../config.php');

									$sql="SELECT `point` FROM `user` where `user_id` = $user_id";
									$result = mysqli_query($link,$sql);

									while ($record = mysqli_fetch_row($result))
									{
										echo $record[0];
									}

								?>
							</font>
						</a>
					</th>	 
			</tr>
			<tr>
				<th colspan="4" align="left" height="90"><font size="4">超商儲值</font></th>
			</tr>
			<tr>
				<th align="left" ><a href="儲值2.php" style="text-decoration:none;color:black;"><img src="img1.png" style="height:20vw; width:20vw"></th>
				<th colspan="2" align="left"><a href="儲值2.php" style="text-decoration:none;color:black;">7-11</th>
				<th align="right"><font color="#408080" size="2">手續費每筆交易15元</font></th>
			</tr>
			<tr style="height:0.5px; width:80%;">
				<th>
					<div class="link-top"></div>
				</th>
			</tr>
			<tr>
				<th align="left" ><a href="儲值2.php" style="text-decoration:none;color:black;"><img src="Image_2@2x.png" style="height:20vw; width:20vw"></th>
				<th colspan="2" align="left"><a href="儲值2.php" style="text-decoration:none;color:black;">全家便利商店</th>
				<th align="right"><font color="#408080" size="2">手續費每筆交易15元</font></th>
			</tr>
			<tr style="height:0.5px; width:80%;">
				<th>
					<div class="link-top"></div>
				</th>
			</tr>
			<tr>
				<th align="left" ><a href="儲值2.php" style="text-decoration:none;color:black;"><img src="Image_3@2x.png" style="height:20vw; width:20vw"></th>
				<th colspan="2" align="left"><a href="儲值2.php" style="text-decoration:none;color:black;">萊爾富</th>
				<th align="right"><font color="#408080" size="2">手續費每筆交易15元</font></th>
			</tr>
		</table>	
			
		<table class="buttom">
			<tr>
				<th><a href="../../首頁/首頁(1.1.1).php"><img src="../../icon/導覽列icon/search_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../設定/設定.php"><img src="../../icon/導覽列icon/user_綠.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
		</table>
	</body>
	
</html>