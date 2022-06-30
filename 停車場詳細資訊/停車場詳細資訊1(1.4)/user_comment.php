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
		<title>停車場詳細評論</title>

		<link rel="icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">
		<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
	  	<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.default.min.css" rel="stylesheet" type="text/css" />
		
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	   	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.js"></script>
	   	<script src="http://cdn.kendostatic.com/2013.2.716/js/kendo.web.min.js"></script>

		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

		<style>
			#whole {
				width:90%;
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
				margin-left:25%;
			}

			#right {
				width:10%;
				height:10%;
				position:fixed;
				top:4%;
				margin-left:77%;
			}
			.top {
				width:82%;
				height:10%;
				position:fixed;
				top:2%;
				margin-left:8%; 
			}
			
			.photo {				
				width:82%;
				height:25%;
				position:fixed;
				top:10%;
				margin-left:8%;
				border-radius: 20%;
				border:orange 1px solid;
				text-align:center;
				line-height:220px;
			}

			.buttom { 	
				width:90%;
				height:8%;
				background-color:#408080;
				border-radius:10px;
				border:#F62 1px none;
				position:fixed;
				bottom:5%;
				margin-left:3.5%; 
				color:#ffff;
				font-size:200%;
				text-align: center;
				padding-top: 5%;
			}

			.tab_1 { 	
				width:76%;
				height:8%;
				background-color:#ffff;
				border-radius:10px;
				position:fixed;
				top:36%;
				margin-left:12%; 
			}

			.tab_2 { 	
				width:60%;
				height:5%;
								
				border-radius:10px;
				position:fixed;
				top:45%;
				margin-left:15%; 
				font-size:22px;
			}

			.tab_3 {
				width:90%;
				height:25px;				
				border-radius:10px;
				position:fixed;
				top:53%;
				margin-left:3.5%;
				font-size:25px;
			}

			

			.ratings {
				position: relative;
				vertical-align: middle;
				display: inline-block;
				color: #ddd; /*背景星星顏色*/
				overflow: hidden;
				font-size:50px; /*調整字體大小可放大縮小星星*/
				text-shadow: 0px 1px 0 #999;
			}
			
			.full_star {
				 /*調整寬度可變更星等*/
				position: absolute;
				left: 0;
				top: 0;
				white-space: nowrap;
				overflow: hidden;
				color: yellow; /*前景星星顏色*/
			}

			

		</style>
	</head>

	<body>
		
		<?php 
			$c_id=$_GET['c_id'];
			$p_id=$_GET['p_id'];
			$user_id=$_GET['user_id'];

			$link = require_once("../../config.php");

			$sql="select * from comment where c_id='$c_id'";
			$sql4="select * from User where user_id='$user_id'";
			$result = mysqli_query($link, $sql);
			$result4 = mysqli_query($link, $sql4);			
		?>

		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">詳細評論</h2></div>
			<div id="right"><a href="../../個人資料/個人資料.php">
				<?php
					while ($record4 = mysqli_fetch_row($result4))
					{
						if ($record4[7] != NULL)
						{
							?>
							<img src="../../icon/圖標小舖/<?php echo $record4[7];?>" border="0" style="height:40px; width:40px;border-radius:10px;">
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

		<?php
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
			}
			else{
				echo "NULL";
			}  
			$environment=$row['environment']/5*100;
			$ordering=$row['ordering']/5*100;
			$balance=$row['balance']/5*100;			
		?>

		<div class="photo">
			<?php
				if($row['c_photo']==''){
					echo "他/她沒上傳照片!!";
				}
				else{
					echo "<img src='../../icon/停車場圖片/";
					echo $row['c_photo'];
					echo "' style='height:100%; width:100%; border-radius:20px; object-fit:cover;'>";
				}
			?>
			 
			
		</div>
	
		
		<table class="tab_1" >
			
			<tr>
				<td style="vertical-align:center; font-size:23px;">周遭環境</td>
				<td >
					<div class="ratings">
						<div class="empty_star">★★★★★</div>
						<div class="full_star" style="width:<?php echo $environment?>%;">★★★★★</div>
					</div>
				</td>
			</tr>
			<tr>
				<td style="vertical-align:center; font-size:23px; border-top:1px orange solid;">停車秩序</td>
				<td style="border-top:1px orange solid;">
					<div class="ratings">
						<div class="empty_star">★★★★★</div>
						<div class="full_star" style="width:<?php echo $ordering?>%;">★★★★★</div>
					</div>
				</td>
			</tr>
			<tr>
				<td style="vertical-align:center; font-size:23px; border-top:1px orange solid;">剩餘車位</td>
				<td style="border-top:1px orange solid;">
					<div class="ratings">
						<div class="empty_star">★★★★★</div>
						<div class="full_star" style="width:<?php echo $balance?>%;">★★★★★</div>
					</div>
				</td>
			</tr>
			<tr>
				<td style="vertical-align:center; font-size:23px; border-top:1px orange solid;">評論留言</td>
				<td style="border-top:1px orange solid;"><?php echo $row['opinion'] ?></td>
			</tr>
		</table>
			<a class="buttom" style="vertical-align:middle; text-decoration:none;color:white;" href="../../檢舉/檢舉評論/檢舉評論.php?c_id=<?php echo $c_id?>&user_id=<?php echo $user_id?>&p_id=<?php echo $p_id?>"><span>檢舉</span></a></br>
		
	</body>

	
	
			
		
</html>