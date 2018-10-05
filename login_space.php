<?php
	session_start();

	$dbname="teachers";
	$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
	mysqli_query($link, "SET NAMES 'utf8'");

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
		#login_div{
			position: fixed;
			top:40%;
			left:40%;
		}
	</style>
</head>
<body>
	<script>
	function logout()
	{
		document.getElementById("logout_check_id").checked = true;
		document.logout_form.submit();
		setTimeout(function(){window.location.reload()}, 10);
	}
	function show_login()
	{
		document.getElementById("login_div").innerHTML="<iframe name=\"login_frame\" src=\"login.php\"></iframe>";
	}
	</script>

	<div id="login_space"></div>
	<div id="login_div"></div>
	
	<form name="logout_form" method="POST"><input type="checkbox" name="logout_check" id="logout_check_id" class="hide_input" value="true"/></form>
<?
	if($_SESSION["login_status"] == true)
	{

		if($_POST["logout_check"] == "true")
		{
			$_SESSION["login_status"] = false;
			//header('Location: http://www.chass.ncku.edu.tw/teachers/');
			//$_POST["logout_check"] = "";
			unset($_POST);
			//echo "<script>document.getElementById('logout_check_id').checked = false;</script>";
			/*unset($_SESSION["account"]);
			unset($_SESSION["password"]);
			unset($_SESSION["name"]);
			unset($_SESSION["login_status"]);*/
			session_destroy();
		}

		echo "<script>document.getElementById(\"login_space\").innerHTML=\"您好，".$_SESSION["name"]."<button onclick='logout()'>登出</button>\";</script>";
	}
	else
	{
		echo "<script>document.getElementById(\"login_space\").innerHTML='<button onclick=\"show_login()\">登入</button><button onclick=\"location.href=\'register.php\';\">註冊</button>'</script>";
	}
?>

</body>
</html>