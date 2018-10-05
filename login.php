<?php 
session_start();



$dbname="teachers";
$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
mysqli_query($link, "SET NAMES 'utf8'");
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<script>
	function login()
	{
		document.login_form.submit();
		//parent.location.reload();
		//setTimeout(function(){window.parent.location.reload(window.parent.location)}, 30);
	}

</script>
<div id="login">
	<form method="POST" name="login_form">
		<span>帳號</span>
		<input type="text" name="account"/>
		<br><br>
		<span>密碼</span>
		<input type="password" name="password"/>
		<input type="button" value="登入" name="login_btn" onclick="login()"/>
	</form>
</div>

<?
if($_SESSION["login_status"] == true)
	echo "<script>document.getElementById('login').innerHTML='已登入';</script>";
else if(isset($_POST["account"]) && isset($_POST["password"]))
{
	$login_tmp = 0;

	$sql1 = "SELECT * FROM `members` WHERE 1";
	if($result = mysqli_query($link, $sql1))
	{
		while($result2 = mysqli_fetch_assoc($result))
		{
			if($result2['account'] == $_POST["account"])
			{
				if($result2['password'] == $_POST["password"])
				{
					$_SESSION["account"] = $_POST["account"];
					$_SESSION["password"] = $_POST["password"];
					$_SESSION["login_status"] = true;
					$_SESSION["name"] = $result2["name"];
					echo "<script>document.getElementById('login').innerHTML='登入成功，3秒後跳轉';</script>";
					echo "<script>setTimeout(function(){window.parent.location.reload()}, 3000);</script>";
					$login_tmp = 1;
				}
				
			}
			
		}
		if($login_tmp != 1)
		{
			$_SESSION["login_status"] = false;unset($_POST);
			echo "<script>document.getElementById('login').innerHTML='登入失敗，3秒後返回';</script>";
				
			echo "<script>setTimeout(function(){window.parent.location.reload()}, 3000);</script>";
			//echo "<script>location.reload();</script>";
		}

	}
}



?>

</body>
</html>