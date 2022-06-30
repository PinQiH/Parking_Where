<?php
	if (session_status() === PHP_SESSION_NONE) 
	{
		session_start();
	}
	header("Content-Type:text/html; charset=utf-8");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<?php
			if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
			{
				echo '<meta http-equiv="refresh" content="3;url=../首頁/首頁(1.1.1).php"/>';
			}
			else
			{
				echo '<meta http-equiv="refresh" content="3;url=../新用戶導覽頁/新用戶導覽頁1/新用戶導覽頁1.html"/>';
			}
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>進入頁</title>

		<link rel="icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="../icon/bitbug_favicon.ico" type="image/x-icon">

		<style>
			body {
				position: absolute;
				width: 100%;
				height: 100%;
				background-color: rgba(64,128,128,1);
				overflow: hidden;
				--web-view-name: 進入頁;
				--web-view-id: ;
				--web-scale-on-resize: true;
				--web-enable-deep-linking: true;
			}
			
			.icon {
				position:relative;
				top:25%;
				margin-left: 4%;
			}
		</style>
	</head>

	<body>
		<div class="icon">
			<img src="../icon/logo.png" srcset="../icon/logo.png" style="width: 90vw; height: 90vw;">
		</div>
	</body>
</html>