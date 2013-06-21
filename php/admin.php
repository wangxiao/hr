<?php
  include 'conn.php';
  $cookieUser=$_COOKIE['name'];
  $cookiePassword=$_COOKIE['password']; 
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!checkUser($cookieUser,$cookiePassword)){
    header("Location:".$url."login.html");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="wangxiao">
<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>豌豆荚招聘职位管理</title>
<link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/invalid.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="screen" />

<script type="text/javascript" src="../js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
<script type="text/javascript" src="../js/facebox.js"></script>
<script type="text/javascript" src="../js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>

</head>
<body>
<div id="body-wrapper">

  <!-- 左侧布局 -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Logo (221px wide) -->
      <a href="http://www.wandoujia.com">
        <img id="logo" src="../images/index/logo.png" />
      </a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> 快去招更多的豌豆吧
        <br>
      </div>

      <!-- 左侧导航栏 -->
      <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> 
          <a href="http://www.wandoujia.com/" target="_blank" class="nav-top-item no-submenu">
          <!-- Add the class "no-submenu" to menu items with no sub menu -->
          查看招聘页</a> 
        </li>

        <li> 
          <a href="#" class="nav-top-item current">
          <!-- Add the class "current" to current menu item -->
          职位列表</a>
          <ul>
            <?php
              $jobCategory = listJobCategory();
              $sum = 0;
              foreach($jobCategory as $key=>$value){
                $sum ++;
            ?>
            <li>
              <a class="job-category-item <?php if($sum==1) {?>current<?php } ?>" href="#" data-category-id="<?php echo $value["id"];?>">
                <?php echo $value["category"]; ?>
              </a>
            </li>
            <?php
              }
            ?>
          </ul>
        </li>

        <li> 
          <a href="#" class="nav-top-item">其他功能</a>
          <ul>
            <li><a href="#">添加职位类别</a></li>
            <!-- <li><a href="#">退出账号</a></li> -->
          </ul>
        </li>

      </ul>
      <!-- 左侧导航栏 end -->
    </div>
  </div>
  <!-- 左侧布局 end -->

  <div id="main-content">
    <!-- 在job-content插入职位列表等 -->
    <div id="job-content"></div>

    <div id="footer"> <small>&#169; Copyright 2013-3102 豌豆荚</small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
