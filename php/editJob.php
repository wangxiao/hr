<?php
  include 'conn.php';
  $cookieUser=$_COOKIE['name'];
  $cookiePassword=$_COOKIE['password']; 
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!checkUser($cookieUser,$cookiePassword)){
    header("Location:".$url."login.html");
  }

  $id = $_POST['id'];
  $title = $_POST['title'];
  $des = $_POST['des'];
  $responsibilities = $_POST['responsibilities'];
  $requirements = $_POST['requirements'];
  $category = $_POST['category'];
  header("Location:".$url."php/admin.php");
  editJob($id,$title,$des,$responsibilities,$requirements,$category)
?>