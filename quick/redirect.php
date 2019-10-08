<?php
$link = $_GET['l'];
if(isset($link )){
	require_once('config/db.php');
	$stmt = $db->prepare('SELECT original FROM url WHERE redirect = ?');
	$stmt->execute([$_GET['l']]);
	$original = $stmt->fetchColumn();
	if($original){
	header("Location:".$original);
	}else{
	header("Location: http://shockerrr.kl.com.ua/quick/quick/index.php");
	}
	}else{
	header("Location: http://shockerrr.kl.com.ua/quick/quick/index.php");
	}
