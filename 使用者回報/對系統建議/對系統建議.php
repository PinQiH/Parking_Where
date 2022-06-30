<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<title>對系統建議</title>
		
		<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.common.min.css"  rel="stylesheet" type="text/css" />
		<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.default.min.css"  rel="stylesheet" type="text/css" />
		<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.js"></script>
		<script src="http://cdn.kendostatic.com/2013.2.716/js/kendo.web.min.js"></script>
		
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

			.buttom { 	
				width:90%;
				height:5.5%;
				background-color:#408080;
				border-radius:10px;
				position:fixed;
				bottom:5%;
				margin-left:3.5%; 
				color:#ffff;
				font-size:200%;
				text-align: center;
			}

			.photo {				
				width:90%;
				height:30%;
				position:fixed;
				top:10%;
				margin-left:3.5%;
				border-radius: 20%;
				
			}

			.photo_2 {				
				width:50%;
				height:11%;
				position:fixed;
				top:68%;
				margin-left:23%;				
				opacity: 0.5;
				object-fit: contain;
			}

			.middle {
				width:90%;
				height:5%;
				position:fixed;
				top:43%;
				margin-left:3.5%;
				text-align:center;
				font-size: 150%;
				vertical-align: center;
			}

			.middle_2 {
				width:90%;
				height:35%;
				position:fixed;
				top:50%;
				margin-left:3.5%;
				text-align:left;
				font-size: 160%;
				font-weight:lighter;
				vertical-align: center;
				border-radius: 20px;
				background-color: #F8F8F8;
				border:aqua 1px none;
				box-shadow:0 0 11px rgba(0, 0, 0, 0.322);
			}

			#open_btn {
				width:90%;
				height:5.5%;
				border-radius:10px;
				position:fixed;
				bottom:5%;
				margin-left:3.5%;
				background: #408080;
				border:1px black none;
				border-radius:20px;
				color:#ffff;
				font-size:200%;
			}
				
			#background {
				display: none;
				position: fixed;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0,0,0,0.5);
			}
				
			#div1 {
				background:#eeeeee;
				width: 70%;
				z-index: 5;
				margin:80% auto; 
				overflow: auto;
			}
				
			span {
				color: white;
				padding-top: 12px;
				cursor: pointer;
				padding-right: 15px;
			}
				
			.div2 {
				background:#eeeeee;
				margin: auto;
				height: 170px;  
				width:150px;
				padding: 0 10px;
				text-align: center;
				background-image: url("../../icon/checked-removebg-preview.png");
				background-size:100px 100px;
				background-position:center;
				background-repeat: no-repeat;
			}

			
			.inside_top {
				width:100px;
				height:20%;
				border:aqua 1px solid;
			}
				
			#close {
				padding: 3px;
				background: #5cd31b;
			}
				
			#close-button {
				float: right;
				font-size: 20px;
			}
				
			.foot {
				padding: 5px 0;
				text-align: center;
				background: #5cd31b;
				width:100%;
				border:1px blue none;
				cursor: pointer;
				color: white;				
			}			
		</style>		
	</head>

	<body>
		<?php
			$p_id = $_GET['p_id'];
			$c_id = $_GET['c_id'];
			$link = require_once("../../config.php");
			$sql="select * from Parking_Lot where p_id= $p_id";
			$result = mysqli_query($link,$sql);
			if (mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
			}
		?>		
		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">對系統建議</h2></div>
		</div>

		<div class="photo">
			<img src="../../icon/停車場圖片/<?php echo $row['p_photo_b'];?>" style="border-radius:10%; width:100%; height:100%; object-fit: cover;">
		</div>

		<div class="middle">對於這次服務有哪裡需要改進</div>

		<form action="scoring.php" method="POST">
			<input type="hidden" name="p_id" value=<?php echo $_GET["p_id"];?>>
			<input type="hidden" name="c_id" value=<?php echo $_GET["c_id"];?>>
			<textarea class="middle_2" id="message" name="message" placeholder="留言..."></textarea>
			<button type="submit" id="open_btn" class="btn">完成</button>
		</form>
				
		<script>
			var btn = document.getElementById('open_btn');
			var div = document.getElementById('background');
			var close = document.getElementById('close-button');
			
			btn.onclick = function show() {
				div.style.display = "block";
			}
			
			close.onclick = function close() {
				div.style.display = "none";
			}
			
			window.onclick = function close(e) {
				if (e.target == div) {
					div.style.display = "none";
				}
			}
		</script>		
	</body>
</html>