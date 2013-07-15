<?php
  include '../private/conn-read.php';
  include '../private/conn-write.php';
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!$_SESSION['isLogin']){
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