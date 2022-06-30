<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
		<meta charset="utf-8">
		<link rel="icon" href="../../icon/bitbug_favicon.ico" type="image/x-icon">
		<title>回報停車場狀況</title>
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
				width:45%;
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
				border:#F62 1px none;
				position:fixed;
				bottom:5%;
				margin-left:3.5%; 
				color:#ffff;
				font-size:200%;
				text-align: center;
			}

			.sel_1 {
				width:90%;
				height:8%;
				position:fixed;
				top:15%;
				margin-left:3.5%;
				font-size: 160%;
				vertical-align: center;
				border:#F62 1px solid;
			}

			.line { 
				margin-left: 20%;
				border-left:2px solid #38546d;
				height:100%;
				position:relative;
				 
			}

			.tab {
				margin-left:7.5%;
				width:85%;
				height:500px;
				margin-top:0px;
				overflow:auto;
				font-size:18px;
			}

			.upload {
				margin-left:7.5%;
				width:85%;
				height:100%;
				margin-top:10px;
				overflow:auto;
				font-size:18px;
			}

			.img_1 {
				width:40%;
				height:40%;
				border:#F62 1px solid;
			}

			.middle {
				width:90%;
				height:5%;
				position:fixed;
				top:50%;
				margin-left:3.5%;
				text-align:center;
				font-size: 170%;
				vertical-align: center;
			}

			.middle_2 {				
				position:fixed;				
				text-align:center;
				font-size: 170%;
				font-weight:lighter;
				vertical-align: center;
				box-shadow:0 0 11px rgba(0, 0, 0, 0.322);
			}

			.stars {  
				width: 100%;
				text-align:left;
				margin-right:10%;
				margin-top:1px;
				display: inline-block;
			}
			
			input.star { 
				display: none; 
			}
			
			label.star { 
				float: right;
				padding: 1%;
				font-size: 260%;
				color: #444;
				transition: all .2s;
			} 

			input.star:checked ~ label.star:before {
				content: '\2605'; 
				color: #FD4; 
				transition: all .25s; 
			} 
				
			input.star-5:checked ~ label.star:before { 
				color: #FE7; 
				text-shadow: 0 0 20px #952; 
			} 

			input.star-1:checked ~ label.star:before { 
				color: #F62; 
			} 

			label.star:hover { 
				transform: rotate(-15deg) scale(1.3); 
			} 
				
			label.star:before { 
				content: '\2605'; 
			}

			.stars_1 {  
				width: 100%;
				text-align:left;
				margin-right:10%;
				margin-top:1px;
				display: inline-block;
			}

			input.star_1 { 
				display: none; 
			}
				
			label.star_1 { 
				float: right;
				padding: 1%;
				font-size: 260%;
				color: #444;
				transition: all .2s;
			} 

			input.star_1:checked ~ label.star_1:before {
				content: '\2605'; 
				color: #FD4; 
				transition: all .25s; 
			} 

			input.star-e:checked ~ label.star_1:before { 
				color: #FE7; 
				text-shadow: 0 0 20px #952; 
			} 

			input.star-a:checked ~ label.star_1:before { 
				color: #F62; 
			} 

			label.star_1:hover { 
				transform: rotate(-15deg) scale(1.3); 
			} 

			label.star_1:before { 
				content: '\2605'; 
			}

			.stars_2 {  
				width: 100%;
				text-align:left;
				margin-right:10%;
				margin-top:1px;
				display: inline-block;
			}

			input.star_2 { 
				display: none; 
			}
				
			label.star_2 { 
				float: right;
				padding: 1%;
				font-size: 260%;
				color: #444;
				transition: all .2s;
			} 

			input.star_2:checked ~ label.star_2:before {
				content: '\2605'; 
				color: #FD4; 
				transition: all .25s; 
			} 

			input.star-10:checked ~ label.star_2:before { 
				color: #FE7; 
				text-shadow: 0 0 20px #952; 
			} 

			input.star-6:checked ~ label.star_2:before { 
				color: #F62; 
			} 

			label.star_2:hover { 
				transform: rotate(-15deg) scale(1.3); 
			} 
				
			label.star_2:before { 
				content: '\2605'; 
			}		

			#mid {
				position: fixed;
				height: 600px;
				top: 100px;
				overflow: scroll;
			}

		</style>
	</head>

	<body>
		<div id="whole">
			<div id="left"><a href="javascript:history.back()"><img src="../../icon/left arrow.png" border="0" style="height:20px; width:20px;"></a></div>
			<div id="title"><h2 style="text-align:center;">回報停車場狀況</h2></div>
		</div>
		
		<div id="mid">
			<form action="scoring.php" method="POST" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
				<table class="tab">
					<tr>
						<th style=" width:17%; height:8px; text-align: center;">周遭環境</th>
						<th style="border-right:3px #FFD382 solid; width:3%; height:8px;"></th>
						<th style="height:8px;">
							<div class="stars">
								<input type="hidden" name="p_id" value=<?php echo $_GET["p_id"];?>>

								<input class="star star-5" id="star-5" type="radio" name="environment" value="5"/> 				 
								<label class="star star-5" for="star-5"></label> 

								<input class="star star-4" id="star-4" type="radio" name="environment" value="4"/> 				 
								<label class="star star-4" for="star-4"></label> 

								<input class="star star-3" id="star-3" type="radio" name="environment" value="3"/> 				 
								<label class="star star-3" for="star-3"></label> 

								<input class="star star-2" id="star-2" type="radio" name="environment" value="2"/> 				 
								<label class="star star-2" for="star-2"></label> 

								<input class="star star-1" id="star-1" type="radio" name="environment" value="1"/> 				 
								<label class="star star-1" for="star-1"></label> 					
							</div>
						</th>
						<th></th>
					</tr>
					<tr>
						<th colspan="4" style="height:5%"></th>				
					</tr>
					<tr>
						<th style=" width:17%; height:10%; text-align: center;">停車秩序</th>
						<th style="border-right:3px #FFD382 solid; width:3%; height:10%;"></th>
						<th>
							<div class="stars_1"> 	 
								<input class="star_1 star-e" id="star-f" type="radio" name="ordering" value="5"/> 
								<label class="star_1 star-e" for="star-f"></label> 
							
								<input class="star_1 star-d" id="star-e" type="radio" name="ordering" value="4"/> 
								<label class="star_1 star-d" for="star-e"></label> 
							
								<input class="star_1 star-c" id="star-c" type="radio" name="ordering" value="3"/> 					
								<label class="star_1 star-c" for="star-c"></label> 
							
								<input class="star_1 star-b" id="star-b" type="radio" name="ordering" value="2"/> 					
								<label class="star_1 star-b" for="star-b"></label> 
							
								<input class="star_1 star-a" id="star-a" type="radio" name="ordering" value="1"/> 					
								<label class="star_1 star-a" for="star-a"></label> 					
							</div>
						</th>
						<th></th>
					</tr>
					<tr>
						<th colspan="4" style="height:5%"></th>
					</tr>
					<tr>
						<th style=" width:17%; height:5%; text-align: center;">剩餘車位</th>
						<th style="border-right:3px #FFD382 solid; width:3%; height:10%;"></th>
						<th>
							<div class="stars_2"> 	 		 
								<input class="star_2 star-10" id="star-10" type="radio" name="balance" value="5"/> 					
								<label class="star_2 star-10" for="star-10"></label> 
							
								<input class="star_2 star-9" id="star-9" type="radio" name="balance" value="4"/> 					
								<label class="star_2 star-9" for="star-9"></label> 
							
								<input class="star_2 star-8" id="star-8" type="radio" name="balance" value="3"/> 					
								<label class="star_2 star-8" for="star-8"></label> 
							
								<input class="star_2 star-7" id="star-7" type="radio" name="balance" value="2"/> 					
								<label class="star_2 star-7" for="star-7"></label> 
							
								<input class="star_2 star-6" id="star-6" type="radio" name="balance" value="1"/> 					
								<label class="star_2 star-6" for="star-6"></label> 
							</div>
						</th>
						<th></th>
					</tr>
					<tr>
						<th colspan="4" style="height:3%"></th>
					</tr>
					<tr>
						<th colspan="4" style="height:5%; text-align: left;">其他</th>				
					</tr>
					<tr>
						<th colspan="4" style="text-align: left; vertical-align: top; height:19%;"><textarea  style="font-size: 5vw; border-radius: 15px; border:black 1px none; width:100%; height:100%; box-shadow:0 0 11px rgba(0, 0, 0, 0.322);" id="message" name="message" placeholder="留言..."></textarea></th>
					</tr>
				</table>

				<div class="upload">						
					<input type="file" name="file0" id="file0" multiple="multiple" style="font-size: 5vw; border:black 1px none; width:100%; height:100%;">
					<img src="" id="img0" style="width:100%; object-fit: cover; border:#F62 1px solid;">
				</div>
				
				<input type="submit" class="buttom" value="下一步">
			</form>
		</div>
		
		<script>    
			/**
			 * 使用HTML5 File API, 來即時預覽image
			 */
			$("#file0").change(function(){
				var objUrl = getObjectURL(this.files[0]) ;
				console.log("objUrl = "+objUrl) ;
				if (objUrl) {
					$("#img0").attr("src", objUrl) ;
				}
			}) ;
			
			/**
			 * 建立一個可存取到該file的url
			 * PS: 瀏覽器必須支援HTML5 File API
			 */
			function getObjectURL(file) {
				var url = null ; 
				if (window.createObjectURL!=undefined) { // basic
					url = window.createObjectURL(file) ;
				} else if (window.URL!=undefined) { // mozilla(firefox)
					url = window.URL.createObjectURL(file) ;
				} else if (window.webkitURL!=undefined) { // webkit or chrome
					url = window.webkitURL.createObjectURL(file) ;
				}
				return url ;
				console.log( url )
			}
		</script>
	</body>
</html>