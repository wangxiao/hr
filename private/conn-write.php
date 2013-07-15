<?php

	// 数据库基本信息

	// $database='localhost';
	// $dbadmin='root';
	// $dbpassword='wangxiao';
	// $dbname='wandouHr';
    $conn=@mysql_connect($database,$dbadmin,$dbpassword) or die ("数据库无法连接!");
    mysql_query("set names utf8");
	mysql_select_db($dbname,$conn);

	// 账号相关
	//职位数据操作

	//取出所有职位类别
	//增加一个职位类别
	function addJobCategory($category){
		$category = mysql_real_escape_string($category);
		$sql="
			insert into tb_jobCategory (category) value ('$category');
		";
		mysql_query($sql) or die("添加失败");
	}

	//修改一个职位类别
	function editJobCategory($id,$category){
		$id = mysql_real_escape_string($id);
		$category = mysql_real_escape_string($category);
		$sql="
  			update tb_jobCategory set category='$category' where id='$id';
  		";
  		mysql_query($sql) or die("修改失败");
	}

	//删除一个职位类别
	function delJobCategory($id){
		$id = mysql_real_escape_string($id);
		$sql_del="
			delete from tb_jobCategory where id='$id';
		";
		mysql_query($sql_del) or die("删除失败");
	}

	//取出职位信息

	//增加一个职位到对应类别下
	function addJob($title,$des,$responsibilities,$requirements,$category){
		$title = mysql_real_escape_string($title);
		$des = mysql_real_escape_string($des);
		$responsibilities = mysql_real_escape_string($responsibilities);
		$requirements = mysql_real_escape_string($requirements);
		$category = mysql_real_escape_string($category);
		$sql="
			insert into tb_job (title,des,responsibilities,requirements,category) value ('$title','$des','$responsibilities','$requirements','$category');
		";
		echo $sql;
		mysql_query($sql) or die("添加失败");
	}

	//修改一个职位
	function editJob($id,$title,$des,$responsibilities,$requirements,$categoryId){
		$id = mysql_real_escape_string($id);
		$title = mysql_real_escape_string($title);
		$des = mysql_real_escape_string($des);
		$responsibilities = mysql_real_escape_string($responsibilities);
		$requirements = mysql_real_escape_string($requirements);
		$categoryId = mysql_real_escape_string($categoryId);
		$sql="
			update tb_job set title='$title',des='$des',responsibilities='$responsibilities',requirements='$requirements',category='$categoryId' where id='$id'
  		";
  		@mysql_query($sql) or die("修改失败");
  		return true;
	}

	//删除一个职位
	function delJob($id){
		$id = mysql_real_escape_string($id);
		$sql_del="
			delete from tb_job where id='$id';
		";
		echo $sql_del;
		mysql_query($sql_del) or die("删除失败");
		return true;
	}

?>