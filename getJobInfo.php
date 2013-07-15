<?php
  include './private/conn-read.php';
  $id = $_GET['id'];
  $jobInfo = getJob($id);  
?>
  <p class="title"><?php echo $jobInfo['title'];?></p>
  <p class="describe"><?php echo $jobInfo['des'];?></p>
  <h4>主要职责</h4>
  <p class="responsibilities"><?php echo preg_replace("/\n/","<br>",$jobInfo['responsibilities']);?></p>
  <h4>职位要求</h4>
  <p class="requirements"><?php echo preg_replace("/\n/","<br>",$jobInfo['requirements']);?></p>
