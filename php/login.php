<?php
	include "conn.php";
	$user=$_POST['user'];
	$password=$_POST['password'];
	// $password=md5($password);
	$url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
	if(login($user,$password)){
		header("Location:".$url."index.html");
	}else{
		header("Location:".$url."login.html");
	}
?>