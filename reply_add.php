<?php 
session_start();

$dbname="teachers";
$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
mysqli_query($link, "SET NAMES 'utf8'");


$reply_sql = "INSERT INTO articles (name, num, type, content) VALUES ('".$_SESSION["name"]."', '".$_POST["reply_num"]."', '2', '".$_POST["reply"]."')";
mysqli_query($link, $reply_sql);
$_POST = array();

?>