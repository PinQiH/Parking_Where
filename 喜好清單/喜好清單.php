<!DOCTYPE html>
<?php
	if (session_status() === PHP_SESSION_NONE){
		session_start();
	}
	header("Content-Type:text/html; charset=utf-8");
	
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
		echo "<script>alert('請先登入!');
			window.location.href='../登入/登入.html';
			</script>";
	}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>喜好清單</title>

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
				width: 12vw;
				height: 12vw;
				border-radius: 3vw;
				border: none;
				background-color: #408080;
				vertical-align: middle;
			}

			#text {
				height: 10vw;
				width: 70%;
				border-style:solid;
				border-radius: 3vw;
				border-width: 0.5vw;
				border-color: #EEEEEE;
				vertical-align: middle;
				padding-left: 3vw;
				color: #666666
			}

			.lot_div {
				position: relative;
			}

			.lot {
				height: 15vh;
				width: 90%;
				margin-top: 2vh;
				margin-left: auto;
				margin-right: auto;
				border-style: none;
				border-radius: 3vw;
				background-color: #f8f8f8;
				vertical-align: middle;
				text-align: left;
			}

			.list {
				text-decoration: none;
				position: inherit;
			}

			.lot_img {
				vertical-align: middle;
				height: 13vh;
				padding-left: 1vw;
				padding-right: 1vw;
			}

			.name {
				font-size: 2vw;
				width: 50%;
			}
			 
			#mid {
				position: relative;
				height: 525px;
				top: 0px;
				overflow: scroll;
			}

			.address {
				color: #AAAAAA;
				font-size: 4vw;
			}

			.color-lump {
				width: 15vw;
				height: 7.5vw;
				border-radius: 3vw;
				background-color: #408080;
				margin-right: 1vw;
				color: white;
				border: none;
				font-size: 4vw;
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
			<div id="title"><h2 style="text-align:center;">喜好清單</h2></div>
			<div id="left"><a href="../設定/設定.php"><img src="../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
		</div>

		<?php
			$searchtxt = "";
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
			$link = require_once("../config.php");
			if (isset($searchtxt) == True){
				$sql = "select f_id, p_id, name, address, price, p_photo_s from parking_lot inner join favorite using (p_id) where user_id = ". $_SESSION['user_id']. " and (name like '%". $searchtxt. "%' or address like'%". $searchtxt. "%')";
			}
			else{
				$sql = "select f_id, p_id, name, address, price, p_photo_s from parking_lot inner join favorite using (p_id) where user_id = ". $_SESSION['user_id'];
			}

			$rs = mysqli_query($link, $sql);
			while ($record = mysqli_fetch_row($rs)){
				echo "<div class='lot_div'>
					<a href='../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=". $record[1]. "' class='list' style='text-decoration:none;'>";
				echo '<table width="100%" class="lot">
							<tr>
								<td width="30%"><img class="lot_img" src="../icon/停車場圖片/'. $record[5]. '"></td>
								<td>
									<table width="100%">
										<tr>
											<td style="text-align:left; color: black;">';
												echo $record[2];
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
															echo $record[3];
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
										echo $record[4];
										echo '
									</button>
								</td>
							</tr>
						</table>
					</a>
					
					<form method="post" action="F_Delete.php">
						<button class="bookmark" value="f'. $record[0]. '" name="bk" type="submit" data-favorite="1" style="border: none; background-color: #f8f8f8"><img id="f'. $record[0]. '" onClick="changeImage(this)" class="bookmark" src="../icon/bookmark_green.png"></button>
						<input type=hidden name="search" value='. $searchtxt. '>
					</form>
				</div>';
			}
			mysqli_close($link);
        ?>
		</div>
		<table class="buttom">
			<tr>
				<th><a href="../首頁/首頁(1.1.1).php"><img src="../icon/導覽列icon/search_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../設定/設定.php"><img src="../icon/導覽列icon/user_綠.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
		</table>
	</body>
	
	<script type="text/javascript">
		
		function changeImage(Obj){
			var f_id = Obj.id;
			if(document.querySelector("#" + f_id).dataset.favorite == 1){
				document.getElementById(f_id).src = "../icon/bookmark_white.png";
				document.querySelector("#" + f_id).dataset.favorite = 0;
			}
			else{
				document.getElementById(f_id).src = "../icon/bookmark_green.png";
				document.querySelector("#" + f_id).dataset.favorite = 1;
			}
		}

	</script>
</html>