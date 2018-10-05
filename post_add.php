<?php 
session_start();

$dbname="teachers";
$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
mysqli_query($link, "SET NAMES 'utf8'");

$post_num_sql = "SELECT max(num) FROM `articles` WHERE type=1";
$post_num_sql2 = mysqli_query($link, $post_num_sql);
$post_num = mysqli_fetch_row($post_num_sql2);
//$post_num = $post_num+1;
$post_num['0']++;
$reply_sql = "INSERT INTO articles (name, num, type, title, content) VALUES ('".$_SESSION["name"]."', '".$post_num['0']."', '1', '".$_POST["post_title"]."', '".$_POST["post_article"]."')";
mysqli_query($link, $reply_sql);
$_POST = array();

?>