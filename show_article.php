<?php
	session_start();

	$dbname="teachers";
	$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
	mysqli_query($link, "SET NAMES 'utf8'");

?>
<html>
<head>
</head>
<body>
	<table border="1">
	<?
		$num_split = split("_", $_GET["tmp_article_name"]);
		//echo $num_split[1];
		$sql2 = "SELECT * FROM  `articles` WHERE num='".$num_split[1]."' ORDER BY time";
		if($result = mysqli_query($link, $sql2))
		{
			while($result2 = mysqli_fetch_assoc($result))
			{
				if($result2["type"] == "1")
				{
					echo "<tr>";
					echo "<td>".$result2["content"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>".$result2["time"]."</td><td>".$result2["name"]."</td>";
					echo "</tr>";
					echo "<tr></tr>";
				}
				else if($result2["type"] == "2")
				{
					echo "<tr>";
					echo "<td>".$result2["content"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>".$result2["time"]."</td><td>".$result2["name"]."</td>";
					echo "</tr>";
					echo "<tr></tr>";
				}
		
			}
		}
	?>
	<tr><td>
		
		<textarea name="reply" form="reply_form_id">上限10000字</textarea>
	</td><td>
		<button id="reply_btn"  onclick="reply_submit()">回覆</button>
	</td></tr>
	</table>
	
	<form id="reply_form_id" name="reply_form_name" method="POST" action="reply_add.php" target="reply_add_iframe">
			<input name="reply_num" id="reply_num_id" type="text" class="hide_input"/>
		</form>
	
	<iframe name="reply_add_iframe" width=0 height=0 border=0></iframe>

<script>
	function reply_submit()
	{
		if(0 == <? echo (int)$_SESSION["login_status"]; ?>)
			alert("請先登入");
		else if(1 == <? echo (int)$_SESSION["login_status"]; ?>)
		{
			document.getElementById("reply_num_id").value="<?echo $num_split[1]?>";
			document.reply_form_name.submit();
			setTimeout(function(){window.location.reload()}, 10);
		}
	}
</script>


</body>
</html>