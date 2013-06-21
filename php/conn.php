<?php

	// 数据库基本信息
	$database='localhost';
	$dbadmin='root';
	$dbpassword='wangxiao';
	$dbname='wandouHr';
    $conn=@mysql_connect($database,$dbadmin,$dbpassword) or die ("数据库无法连接!");
    mysql_query("set names utf8");
	mysql_select_db($dbname,$conn);

	// 账号相关

	// 检查用户是否是管理员
	function checkUser($name,$password){
		if($name==NULL&&$password==NULL){
			return false;
		}
		$sql_select="
			select password from tb_hrAdmin
			where name='$name';
		";
		$result=mysql_query($sql_select);
		while($row = mysql_fetch_array($result))
		{
			return true;
		}
		return false;
	}

	// 检查并授予用户管理权限
	function login($name,$password){
		if(checkUser($name,$password)){
			setcookie('name',$name,time()+3600);
			setcookie('password',$password,time()+3600);
			return true; 
		}else{
			return false;
		}
	}

	//职位数据操作

	//取出所有职位类别
	function listJobCategory(){
		$sql="
			select * from tb_jobCategory;
		";
		$result=mysql_query($sql);
		for ($i=0;$row = mysql_fetch_array($result);$i++){
			$allJobCategory[$i]['id']=$row['id'];
			$allJobCategory[$i]['category']=$row['category'];
		}
		return $allJobCategory;
	}

	//增加一个职位类别
	function addJobCategory($category){
		$sql="
			insert into tb_jobCategory (category) value ('$category');
		";
		mysql_query($sql) or die("添加失败");
	}

	//修改一个职位类别
	function editJobCategory($id,$category){
		$sql="
  			update tb_jobCategory set category='$category' where id='$id';
  		";
  		mysql_query($sql) or die("修改失败");
	}

	//删除一个职位类别
	function delJobCategory($id){
		$sql_del="
			delete from tb_jobCategory where id='$id';
		";
		mysql_query($sql_del) or die("删除失败");
	}

	//取出某个类别下的职位信息
	function listJobById($categoryId){
		$sql="
			select * from tb_job where category='$categoryId';
		";
		$result=mysql_query($sql);
		for ($i=0;$row = mysql_fetch_array($result);$i++){
			$allJob[$i]['id']=$row['id'];
			$allJob[$i]['title']=$row['title'];
			$allJob[$i]['category']=$row['category'];
			$allJob[$i]['describe']=$row['describe'];
		}
		return $allJob;
	}

	//取出职位信息
	function getJob($id){
		$sql="
			select * from tb_job where id='$id';
		";
		$result=mysql_query($sql);
		for ($i=0;$row = mysql_fetch_array($result);$i++){
			$jobInfo[$i]['id']=$row['id'];
			$jobInfo[$i]['title']=$row['title'];
			$jobInfo[$i]['describe']=$row['describe'];
		}
		return $jobInfo;
	}

	//增加一个职位到对应类别下
	function addJob($title,$describe,$categoryId){
		$sql="
			insert into tb_job (title,describe,category) value ('$title','$describe','$category');
		";
		mysql_query($sql) or die("添加失败");
	}

	//修改一个职位
	function editJob($id,$title,$describe,$categoryId){
		$sql="
  			update tb_job set title='$title' describe='$describe' category='$categoryId' where id='$id';
  		";
  		mysql_query($sql) or die("修改失败");
	}

	//删除一个职位
	function delJob($id){
		$sql_del="
			delete from tb_job where id='$id';
		";
		mysql_query($sql_del) or die("删除失败");
	}

?>