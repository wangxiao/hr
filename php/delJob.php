<?php
  include '../private/conn-read.php';
  include '../private/conn-write.php';
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!$_SESSION['isLogin']){
    header("Location:".$url."login.html");
  }
  $id = $_GET['id'];
  if(delJob($id)){
    echo "ok";
  }
?>