<?php
  include './php/conn.php';
  $jobCategory = listJobCategory();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<!-- <meta name="author" content="wangxiao"> -->
<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>豌豆实验室招聘</title>
<!-- <link rel="shortcut icon" href="/favicon.ico"> -->
<link rel="stylesheet" href="./css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="./css/index.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="./css/love.css">
</head>
<body>
  <div class="wrapper">
    <!-- header start -->
    <div class="header">
      <div class="photos jcarousel">
        <ul>
          <li><img src="./images/photos/1.jpg"></li>
          <li><img src="./images/photos/2.jpg"></li>
          <li><img src="./images/photos/3.jpg"></li>
          <li><img src="./images/photos/4.jpg"></li>
          <li><img src="./images/photos/5.jpg"></li>
        </ul>
      </div>
      <div class="logo">
        <a href="http://www.wandoujia.com"><img src="./images/index/logo.png"></a>
      </div>
      <div class="title">
        <img src="./images/index/title.png">
      </div>
      <div class="play-video">
        <img src="./images/index/play-video.png">
      </div>
      <div class="video">
        <video id='video-element' controls="controls" width="800"><source src="http://v.wdjcdn.com/join.mp4" type="video/mp4"></video>
      </div>
    </div>
    <!-- header end -->
    <!-- culture start -->
    <div class="culture">
      <img src="./images/index/culture1.png">
      <img src="./images/index/culture2.png">
      <img class="culture3" src="./images/index/culture3.png">
    </div>
    <!-- culture end -->
    <!-- job detail start -->
    <div class="job">
      <!-- job-category start -->
      <div class="job-category">

        <?php foreach($jobCategory as $key=>$value){ ?>
        <!-- job item start -->
        <div class="job-item">
          <p class="category"><?php echo $value['category'];?></p>
          <ul class="title-list">
            <?php
              $jobList = listJobById($value['id']);
              foreach($jobList as $k=>$v){
            ?>
            <li><a class="get-job-info-btn" data-job-id="<?php echo $v['id'];?>"><?php echo $v['title'];?></a></li>
            <?php }?>
          </ul>
        </div>
        <!-- job item end -->
        <?php } ?>

      </div>
      <!-- job-category end -->
      <!-- job-detail start -->
      <div class="job-detail">
        
      </div>
      <!-- job-detail end -->
    </div>
    <!-- job detail end -->
  </div>

  <div id='love'>
    <canvas id="canvas" width="1100" height="900"></canvas>
    <div class="word">
      <p>Love is wonderful,like a dream.</p>
      <p>For yangyang</p>
    </div>
  </div>
  <script type="text/javascript" src="./js/jquery-1.8.3.js"></script>
  <script type="text/javascript" src="./js/jquery.jcarousel-core.min.js"></script>
  <script type="text/javascript" src="./js/jquery.jcarousel-autoscroll.min.js"></script>
  <script type="text/javascript" src="./js/index.js"></script>
  <script type="text/javascript" src="./js/love.js"></script>

</body>
</html>
