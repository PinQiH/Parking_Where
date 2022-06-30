<?php
	if (session_status() === PHP_SESSION_NONE) 
	{
		session_start();
	}

	header("Content-Type:text/html; charset=utf-8");
	$link = require_once("../config.php");
                
	$sql = "select * from Parking_Lot where name = '輔大醫院停車場'"; //記得改
	$result = mysqli_query($link, $sql);

	$sql2 = "select * from Parking_Lot";
	$result2 = mysqli_query($link, $sql2);

	$sql3 = "SELECT COUNT(*) FROM `parking_lot`";
	$result3 = mysqli_query($link, $sql3);
	$record3 = mysqli_fetch_row($result3);

	$favorite = 0;
	$f_id = 0;

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
	{
		$user_id = $_SESSION["user_id"];
		$sql4 ="select * from User where user_id='$user_id'";
		$result4 = mysqli_query($link, $sql4);
		$result_p = mysqli_query($link, $sql);
		$p_r = mysqli_fetch_row($result_p);
		$p_id = $p_r[0];
		$sql_f="select * from favorite where user_id = ". $user_id. " and p_id = ". $p_r[0];
		$result_f = mysqli_query($link, $sql_f);
		$f_r = mysqli_fetch_row($result_f);
		if($f_r > 0){
			$favorite = 1;
			$f_id = $f_r[0];
		}

	}
	else{
		$user_id = 0;
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>首頁</title>

		<link rel="icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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
				top:0%;
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

			#theme {
				position: fixed;
				margin-left:5%;
				top: 10%;
				overflow: visible;
			}	

			.search {
				margin-top: 45%;	
			}

			#search {
				width: 12vw;
				height: 12vw;
				border-radius: 10px;
				border: none;
				background-color: #408080;
				vertical-align: middle;
			}

			#text {
				height: 10vw;
				width: 70%;
				border-style:solid;
				border-radius: 10px;
				border-width: 1px;
				border-color: #EEEEEE;
				vertical-align: middle;
				padding-left: 10px;
				color: #666666
			}

			.personal {
				height:15%;
				width:90%;
				background-color:#f8f8f8;
				border-radius:5px;
				position:fixed;
				top:33%;
				margin-left:3.5%; 
			}

			input[type="image"] {
				width: 7vw;
				position: absolute;
				top: 33%;
				right: 10%;
			}

			#where {
				position:fixed;
				top:50%;
				margin-left:3.5%; 
			}

			#wrap {
				height:27%;
				width:90%;
				border-radius:5px;
				position:fixed;
				top:58%;
				margin-left:3.5%; 
				margin-right: 3.5%;
			}
			
			.color-lump {
				width: 20vw;
				height: 8vw;
				border-radius: 10px;
				background-color: #408080;
				margin-right: 5vw;
				color: white;
				border: none;
				font-size: 4vw;
			}

			.information {
				position:fixed;
				top:58%;
				width: 90%;
				margin-left:3%;
				align-items: center;
			}

			.swiper-container {
				width: 100%;
				height: 100%;
				max-width: 400px;
				max-height: 100vh;
			}
			
			.swiper-wrapper {
				width: 100%;
				height: 100%;
				max-width: 400px;
				max-height: 100vh;
			}

			.swiper-slide {
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.bookmark {
				width: 7vw;
				position: absolute;
				top: 33%;
				right: 10%;
			}
		</style>		
	</head>

	<body>
		<div id="whole">
			<div id="left"></div>
			<div id="title"><h2 style="text-align:center;"><img src="../icon/logo.png" style="height:20vw; width:20vw;"></h2></div>
			<div id='right'>
				<?php
					if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
					{ 
						while ($record4 = mysqli_fetch_row($result4))
						{
							if ($record4[7] != NULL)
							{
				?>
								<a href='../個人資料/個人資料.php'><img src='../icon/圖標小舖/<?php echo $record4[7];?>' border='0' style='height:40px; width:40px; border-radius:10px;'>
				<?php 
							}
							else
							{
								echo '<a href="../個人資料/個人資料.php"><img src="../icon/圖標小舖/profile.png" border="0" style="height:30px; width:30px;">';
							}
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

		<p id="theme" style="font-size: 7vw;">尋找停車場...</p>

        <div class="search">
			<form name="favorite" action="../搜尋/搜尋結果.php" method="get">
					<p align="center">
						<?php
							if (isset($searchtxt) == True)
							{
								echo '<input id="text" type="text" name="searchtxt" placeholder="搜尋" value="$searchtxt"; ?>>';
							}
							else
							{
								echo '<input id="text" type="text" name="searchtxt" placeholder="搜尋" value=>';
							}
						?>
						&nbsp;&nbsp;
						<button id="search" type="submit"><img class="" width="20vw" src="../icon/search_白.png"></button>
					</p>
			</form>
		</div>

		<p style="font-size: 5vw; margin-left: 5%;">最近停車場</p>

		<?php
            while ($record = mysqli_fetch_row($result))
			{
				echo "<div>";
				if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
				{
					echo "<a href='../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=$record[0]'>";
				}
				else
				{
					echo "<a href='../登入/登入.html'>";
				}
					echo '<table class="personal">';
						echo "<tr>";
							echo "<th><img src='../icon/停車場圖片/$record[8]' border='0' style='height:50px; width:50px; border-radius:10px'></th>";
							echo "<th>";
								echo '<table>';
									echo '<tr style="text-align:left;">';
										echo '<th style="color:black;">';
											echo $record[1];
										echo '</th>';
									echo '</tr>';
									echo '<tr>';
										echo '<td style="color:#AAAAAA;"><img src="../icon/導覽列icon/location-pin_綠.png" border="0" style="height:10px; width:10px;">';
											echo $record[2];
										echo '</td>';
									echo '</tr>';
								echo '</table>';
							echo '</th>';
						echo '</tr>';
			}
		?>	
		</table>
		</a>
			<form method="post" action="./F_change.php">
				<input type="hidden" name="pid" value="<?php echo $p_id?>">
				<input type="hidden" name="favorite" value="<?php echo $favorite?>">
				<button class="bookmark" id="bk" value="f<?php echo $f_id;?>" name="bk" type="submit" data-favorite="<?php echo $favorite;?>" style="border: none; background-color: #ffffff">
					<?php
						if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
							if($favorite == 1){
								echo '<img id="'. $f_id. '" onClick="changeImage(this)" class="bookmark" src="../icon/bookmark_green.png">';
							}
							else{
								echo '<img id="'. $f_id. '" onClick="changeImage(this)" class="bookmark" src="../icon/bookmark_white.png">';
							}
						}
					?>
				</button>
			</form>	
			<?php
				if (isset($_SESSION["loggedin"]) != 1 || $_SESSION["loggedin"] != true){
					echo '<a href="../登入/登入.html"><img id="'. $f_id. '" onClick="changeImage(this)" class="bookmark" src="../icon/bookmark_white.png"></a>';
				}
			?>
		</div>
			
		</div>	
		<p id="where" style="font-size: 5vw; margin-left: 5%;">附近停車場</p>	
		<div>
		<div class="information">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php
						$lotphoto = array();
						$lottitle = array();
						$lotid = array();
						$i = 0;

						while ($record2 = mysqli_fetch_row($result2))
						{
							$lotphoto[$i] = $record2[7];
							$lottitle[$i] = $record2[1];
							$lotid[$i] = $record2[0];
							$i++;
						}

						for ($i = 0; $i < $record3[0]; $i++)
						{
							echo '<div class="swiper-slide">';
							if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
							{
								echo "<a href='../停車場詳細資訊/停車場詳細資訊1(1.4)/停車場詳細資訊1_1.4_.php?p_id=$lotid[$i]' style='text-decoration:none;'>";
							}
							else
							{
								echo "<a href='../登入/登入.html' style='text-decoration:none;'>";
							}
							echo "<figure><img data-src='../icon/停車場圖片/$lotphoto[$i]' title='$lottitle[$i]' alt='$lottitle[$i]' class='swiper-lazy' style='height: 200px; weight: 150px; border-radius: 10px'>";
							echo "<figcaption><font style ='margin-left: 3%;' color=black>$lottitle[$i]</font></figcaption></figure></a>";
							echo '<div class="swiper-lazy-preloader"></div></div>';
						}
					?>									
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<script>
			const swiper = new Swiper(".swiper-container", 
			{
				loop: true,
	  			lazy: 
				{
    				loadPrevNext: true
  				},
				pagination:
				{
					el: ".swiper-pagination",
					clickable: true
				},
			});
		</script>
		
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
	</body>
</html>
<script type="text/javascript">
	function changeImage(Obj){
		var f_id = Obj.id;
		if(document.querySelector("#" + f_id).dataset.favorite == 1){
			document.getElementById(f_id).src = "../../icon/bookmark_white.png";
			document.querySelector("#" + f_id).dataset.favorite = 0;
		}
		else{
			document.getElementById(f_id).src = "../../icon/bookmark_green.png";
			document.querySelector("#" + f_id).dataset.favorite = 1;
		}
	}
</script>