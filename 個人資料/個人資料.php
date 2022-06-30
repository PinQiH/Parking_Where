<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}
	header("Content-Type:text/html; charset=utf-8");
	$user_id = $_SESSION["user_id"];
	$link=require_once("../config.php");
	$sql = "select * from User where user_id='$user_id'";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>個人資料</title>

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
				height:40%;
				width:90vw;
				border-radius:5px;
				position:fixed;
				top:15%;
				margin-left:3.5%; 
			}
			
			.change {
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

			.ID {
				width:95%;
				border-radius:10px;
				border:1px gray solid;
				background-color:white;
				margin-left: 2.5%;
				position:relative;
				top:8%;
			}
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">個人資料</h2></div>
		</div>
		
		<table class="personal">
			<tr>
				<th colspan="2">
					<?php 
						$rs = mysqli_query($link, $sql);
						while ($record = mysqli_fetch_row($rs))
						{
							if ($record[7] != NULL)
							{
					?>
								<img src="../icon/圖標小舖/<?php echo $record[7];?>" border="0" style="height:80px; width:80px;border-radius:10px;">
					<?php 
							}
							else
							{
								echo '<img src="../icon/圖標小舖/profile.png" border="0" style="height:80px; width:80px;">';
							}
						}
					?>
				</th>
			</tr>
			<tr>
				<th>
					<table style="margin-left: 30%;">
						<tr>
							<th style="width:10%;text-align:left;">暱稱:</th>
							<th style="width:20%;text-align:left;">
								<?php 
									$rs = mysqli_query($link, $sql);
									while ($record = mysqli_fetch_row($rs))
									{
										echo $record[2];
									}
								?>
							</th>
						</tr>
					</table>
				</th>
			</tr>
			<tr>
				<th>
					<table class="ID">
						<tr>
							<th style="width:20%;"><img src="../個人資料/ID15706712691586787867-128-rem.png" border="0" style="height:20px; width:20px;"></th>
							<th style="width:30%;text-align:left;">使用者ID:</th>
							<th style="width:50%;text-align:left;">
								<?php 
									$user_id = $_SESSION["user_id"];
									echo $user_id;
								?>
							</th>
						</tr>
					</table>
				</th>
			</tr>
			<tr>
				<th>
					<table class="ID">
						<tr>
							<th style="width:20%;"><img src="../個人資料/ID11082093271551939477-128-rem.png" border="0" style="height:20px; width:20px;"></th>
							<th style="width:30%;text-align:left;">E-mail:</th>
							<th style="width:50%;text-align:left;">
								<?php 
									$rs = mysqli_query($link, $sql);
									while ($record = mysqli_fetch_row($rs))
									{
										echo $record[3];
									}
								?>
							</th>
						</tr>
					</table>					
				</th>
			</tr>
			<tr>
				<th>				
					<table class="ID">
						<tr>
							<th style="width:20%;"><img src="../個人資料/ID3692062861554126465-128-remo.png" border="0" style="height:20px; width:20px;"></th>
							<th style="width:30%;text-align:left;">手機/電話:</th>
							<th style="width:50%;text-align:left;">
								<?php 
									$rs = mysqli_query($link, $sql);
									while ($record = mysqli_fetch_row($rs))
									{
										echo $record[4];
									}
								?>
							</th>
						</tr>
					</table>			
				</th>
			</tr>
			<tr>
				<th>
					<table class="ID">
						<tr>
							<th style="width:20%;"><img src="../個人資料/noun_VIP_3606268-removebg-prev@2x.png" border="0" style="height:20px; width:20px;"></th>
							<th style="width:30%;text-align:left;">會員權限:</th>
							<th style="width:50%;text-align:left;">
								<?php 
									$authority = $_SESSION["authority"];
									if ($authority == 0)
									{
										echo "一般會員";
									}
									else
									{
										echo "付費會員";
									}
								?>
							</th>
						</tr>
					</table>			
				</th>
			</tr>
		</table>
		<a href="edit.php">
			<button class="change" style="border: 1px none;">編輯</button>
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