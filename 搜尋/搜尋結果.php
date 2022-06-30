<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
	}

	header("Content-Type:text/html; charset=utf-8");
	$link = require_once("../config.php");
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
	{
		$user_id = $_SESSION["user_id"];
		$sql4 ="select * from User where user_id='$user_id'";
		$result4 = mysqli_query($link, $sql4);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>搜尋結果</title>

		<link rel="icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">

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
				margin-left: 23%
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

			.search {
				margin-top: 30%;
			}

			#search {
				width: 45px;
				height: 45px;
				border-radius: 10px;
				border: none;
				background-color: #408080;
				vertical-align: middle;
			}

			#text {
				height: 40px;
				width: 70%;
				border-style:solid;
				border-radius: 10px;
				border-width: 1px;
				border-color: #EEEEEE;
				vertical-align: middle;
				padding-left: 10px;
				color: #666666
			}

			#lot_div {
				position: relative;
			}

			#mid {
				position: relative;
				height: 525px;
				top: 0px;
				overflow: scroll;
			}

			.lot {
				position: relative;
				height: 150px;
				width: 90%;
				margin-top: 40px;
				margin-left: auto;
				margin-right: auto;
				border-style: none;
				border-radius: 10px;
				background-color: #f8f8f8;
				vertical-align: middle;
				text-align: left;
				overflow: hidden;
			}

			.lot_img {
				height: 120px;
				padding-left: 5px;
				padding-right: 5px;
			}

			.color-lump {
				width: 20vw;
				height: 8vw;
				border-radius: 10px;
				background-color: #408080;
				margin-right: 5px;
				color: white;
				border: none;
				font-size: 15px;
			}

			.bookmark {
				width: 7vw;
				position: absolute;
				top: 0;
				right: 10%;
			}
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">搜尋結果</h2></div>
			<div id='right'>
				<?php
					if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
					{ 
						while ($record4 = mysqli_fetch_row($result4))
						{
				?>
							<a href='../個人資料/個人資料.php'><img src='../icon/圖標小舖/<?php echo $record4[7];?>' border='0' style='height:40px; width:40px; border-radius:10px;'>
				<?php 
						}
				?>
				<?php
					}
					else
					{
						echo "<a href='../登入/登入.html'><img src='../icon/圖標小舖/profile.png' border='0' style='height:30px; width:30px;'></a></div>";
					}
				?>
				</a>
			</div>
		</div>
		
		<?php
			$searchtxt = $_GET["searchtxt"];
		?>

		<div class="search">
			<form name="favorite">
					<p align="center">
						<input id="text" type="text" name="searchtxt" placeholder="搜尋" value=<?php echo $searchtxt; ?>>
						&nbsp;&nbsp;
						<button id="search" type="submit"><img class="" width="20vw" src="../icon/search_白.png"></button>
					</p>
			</form>
		</div>

		<div id="mid">
			<?php
				if (isset($searchtxt) == True)
				{
					$sql = "select * from parking_lot where name like '%". $searchtxt. "%' or address like'%". $searchtxt. "%'";
				}
				else
				{
					echo "<script>alert('Something wrong');
							window.location.href='../首頁/首頁(1.1.1).php';
						</script>"; 
				}

				$rs = mysqli_query($link, $sql);

				while ($record = mysqli_fetch_row($rs))
				{
					$favorite = 0;
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
						$sql_f="select * from favorite where user_id = ". $_SESSION["user_id"]. " and p_id = ". $record[0];
						$result_f = mysqli_query($link, $sql_f);
						$f_r = mysqli_fetch_row($result_f);

						if($f_r > 0){
							$favorite = 1;
						}
					}
					echo "<div id='lot_div'>";
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
					{
						echo "<a href='../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=$record[0]' class='list' style='text-decoration:none;'>";
					}
					else
					{
						echo "<a href='../登入/登入.html' class='list' style='text-decoration:none;'>";
					}
					echo '<table width="100%" class="lot">
								<tr>
									<td width="30%"><img class="lot_img" src="../icon/停車場圖片/'. $record[8]. '"></td>
									<td>
										<table width="100%">
											<tr>
												<td style="text-align:left; color: black;">';
													echo $record[1];
													echo '
												</td>
											</tr>
											<tr>
												<td>
													<table width="100%">
														<tr>
															<td>
																<table height="100%">
																	<tr height="50%">
																		<td><img class="ping" src="../icon/導覽列icon/location-pin_綠.png" width="15px"></td>
																	</tr>
																	<tr height="50%">
																		<td>&nbsp</td>
																	</tr>
																</table>
															</td>
															<td class="address" style="color: #AAAAAA;">';
																echo $record[2];
																echo '
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
									<td>
										<button class="color-lump">';
											echo $record[3];
											echo '
										</button>
									</td>
								</tr>
							</table>
						</a>
						<form method="post" action="./F_change.php">
							<input type="hidden" name="pid" value="'. $record[0]. '">
							<input type="hidden" name="favorite" value="'. $favorite. '">
							<input type=hidden name="search" value='. $searchtxt. '>
							<button class="bookmark" id="bk" type="submit" data-favorite="'. $favorite. '" style="border: none; background-color: #ffffff">';
									if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
										if($favorite == 1){
											echo '<img id="p'. $record[0]. '" onClick="changeImage(this)" class="bookmark" src="../icon/bookmark_green.png">';
										}
										else{
											echo '<img id="p'. $record[0]. '" onClick="changeImage(this)" class="bookmark" src="../icon/bookmark_white.png">';
										}
									}
					echo '</button>
						</form>';
							if (isset($_SESSION["loggedin"]) != 1 || $_SESSION["loggedin"] != true){
								echo '<a href="../登入/登入.html"><img class="bookmark" src="../icon/bookmark_white.png"></a>';
							}
					echo '</div>';
				}
				mysqli_close($link);
			?>
		</div>

		<table class="buttom">
			<tr>
				<th><a href="../首頁/首頁(1.1.1).php"><img src="../icon/導覽列icon/search_綠.png" border="0" style="height:20px; width:20px;"></a></th>
				<th>
					<?php
						if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
						{
							echo "<a href='../停車場詳細資訊/導航(2.1)/導航(2.1).php'>";
						}
						else
						{
							echo "<a href='../登入/登入.html'>";
						}
					?>
					<img src="../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a>
				</th>
				<th>
					<?php
						if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
						{
							echo "<a href='../設定/設定.php'>";
						}
						else
						{
							echo "<a href='../登入/登入.html'>";
						}
					?>
					<img src="../icon/導覽列icon/user_灰.png" border="0" style="height:20px; width:20px;"></a>
				</th>
			</tr>
		</table>		

		<script type="text/javascript">	
			function changeImage(Obj)
			{
				var p_id = Obj.id;
				if(document.querySelector("#" + p_id).dataset.favorite == 1)
				{
					document.getElementById(p_id).src = "../icon/bookmark_white.png";
					document.querySelector("#" + p_id).dataset.favorite = 0;
				}
				else
				{
					document.getElementById(p_id).src = "../icon/bookmark_green.png";
					document.querySelector("#" + p_id).dataset.favorite = 1;
				}
			}
		</script>
	</body>
</html>