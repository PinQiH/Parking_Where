<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}
	header("Content-Type:text/html; charset=utf-8");
	$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>導航</title>

		<link rel="icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">
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
			
			.first {
				margin-top: 30%;
				height:70%;
				width:90%;
				margin-left: 5%;
				margin-right: 5%;
				
			}

			#map {
				position: fixed;
				top: 35%;
				width: 90%;
				height: 50%;
				margin-left: 3%;
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

			#search {
				width: 50%;
				height: 120%;
				border-radius:10px; 
				color:white; 
				background-color: #408080;
			}		
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="title"><h2 style="text-align:center;">導航</h2>
				<?php
					$link = require_once("../../config.php");

					$sql2 ="select * from User where user_id='$user_id'";
					$result2 = mysqli_query($link, $sql2);

					$sql1 = "SELECT COUNT(*) FROM `parking_lot`";
					$result1 = mysqli_query($link, $sql1);
					$record1 = mysqli_fetch_row($result1);

					$sql = "select name from parking_lot";
					$result = mysqli_query($link, $sql);
				?>
			</div>

			<div id="right"><a href="../../個人資料/個人資料.php">
				<?php 
					while ($record2 = mysqli_fetch_row($result2))
					{
						if ($record2[7] != NULL)
						{
				?>
							<img src="../../icon/圖標小舖/<?php echo $record2[7];?>" border="0" style="height:40px; width:40px;border-radius:10px;">
				<?php 
						}
						else
						{
							echo '<img src="../../icon/圖標小舖/profile.png" border="0" style="height:30px; width:30px;">';
						}
					}
				?></a>
			</div>
		</div>
		
		<form action="map.php" id="demo" method="POST">
			<table class="first">
				<tr>
					<?php

						$lotarr = array();
						$i = 0;
						while ($record = mysqli_fetch_row($result))
						{
							$lotarr[$i] = $record[0];
							$i++;
						}
					?>
					<th height="80px">
						<select height="70px" id="name" name="name">
							<option>請選擇</option>	
							<?php
								for ($i = 0; $i < $record1[0]; $i++)
								{
									echo "<option value=";
									echo $lotarr[$i];
									echo ">";
									echo $lotarr[$i];
									echo '</option>';
								}
							?>
						</select>
					</th>	
				</tr>
				<tr>
					<th><button type="submit" id="search">搜尋路線</button></th>
				</tr>
			</table>
		</form>
		
		<div id="map">
			<?php
				if (isset($_GET["address"])==TRUE)
				{
					$address = $_GET["address"];
					echo "<iframe width='100%' height='100%' frameborder='0' style='border:0' loading='lazy' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyCphjRcCDXxAa0iWCesdsw3AMUMZEfdCTE&q=$address' allowfullscreen></iframe>";
				}
				else
				{
					echo "<iframe width='100%' height='100%' src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.9359786151017!2d121.43013241448115!3d25.036246644356492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7dd8be91eaf%3A0xe342a67d6574f896!2z5aSp5Li75pWZ6LyU5LuB5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1621167977052!5m2!1szh-TW!2stw'></iframe>";
				}
			?>
		</div>	

		<table class="buttom">
			<tr>
				<th><a href="../../首頁/首頁(1.1.1).php"><img src="../../icon/導覽列icon/search_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../../icon/導覽列icon/location-pin_綠.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../設定/設定.php"><img src="../../icon/導覽列icon/user_灰.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
		</table>
	</body>
</html>
