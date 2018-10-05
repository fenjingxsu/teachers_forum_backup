<?php
	session_start();

	$dbname="teachers";
	$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
	mysqli_query($link, "SET NAMES 'utf8'");
	

	//echo "<script>alert('".$logout."')</script>";

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
		#main_content{
			width: 80%;
			//height: 100%;
			margin: auto;
			
		}
		#bar{
			background-color: grey;
			width: 100%;
			height: 5%;
			position: relative;
			top: 10rem;
			text-align: center;
		}
	</style>
</head>
<body>

	

	<div id="main_content">
		<div id="top_bar">
			<? include("login_space.php"); ?>
		</div>
		<div id="bar">
		A
		</div>
	</div>
	
	
	
	
</body>
</html>