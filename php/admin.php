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
<script type="text/javascript" src="../js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/facebox.js"></script>
<script type="text/javascript" src="../js/jquery.wysiwyg.js"></script>

</head>
<body>
<div id="body-wrapper">

  <!-- 左侧布局 -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Logo (221px wide) -->
      <a href="http://www.wandoujia.com">
        <img id="logo" src="../images/logo.png" />
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
              <a <?php if($sum==1) {?>class="current"<?php } ?> href="#">
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
            <li><a href="#">新建职位类别</a></li>
            <!-- <li><a href="#">退出账号</a></li> -->
          </ul>
        </li>

      </ul>
      <!-- 左侧导航栏 end -->
    </div>
  </div>
  <!-- 左侧布局 end -->

  <div id="main-content">
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>Content box</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">Table</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">Forms</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="../images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div> This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross. </div>
          </div>
          <table>
            <thead>
              <tr>
                <th>
                  <input class="check-all" type="checkbox" />
                </th>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Column 5</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="bulk-actions align-left">
                    <select name="dropdown">
                      <option value="option1">Choose an action...</option>
                      <option value="option2">Edit</option>
                      <option value="option3">Delete</option>
                    </select>
                    <a class="button" href="#">Apply to selected</a> </div>
                  <div class="pagination"> <a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a> <a href="#" class="number" title="1">1</a> <a href="#" class="number" title="2">2</a> <a href="#" class="number current" title="3">3</a> <a href="#" class="number" title="4">4</a> <a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a> </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
              <tr>
                <td>
                  <input type="checkbox" />
                </td>
                <td>Lorem ipsum dolor</td>
                <td><a href="#" title="title">Sit amet</a></td>
                <td>Consectetur adipiscing</td>
                <td>Donec tortor diam</td>
                <td>
                  <!-- Icons -->
                  <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a> <a href="#" title="Edit Meta"><img src="../images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a> </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
          <form action="#" method="post">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>Small form input</label>
              <input class="text-input small-input" type="text" id="small-input" name="small-input" />
              <span class="input-notification success png_bg">Successful message</span>
              <!-- Classes for input-notification: success, error, information, attention -->
              <br />
              <small>A small description of the field</small> </p>
            <p>
              <label>Medium form input</label>
              <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" />
              <span class="input-notification error png_bg">Error message</span> </p>
            <p>
              <label>Large form input</label>
              <input class="text-input large-input" type="text" id="large-input" name="large-input" />
            </p>
            <p>
              <label>Checkboxes</label>
              <input type="checkbox" name="checkbox1" />
              This is a checkbox
              <input type="checkbox" name="checkbox2" />
              And this is another checkbox </p>
            <p>
              <label>Radio buttons</label>
              <input type="radio" name="radio1" />
              This is a radio button<br />
              <input type="radio" name="radio2" />
              This is another radio button </p>
            <p>
              <label>This is a drop down list</label>
              <select name="dropdown" class="small-input">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
              </select>
            </p>
            <p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p>
            <p>
              <input class="button" type="submit" value="Submit" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
    <div id="footer"> <small>&#169; Copyright 2013-3102 豌豆荚</small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
