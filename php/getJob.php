<?php
  //取得job信息，准备编辑
  include 'conn.php';
  $cookieUser=$_COOKIE['name'];
  $cookiePassword=$_COOKIE['password']; 
  $url = preg_replace("/php\/[^\/]*$/","",$_SERVER['REQUEST_URI']);
  if(!checkUser($cookieUser,$cookiePassword)){
    header("Location:".$url."login.html");
  }
  $jobId=$_GET['jobId'];
  $jobInfo=getJob($jobId);
  $jobCategory=listJobCategory();
?>
<form id="editJob" method="post" action="./editJob.php">
  <fieldset>
  <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
  <input type="hidden" name="id" value="<?php echo $jobInfo['id'];?>"/>
  <p>
    <label>职位名称</label>
    <input class="text-input small-input" type="text" name="title" value="<?php echo $jobInfo['title'];?>"/>
    <!-- Classes for input-notification: success, error, information, attention -->
  </p>
  <p>
    <label>所属分类</label>
    <select name="category" class="small-input">
      <?php foreach($jobCategory as $key=>$value){ ?>
      <option value="<?php echo $value['id'];?>" <?php if($value['id']==$jobInfo['category']){ ?>selected="selected"<?php }?>><?php echo $value['category'];?></option>
      <?php } ?>
    </select>
  </p>
  <p>
    <label>职位简介</label>
    <textarea class="text-input textarea" name="des" cols="79" rows="15">
      <?php echo $jobInfo['des'];?>
    </textarea>
  </p>
  <p>
    <label>主要职责</label>
    <textarea class="text-input textarea" name="responsibilities" cols="79" rows="15">
      <?php echo $jobInfo['responsibilities'];?>
    </textarea>
  </p>
  <p>
    <label>职位要求</label>
    <textarea class="text-input textarea" name="requirements" cols="79" rows="15">
      <?php echo $jobInfo['requirements'];?>
    </textarea>
  </p>
  <p>
    <input class="button" type="submit" value="Submit" />
  </p>
  </fieldset>
  <div class="clear"></div>
  <!-- End .clear -->
</form>