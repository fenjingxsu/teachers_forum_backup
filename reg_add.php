<?php 
//session_start();

$dbname="teachers";
$link=mysqli_connect("localhost","root","6717", $dbname) or die("無法開啟資料庫連結");
mysqli_query($link, "SET NAMES 'utf8'");


$sql1="INSERT INTO members (account, password, name) VALUES ('".$_POST['rg_account']."', '".$_POST['rg_password']."', '".$_POST['rg_name']."')";
mysqli_query($link, $sql1);
$_POST = array();

?>