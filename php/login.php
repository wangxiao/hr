<?php
	include "../private/conn-read.php";
	$user=$_POST['user'];
	$password=$_POST['password'];
	// $password=md5($password);
	$url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
	if(login($user,$password)){
		header("Location:".$url."php/admin.php");
	}else{
		header("Location:".$url."login.html");
	}
?>