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
		<title>圖標小舖</title>

		<link rel="icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
	  	<link href="http://cdn.kendostatic.com/2013.2.716/styles/kendo.default.min.css" rel="stylesheet" type="text/css" />

		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	   	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.js"></script>
	   	<script src="http://cdn.kendostatic.com/2013.2.716/js/kendo.web.min.js"></script>

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

            #shop {
                width: 90%;
                float:left;
                position:relative;
                margin-top: 30%;
                left:5%;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                text-align: center;
            }

            ul li {
                display: inline-block;
                width: 28vw;
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
				top: 23%;
				visibility: hidden;
				width: 90%;
				left: 5%;
				margin-left: 0.5%;
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
				padding: 0.5vw;
				width: 27vw;
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

			#background {
				display: none;
				position: fixed;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0,0,0,0.5);
			}
				
			.box {
				position: absolute;
				left: 15vw;
				background:#eeeeee;
				width: 70vw;
				height: 22vh;
				margin: 80% auto; 
				border-radius: 5vw;
				overflow: auto;
			}
				
			.box_message {
				background:#eeeeee;
				margin: auto;
				height: 70%;  
				width: 80%;
				text-align: center;
			}
				
			#confirm {
				float: left;
				padding: 2.5% 0;
				text-align: center;
				background: #eeeeee;
				width:50%;
				border-top: #666666 1px solid;
				border-right: #666666 1px solid;
				border-left: none;
				border-bottom: none;
				cursor: pointer;
				color: #408080;		
				font-size: 3.5vw;		
			}

			#cancel {
				float: right;
				padding: 2.5% 0;
				text-align: center;
				background: #eeeeee;
				width: 50%;
				border-top: #666666 1px solid;
				border-left: none;
				border-right: none;
				border-bottom: none;
				cursor: pointer;
				color: #408080;	
				text-decoration: none;
				font-size: 3.5vw;
				padding-top: 2.5%;	
			}

			#OK {
				padding: 2.5% 0;
				text-align: center;
				background: #eeeeee;
				width:100%;
				border-top: #666666 1px solid;
				border-right: none;
				border-left: none;
				border-bottom: none;
				cursor: pointer;
				color: #408080;				
			}
		</style>
	</head>

	<body>
		<div id="whole">
			<div id="left"><a href="../設定/設定.php"><img src="../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">圖標小舖</h2></div>
		</div>

        <div id="shop">
            <div>
                <ul>
                    <li><a class="list" id="normal_li" href="#normal">一般會員</a></li>
                    <li><a class="list" id="charged_li" href="#charged">付費會員</a></li>
                    <li><a class="list" id="loot_li" href="#loot">已擁有</a></li>
                </ul>
            </div>

			<div class="tab-content">
				<div class="tab-pane active" id="normal">
					<table>
						<tr>
							<?php
								$link = require_once("../config.php");
								$sql_icon_loot = "select icon_loot from user where user_id = ". $_SESSION['user_id']. "";
								$rs = mysqli_query($link, $sql_icon_loot);
								$icon_loot = mysqli_fetch_row($rs);
								$sql_n = "select i_id, i_photo from icon where i_id NOT IN (". substr($icon_loot[0], 0, -2). ") and category = 0";
								$rs_n = mysqli_query($link, $sql_n);
								$i = 0;
								while ($record = mysqli_fetch_row($rs_n)){
									echo '<td>
											<a id="in'. $record[0]. '" class="buying" href="javascript:Window();" onClick="form(this);"> 
												<div class="icon">
													<span class="coin">
														<button class="color-lump"><img class="coin_img" src="../icon/coin@2x.png" > 5</button>
													</span>
													<img class="icon_img" src="../icon/圖標小舖/'. $record[1]. '">
												</div>
											</a>
										</td>';
									$i += 1;
									if($i % 3 == 0){
										echo '</tr><tr>';
									}
								}
							?>
						</tr>
					</table>
				</div>

				<div class="tab-pane" id="charged">
					<table>
						<tr>
							<?php
								$sql_c = "select i_id, i_photo from icon where i_id NOT IN (". substr($icon_loot[0], 0, -2). ") and category = 1";
								$rs_c = mysqli_query($link, $sql_c);
								$i = 0;
								while ($record = mysqli_fetch_row($rs_c)){
									echo '<td>
											<a id="ic'. $record[0]. '" class="buying" href="javascript:Window();" onClick="form(this);"> 
												<div class="icon">
													<span class="coin">
														<button class="color-lump"><img class="coin_img" src="../icon/coin@2x.png" > 0</button>
													</span>
													<img class="icon_img" src="../icon/圖標小舖/'. $record[1]. '">
												</div>
											</a>
										</td>';
									$i += 1;
									if($i % 3 == 0){
										echo '</tr><tr>';
									}
								}
							?>
						</tr>
					</table>
				</div>

				<div class="tab-pane" id="loot">
					<table>
						<tr>
							<?php
								$sql_l = "select i_id, i_photo from icon where i_id IN (". substr($icon_loot[0], 0, -2). ")";
								$rs_l = mysqli_query($link, $sql_l);
								$i = 0;
								while ($record = mysqli_fetch_row($rs_l)){
									echo '<td>
											<a id="il'. $record[0]. '" class="buying" href="javascript:Window();" onClick="form(this);"> 
												<div class="icon">
													<img class="icon_img" src="../icon/圖標小舖/'. $record[1]. '">
												</div>
											</a>
										</td>';
									$i += 1;
									if($i % 3 == 0){
										echo '</tr><tr>';
									}
								}
							?>
						</tr>
					</table>
				</div>
			</div>
        </div>

		<table class="buttom">
			<tr>
				<th><a href="../首頁/首頁(1.1.1).php"><img src="../icon/導覽列icon/search_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../停車場詳細資訊/導航(2.1)/導航(2.1).php"><img src="../icon/導覽列icon/location-pin_灰.png" border="0" style="height:20px; width:20px;"></a></th>
				<th><a href="../設定/設定.php"><img src="../icon/導覽列icon/user_綠.png" border="0" style="height:20px; width:20px;"></a></th>
			</tr>
		</table>

		<div id="background">
		
			<div class="box" id="check">
				<div class="box_message">
					<h3><br><br>確定要更換為此圖標嗎？</h3>
				</div>
				<form action="./Change_icon.php" method="post">
					<input type="hidden" name="iconid" id="iconid" value="">
					<input type="hidden" name="method" id="method" value="">
					<input type="submit" id="confirm" value="確定" onclick="confirm()">
					<a id="cancel" href="javascript:location.reload()">取消</a>
				</form>
			</div>
		</div>
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

		var bg = document.getElementById('background');
		var check = document.getElementById('check');
		var cancel = document.getElementById('cancel');
		var confirm = document.getElementById('confirm');
		var OK = document.getElementById('OK');

		function Window(){
			bg.style.display = "block";
			check.style.display = "block";
		}

		function form(Obj){
			var target = location.hash.substr(1);
			var iId = Obj.id.substr(2);
			var iconid = document.getElementById('iconid');
			var method = document.getElementById('method');
			iconid.value = iId;
			method.value = target;
		}

		cancel.onclick = function close(){
			bg.style.display = "none";
		}

		confirm.onclick = function change(){
			check.style.display = "none";
		}

		OK.onclick = function stop(){
			bg.style.display = "none";
		}
    </script>
</html>