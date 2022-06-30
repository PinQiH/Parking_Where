<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}

	if (isset($_SESSION["user_id"]))
	{
        $user_id = $_SESSION["user_id"];
	}

	header("Content-Type:text/html; charset=utf-8");

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
		echo "<script>alert('請先登入!');
				window.location.href='../../登入/登入.html';
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
				position:sticky;
				top:10px;
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
	
			.buttom { 	
				width:90%;
				height:5%;
				background-color:#F8F8F8;
				border-radius:10px;
				position:fixed;
				bottom:5%;
				margin-left:3.5%; 
			}
			.buttom2 { 	
				width:85%;
				height:7%;
				background-color:#408080;
				border-radius:10px;
				position:fixed;
				bottom:13%;
				left:8%;
			}	

			.circle {
				width: 60px;
				height: 60px;
				border-radius: 1em;
				background: #408080;
     		}

			.circle2 {
				width: 20vw;
				height: 15vw;
				border-radius: 20px;
				background: #F8F8F8;
        	}

			#form{
				height: 0px;
				width: 90%;
				position: relative;
				margin-left: 2%;
				overflow: hidden;
				vertical-align: middle;
			}

			#form2{
				height: 150px;
				width: 90%;
				position: relative;
				margin-left: 2%;
				overflow: hidden;
				vertical-align: middle;
			}

			.form1{ 
				bottom:20%;
				position: fixed;
				margin-left:30%;
			}


			#bkc {
				background: #408080;
				border:1px black none;
				font-size:120%;
				color:white;
			}

			#mid {
				position: relative;
				height: 470px;
				top: 90px;
				overflow: scroll;
			}

			.link-top {
				width: 620%;
				height: 1px;
				border-top: solid #CCCCCC 1px;
				margin-left: -10%;
			}
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="title"><h2 style="text-align:center;">點數明細</h2></div>
			<div id="left"><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
		</div>

		<div id="mid">
			<table id="form">
				<?php
					$conn=require_once('../../config.php');

					$sql="SELECT * FROM credit where `user_id` = $user_id";
					$sql1="SELECT `point` FROM `user` where `user_id` = $user_id";

					$result = mysqli_query($link,$sql);
					$result1 = mysqli_query($link,$sql1);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<th class="circle"><font size="5" color="white"><?php echo $row['cr_value']?></font></a></th>				
					<th colspan="2" align="left"><?php echo $row['cr_name']?></th>
					<th align="right"><font color="#AAAAAA" size="2"><?php echo $row['cr_date']?></font></th>
				</tr>
				<tr style="height:0.5px; width:80%;">
					<th>
						<div class="link-top"></div>
					</th>
				</tr>
				<?php
					}
				}
				?>
			</table>
		</div>

		<table id="form2">
			<tr class="form1">
				<th colspan="2"><font size="4" color="gray">剩餘點數</font></th>
				<th class="circle2" colspan="2">
					<font size="5">
						<?php
							while ($record1 = mysqli_fetch_row($result1))
							{
								echo $record1[0];
							}
						?>
					</font>
				</th>			
			</tr>
		</table>
		<?php
			{
                mysqli_close($conn);
            }
		?>

		<table class="buttom">
			<tr>
				<th><a href="../../首頁/首頁(1.1.1).php"><img src="../../icon/導覽列icon/search_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../設定/設定.php"><img src="../../icon/導覽列icon/user_綠.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
			<form class="buttom2" action="point.php" method="POST">
				<tr>
					<th><input type='submit' class="buttom2" value='折抵會員費' id="bkc"></button></th>
				</tr>
			</form>
		</table>
	</body>
</html>