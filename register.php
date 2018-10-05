<?php 
//session_start();



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
		function check_pwd_same()
		{
			if(document.getElementById("pwd").value != document.getElementById("pwd_confirm").value)
			{
				document.getElementById("check_pwd_result").innerHTML="密碼不相同";
			}
			else
			{
				document.getElementById("check_pwd_result").innerHTML="";
			}
		}
		function reg_btn_clicked()
		{
			if(document.register_form.rg_account.value == "")
				alert("請勿留空!");
			else if(document.register_form.rg_name.value == "")
				alert("請勿留空!");
			else if(document.register_form.rg_password.value == "")
				alert("請勿留空!");
			else if(document.getElementById("pwd").value != document.getElementById("pwd_confirm").value)
				alert("密碼不相同!");
			else
			{
				document.register_form.submit();
				alert("註冊成功!");
				window.location.href="index.php";
				//setTimeout(function(){}, 3000);
			}
		}
	</script>

	<form method="POST" name="register_form" id="register_form" action="reg_add.php" target="tmp_frame">
		<span>帳號</span><input type="text" name="rg_account" maxlength="15" /><br><br>
		<span>暱稱</span><input type="text" name="rg_name" maxlength="15" /><br><br>
		<span>密碼</span><input type="password" id="pwd" name="rg_password" maxlength="15" /><br><br>
		<span>確認密碼</span><input type="password" id="pwd_confirm" oninput="check_pwd_same()" /><span id="check_pwd_result"></span><br><br>
		<button id="reg_btn" onclick="reg_btn_clicked()">確認</button>
	</form>

	<iframe border=0 width=0 height=0 name="tmp_frame" style="border-width: 0"></iframe>


</body>
</html>