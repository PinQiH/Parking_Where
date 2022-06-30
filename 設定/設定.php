<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}
	header("Content-Type:text/html; charset=utf-8");
	$user_id = $_SESSION["user_id"];
	$link=require_once("../config.php");
	$sql = "select * from user where user_id='". $user_id. "'";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>設定</title>

		<link rel="icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">

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
			
			.personal {
				height:10%;
				width:90%;
				background-color:#f8f8f8;
				border-radius:5px;
				position:fixed;
				top:15%;
				margin-left:3.5%; 
			}
			
			#abc {
				height:50%;
				width:90%;
				background-color:#f8f8f8;
				color:#666666;
				border-radius:5px;
				position:fixed;
				top:27%;
				margin-left:3.5%;
			}

			.setting {
				height:45%;
				width:100%;
				background-color:#f8f8f8;
				color:#666666;
				 
			}
			
			.logout {
				width:90%;
				height:7%;
				background-color:#408080;
				border-radius:10px;
				color:white;
				position:fixed;
				top:80%;
				margin-left:3.5%; 
				font-size:5vw;
			}
	
			.buttom { 	
				width:90%;
				height:5%;
				background-color:#F8F8F8;
				border-radius:10px;
				text-align:center;
				position:fixed;
				bottom:5%;
				margin-left:3.5%; 
			}	

			.link-top {
				width: 500%;
				height: 1px;
				border-top: solid #CCCCCC 1px;
				margin-left: 20%;
			}
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="title"><h2 style="text-align:center;">設定</h2></div>
		</div>

		<a href="../個人資料/個人資料.php">
			<table class="personal">
				<tr>
					<th>
						<?php
							$rs = mysqli_query($link, $sql);
							while ($record = mysqli_fetch_row($rs))
							{
								if ($record[7] != NULL)
								{
						?>
									<img src="../icon/圖標小舖/<?php echo $record[7];?>" border="0" style="height:40px; width:40px;border-radius:10px;">
						<?php 
								}
								else
								{
									echo '<img src="../icon/圖標小舖/profile.png" border="0" style="height:30px; width:30px;">';
								}
							}
						?>
					</th>
					<th>
						<table>
							<tr style="text-align:left;">
								<th style="color:black;">
									<?php 
										$rs = mysqli_query($link, $sql);
										while ($record = mysqli_fetch_row($rs))
										{
											echo $record[2];
										}
									?>
								</th>
							</tr>
							<tr>
								<td style="color:#AAAAAA;">
									<?php 
										$rs = mysqli_query($link, $sql);
										while ($record = mysqli_fetch_row($rs))
										{
											echo $record[3];
										}
									?>
								</td>
							</tr>
						</table>
					</th>
					<th><img src="../icon/right arrow.png" border="0" style="height:20px; width:20px;"></th>
				</tr>
			</table>	
		</a>

		<div id="abc">
			<table class="setting">			
				<tr style="height:20px;">
					<th><img src="../icon/設定icon/dollar.png" border="0" style="height:20px; width:20px;"></th>
					<th>
						<a href="../點數/儲值(3.1.1&3.2.1)/儲值.php" style='text-decoration:none; color:black'>
							<table>
								<tr style="text-align:left;">
									<th>點數</th>
								</tr>
							</table>
						</a>
					</th>
					<th><a href="../點數/儲值(3.1.1&3.2.1)/儲值.php"><img src="../icon/right arrow.png" border="0" style="height:17px; width:17px;"></a></th>
				</tr>
				<tr style="height:0.5px; width:80%;">
					<th>
						<div class="link-top"></div>
					</th>
				</tr>
				<tr style="height:20px;">
					<th><img src="../icon/設定icon/like.png" border="0" style="height:20px; width:20px;"></th>
					<th>
						<a href="../喜好清單/喜好清單.php?searchtxt=" style='text-decoration:none; color:black'>
							<table>
								<tr style="text-align:left;">
									<th>喜好清單</th>
								</tr>
							</table>
						</a>
					</th>
					<th><a href="../喜好清單/喜好清單.php?searchtxt="><img src="../icon/right arrow.png" border="0" style="height:17px; width:17px;"></a></th>
				</tr>
				<tr style="height:0.5px; width:80%;">
					<th>
						<div class="link-top"></div>
					</th>
				</tr>
				<tr style="height:20px;">
					<th><img src="../icon/設定icon/shopping-cart.png" border="0" style="height:20px; width:20px;"></th>
					<th>
						<a href="../圖標小舖/圖標小舖.php" style='text-decoration:none; color:black'>
							<table>
								<tr style="text-align:left;">
									<th>圖標小舖</th>
								</tr>
							</table>
						</a>
					</th>
					<th><a href="../圖標小舖/圖標小舖.php"><img src="../icon/right arrow.png" border="0" style="height:17px; width:17px;"></a></th>
				</tr>
				<tr style="height:0.5px; width:80%;">
					<th>
						<div class="link-top"></div>
					</th>
				</tr>
			</table>
		</div>
		
		<a href="./登出.php">
			<button class="logout" style="border: 1px none;">登出</button>
		</a>
		
		<table class="buttom">
			<tr>
				<th><a href="../首頁/首頁(1.1.1).php"><img src="../icon/導覽列icon/search_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../設定/設定.php"><img src="../icon/導覽列icon/user_綠.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
		</table>
	</body>
</html>