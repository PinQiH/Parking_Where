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
		<title>停車場詳細資訊</title>

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
			}

			.price {
				width:20%;
				height:3%;
				position:fixed;
				top:44.5%;
				margin-left:8%;
				border-radius: 20%;
				background-color:#408080;
				text-align: center;
				color:#ffff;
			}

			.bottom { 	
				width:90%;
				height:5%;
				background-color:#F8F8F8;
				border-radius:10px;
				position:fixed;
				bottom:5%;
				margin-left:3%; 
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
				margin-left:10%; 
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

			.button {
				display: inline-block;
				border-radius: 50px;
				background-color: #408080;
				border: none;
				color: #FFFFFF;
				text-align: center;				
				font-size: 22px;
				padding: 10px;
				width: 285px;
				transition: all 0.5s;
				cursor: pointer;
				margin:4px;
			}

			.button span {
				cursor: pointer;
				display: inline-block;
				position: relative;
				transition: 0.5s;
			}

			.button span:after {
				content: '»';
				position: absolute;
				opacity: 0;
				top: 0;
				right: -20px;
				transition: 0.5s;
			}

			.button:hover span {
				padding-right: 25px;
			}

			.button:hover span:after {
				opacity: 1;
				right: 0;
			}

			#shop {
                width: 90%;
                float:left;
                position:fixed;
                bottom: 35%;
                left:5%;
            }

			
			.li img {
				width:30px;
				height:30px;
			}

			.icon_1 {
				width:10%;
				height:8%;
				background-color: #0000;
				border-color: black;
			}

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                text-align: center;
            }

            ul li {
                display: inline-block;
                width: 20vw;
            }

            .list {
                text-decoration: none;
                display: block;
                position: relative;
                color: black;
                padding: 2vw 0;
            }

			.list.active {
				border-bottom: #408080 2px solid;
			}

			.tab-pane {
				position: fixed;
                height:24%;
				top:65%;
				visibility: hidden;
				width: 90%;
				left: 5%;
				margin-left: 0.5%;
				text-align:center;
				overflow:auto;
				background-color:#F8F8F8;
				border-radius:10px;
			}

			div.active {
				visibility: visible;
			}

			:target {
				visibility: visible;
			}

			.icon {
				position: relative;
			}

			.icon_img {
                width:10%;
                height:10%;
				padding: 0.5vw;
			}

			.coin {
				position: absolute;
				bottom: 0.5vh;
				right: 0;
			}

			.color-lump {
				width: 12vw;
				height: 6vw;
				border-radius: 2vw;
				background-color: #408080;
				margin-right: 1vw;
				color: white;
				border: none;
				font-size: 3.5vw;
			}

			.coin_img {
				height: 4vw;
			}

			.ratings {
				position: relative;
				vertical-align: middle;
				display: inline-block;
				color: #ddd; /*背景星星顏色*/
				overflow: hidden;
				font-size: 20px; /*調整字體大小可放大縮小星星*/
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

			.bookmark {
				width: 7vw;
				position: absolute;
				top: 46%;
				right: 10%;
			}

			.information {
				align-items: center;
				width:82%;
				height:25%;
				position:fixed;
				top:10%;
				margin-left:8%;
				border-radius: 20%;
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

			.swiper-lazy{
				width:300px;
				height:100%;
				border-radius:45px;
			}

		</style>
	</head>

	<body>
		
		<?php 
			$p_id = $_GET['p_id'];
			$favorite = 0;
			$f_id = 0;
			$link = require_once("../../config.php");

			$sql="select * from Parking_Lot where p_id= $p_id";
			$sql2="select comment.opinion,comment.time,user.nickname,user.icon_id,comment.c_id, user.user_id from comment,user where comment.p_id= $p_id and comment.user_id=user.user_id ORDER BY comment.time DESC";
			$sql3="select c_id,environment,ordering,balance from comment where p_id= $p_id";
			$sql4="select * from User where user_id='$user_id'";
			$sql5="select comment.c_photo,user.user_id from comment,user where comment.p_id= $p_id and comment.user_id=user.user_id and comment.c_photo !='' ORDER BY comment.time DESC LIMIT 4";
			$sql6="select * from favorite where user_id = ". $user_id. " and p_id = ". $p_id;

			$result = mysqli_query($link,$sql);
			$result2 = mysqli_query($link,$sql2);
			$result3 = mysqli_query($link,$sql3);
			$result4 = mysqli_query($link, $sql4);
			$result5 = mysqli_query($link, $sql5);
			$result6 = mysqli_query($link, $sql6);

			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
			}
			
			if (mysqli_num_rows($result3) > 0){
				$total = 0;
				$number = 0;
				while($row3 = mysqli_fetch_assoc($result3)){
					$number+=1;
					$total += $row3['environment'];
					$total += $row3['ordering'];
					$total += $row3['balance'];							
				}
					
				$total = ($total / $number)/15*100 ;				
			}

			if(mysqli_num_rows($result6) > 0){
				$row6 = mysqli_fetch_row($result6);
				$favorite = 1;
				$f_id = $row6[0];
			}

		?>

		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">詳細資訊</h2></div>
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

		<div class="information">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<figure><img data-src='../../icon/停車場圖片/<?php echo $row['p_photo_b']?>' title='' alt='' class='swiper-lazy' style='height: 200px; weight: 150px; border-radius: 10px;'></figure>
						<div class="swiper-lazy-preloader"></div></div>
					<?php
						$photo=array();
						$i=0;
						while ($record5 = mysqli_fetch_row($result5))
						{
							$photo[$i] = $record5[0];
							$i++;
						}
						for ($i = 0; $i < count($photo); $i++)
						{	
							echo '<div class="swiper-slide">';
							echo "<figure><img data-src='../../icon/停車場圖片/$photo[$i]' title='$photo[$i]' alt='$photo[$i]' class='swiper-lazy' style='height: 200px; weight: 150px;'>";
							echo "</figure>";
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
	
		
		<table class="tab_1">
			<tr>
				<td style="text-align:left; vertical-align:center; font-size: 20px;">
					<strong><?php echo $row['name']?></strong>
					
				</td>
				<td style="text-align:right;">
					<div class="ratings">
						<div class="empty_star">★★★★★</div>
						<div class="full_star" style="width: <?php echo $total;?>%;">★★★★★</div>
					</div>
				</td>
			</tr>
			<tr>
				<td style="text-align:left; vertical-align:center; font-size:10px ;">
					<img src="../../icon/導覽列icon/location-pin_綠.png" style="height:12px; width:12px;">
					<?php echo $row['address']?>
				</td>
				<td style="text-align:center; font-size:10px; background-color: #408080; border-radius: 25px;">
					<span style="color:#ffff;"><?php echo $row['price']?></span>
				</td>
			</tr>
		</table>

		<table class="tab_2" border="1">
			<tr>
				<td style="text-align:left; padding-left:5%; vertical-align:center;">剩餘車位</td>
				<td style="text-align:center;"><?php echo $row['remain']?></td>
			</tr>
		</table>
		<form method="post" action="./f_change.php">
			<input type="hidden" name="pid" value="<?php echo $p_id?>">
			<input type="hidden" name="favorite" value="<?php echo $favorite?>">
			<button class="bookmark" id="bk" value="f<?php echo $f_id;?>" name="bk" type="submit" data-favorite="<?php echo $favorite;?>" style="border: none; background-color: #ffffff">
				<?php
					if($favorite == 1){
						echo '<img id="'. $f_id. '" onClick="changeImage(this)" class="bookmark" src="../../icon/bookmark_green.png">';
						}
						else{
							echo '<img id="'. $f_id. '" onClick="changeImage(this)" class="bookmark" src="../../icon/bookmark_white.png">';
							}
				?>							
			</button>
		</form>	
				
		<div class="tab_3">詳細資訊</div>	

		<div id="shop">
			<div>
				<ul>
					<li><a class="list" id="normal_li" href="#normal"><img src="../../icon/詳細資訊icon/information-button@2x.png" style="width:30px; height:30px;"></a></li>
					<li><a class="list" id="charged_li" href="#charged"><img src="../../icon/詳細資訊icon/comment_1@2x.png" style="width:30px; height:30px;"></a></li>
					<li><a class="list" id="loot_li" href="#loot"><img src="../../icon/詳細資訊icon/edit@2x.png" style="width:30px; height:30px;"></a></li>
					<li><a class="list" id="last_li" href="#last"><img src="../../icon/導覽列icon/location-pin_灰.png" style="width:30px; height:30px;"></a></li>
				</ul>
			</div>

			<div class="tab-content">
				<div class="tab-pane active" id="normal" style="text-align:left;"><br>
					<?php 
						echo '&nbsp停車場類型: ';
						echo $row['type'];
						echo '<br>';
						echo '&nbsp繳費方法: ';
						echo $row['way'];
						echo '<br><br>';
						echo '&nbsp其他資訊: <br>';
						echo "&nbsp".$row['information'];
					?>
				</div>
			
				<div class="tab-pane" id="charged">
					<table style="width:100%; height:15%; text-align:left;">
						<?php
							if (mysqli_num_rows($result2) > 0)
							{
								while($row2 = mysqli_fetch_assoc($result2))
								{								
						?>
						<tr>
							<th style="width:10px;"><img src="../../icon/圖標小舖/<?php echo $row2['icon_id']?>" style="width:45px; height:45px; object-fit:cover; border-radius:10px;"></th>
							
							<td style="opacity:0.7; font-size:14px; line-height:25px; vertical-align:top;">
								<a href="./user_comment.php?c_id=<?php echo $row2['c_id']?>&user_id=<?php echo $row2['user_id']?>&p_id=<?php echo $p_id?>" style="text-decoration:none;color:black;"><?php echo '<strong>'.$row2['nickname'].'</strong>'.'<br>'.$row2['opinion']?></a>
							</td>
							<td style="opacity:0.7; text-align:right; font-size:13px; width:65px;"><?php echo $row2['time']?></td>
							<td style="text-align:center; width:30px;">
								<?php
									echo '<a href="../../檢舉/檢舉評論/檢舉評論.php?c_id=';
									echo $row2['c_id'];
									echo '&user_id=';
									echo $row2['user_id'];
									echo '&p_id=';
									echo $p_id;
									echo '">';
								?>
								<img src="../../icon/驚嘆號.png" border="0" style="height:20px; width:20px; opacity:0.5;"></a>
							</td>
						</tr>
						<tr>								
							<th colspan="4" style="height:1%;"><hr style='background-color:#888888; height:1px; border:none;'></th>
						</tr>		
						<?php
								}
							}
							else
							{
						?>
						<tr>
							<td colspan="4"><?php echo "Null" ?></td>
						</tr>
						<?php 
							}
						?>	            
					</table>
				</div>

				<div class="tab-pane" id="loot">
					<br><br>
					<a class="button" style="vertical-align:middle" href="../../使用者回報/回報停車場狀況/回報停車場狀況.php?p_id=<?php echo $row['p_id'];?>"><span>停車情況</span></a></br>
					<a class="button" style="vertical-align:middle" href="../../使用者回報/對系統建議/對系統建議.php?p_id=<?php echo $row['p_id'];?>"><span>系統建議</span></a></br>
				</div>
				<div class="tab-pane" id="last" style="text-align:left;">
					<iframe 
						width="100%" 
						height="100%" 
						frameborder="0" 
						style="border:0" 
						src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCphjRcCDXxAa0iWCesdsw3AMUMZEfdCTE&q=<?php echo $row['address'];?>" 
						allowfullscreen>
					</iframe>
				</div>
			</div>
		</div>


		<table class="bottom">
			<tr>
				<th><a href="../../首頁/首頁(1.1.1).php"><img src="../../icon/導覽列icon/search_綠.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../../設定/設定.php"><img src="../../icon/導覽列icon/user_灰.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
		</table>
	</body>

	<script type="text/javascript">
		var target = location.hash.substr(1);
		if(target.length > 0){
			$("div").removeClass("active");
			var obj = document.getElementById(target + "_li");
			obj.className += " active";
		}
		else{
			var obj = document.getElementById("normal" + "_li");
			obj.className += " active"
		}
        $("li").click(function(){
			$("div").removeClass("active");
			$(".list").removeClass("active");
            $(this).css("border-bottom","#408080 2px solid").siblings().css("border-bottom","none");
        })

		if(document.querySelector("#bk").dataset.favorite == 1){
			document.getElementById(f_id).src = "../../icon/bookmark_green.png";
		}

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
	
			
		
</html>