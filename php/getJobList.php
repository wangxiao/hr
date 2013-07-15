<?php
	include '../private/conn-read.php';
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!$_SESSION['isLogin']){
		header("Location:".$url."login.html");
	}
	$categoryId=$_GET['category'];
	$jobList = listJobById($categoryId);
  if(count($jobList)>0){
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
              <a>
                <?php echo $value["title"];?>
              </a>
            </td>
            <td>|</td>
            <td>
              <!-- Icons -->
              <a class="edit-job-btn" href="#" title="Edit" data-job-id="<?php echo $value['id'];?>"><img src="http://img.wdjimg.com/image/join/icons/pencil.png" alt="Edit" /></a> 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a class="del-job-btn" href="#" title="Delete" data-job-id="<?php echo $value['id'];?>"><img src="http://img.wdjimg.com/image/join/icons/cross.png" alt="Delete" /></a></td>
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

<?php }else{ ?>

<div class="content-box">
  <!-- Start Content Box -->
  <div class="content-box-header">
    <h3>职位列表</h3>
  </div>
  <!-- End .content-box-header -->
  <div class="content-box-content">
    <p>该职位类别下面没有职位信息，请去其他功能中添加职位信息中添加。</p>
  </div>
  <!-- End .content-box-content -->
</div>
<!-- End .content-box -->

<?php } ?>