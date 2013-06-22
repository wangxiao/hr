<?php
  include 'conn.php';
  $cookieUser=$_COOKIE['name'];
  $cookiePassword=$_COOKIE['password']; 
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!checkUser($cookieUser,$cookiePassword)){
    header("Location:".$url."login.html");
  }
  $title = $_POST['title'];
  $des = $_POST['des'];
  $responsibilities = $_POST['responsibilities'];
  $requirements = $_POST['requirements'];
  $category = $_POST['category'];
  addJob($title,$des,$responsibilities,$requirements,$category);
?>