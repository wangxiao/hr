<?php
	include 'conn.php';
	$cookieUser=$_COOKIE['name'];
	$cookiePassword=$_COOKIE['password']; 
	$url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
	if(!checkUser($cookieUser,$cookiePassword)){
		header("Location:".$url."login.html");
	}
	$categoryId=$_GET['category'];
	$jobList = listJobById($categoryId);
?>
<div class="content-box">
  <!-- Start Content Box -->
  <div class="content-box-header">
    <h3>职位列表</h3>
  </div>
  <!-- End .content-box-header -->
  <div class="content-box-content">
    <div class="tab-content default-tab" id="tab1">
      <table>
        <thead>
          <tr>
            <th>名称</th>
            <th></th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
<?php foreach($jobList as $key=>$value){ ?>
          <!-- 一个条目 -->
          <tr>
            <td>
              <a href="#">
                <?php echo $value["title"];?>
              </a>
            </td>
            <td>|</td>
            <td>
              <!-- Icons -->
              <a href="#" title="Edit"><img src="../images/icons/pencil.png" alt="Edit" /></a> <a href="#" title="Delete"><img src="../images/icons/cross.png" alt="Delete" /></a></td>
          </tr>
          <!-- 一个条目 end -->
<?php }?>
        </tbody>
      </table>
    </div>
    <!-- End #tab1 -->
  </div>
  <!-- End .content-box-content -->
</div>
<!-- End .content-box -->