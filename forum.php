<?php
	session_start();

	$dbname="teachers";
	$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
	mysqli_query($link, "SET NAMES 'utf8'");

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="globalcss.css">
	<style>
		#main_content{
			width: 80%;
			//height: 100%;
			margin: auto;
			
		}
		#bar{
			//background-color: grey;
			width: 100%;
			height: 5%;
			position: relative;
			top: 10rem;
			text-align: center;
		}
		.hide_input{
			width: 0;
			height: 0;
			border: 0;
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

		<div id="list">
			<table border = 1 id="article_list">
				<tr>
					<th>編號</th><th>標題</th><th>回應數</th><th>發文者</th><th>時間</th>
				</tr>
<?
	$i=0;
	$sql1 = "SELECT * FROM `articles` ORDER BY `num` DESC";
	if($result = mysqli_query($link, $sql1))
	{
		while($result2 = mysqli_fetch_assoc($result))
		{
			if($result2["type"] == "1")
			{
				echo '<tr>';
				echo '<td>'.$result2['num'].'</td><td id="title_'.$result2["num"].'" onclick="show_article(this.id)" class="article_title_class">'.$result2['title'].'</td><td id="reply_'.$result2["num"].'">0</td><td>'.$result2['name'].'</td><td>'.$result2['time'].'</td>';
				echo '</tr>';
				$i++;
			}	
			if($result2["type"] == "2")
			{
				$reply[$result2["num"]]++;	
			}
		
		}
	}
?>
			</table>
		</div>

		<div id="article_cont">
			<? 
				//if(isset($_GET["tmp_article_name"]))
					include("show_article.php");
			?>
		</div>

	<form id="show_article_form" name="show_article_form" method="GET" >
		<input id="tmp_article_id" name="tmp_article_name" class="hide_input" />
	</form>
	
	<h4>發表</h4>

	<form id="post_form_id" name="post_form_name" method="POST" action="post_add.php" target="post_add_iframe">
		<input name="post_num" id="post_num_id" type="text" class="hide_input"/>
		標題<input name="post_title" id="post_title_id" type="text"/>
	</form>
	<textarea name="post_article" form="post_form_id">上限10000字</textarea>
	<button id="post_btn"  onclick="post_submit()">回覆</button>
	<iframe name="post_add_iframe" width=0 height=0 border=0></iframe>

<script>
	function post_submit()
	{
		if(0 == <? echo (int)$_SESSION["login_status"]; ?>)
			alert("請先登入");
		else if(1 == <? echo (int)$_SESSION["login_status"]; ?>)
		{
			//document.getElementById("post_num_id").value="<?echo $num_split[1]?>";
			document.post_form_name.submit();
			setTimeout(function(){window.location.reload()}, 10);
		}
	}
</script>



	</div>

<script>
	function show_article(id)
	{
		//alert(id);	
		document.getElementById("tmp_article_id").value=id;
		document.show_article_form.submit();
		
	}
</script>

<?
	for($j = 1 ; $j <= $i ; $j++)
	{
		if($reply[$j])
			echo "<script>document.getElementById('reply_".$j."').innerHTML='".$reply[$j]."';</script>";
	}
?>

</body>
</html>