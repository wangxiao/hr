<?php
  include '../private/conn-read.php';
  include '../private/conn-write.php';
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!$_SESSION['isLogin']){
    header("Location:".$url."login.html");
  }
  $category = $_POST['category'];
  header("Location:".$url."php/admin.php");
  addJobCategory($category);
?>