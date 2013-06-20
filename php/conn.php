<?php

	// 数据库基本信息
	$database='localhost';
	$dbadmin='root';
	$dbpassword='wangxiao';
	$dbname='wandouHr';
    $conn=@mysql_connect($database,$dbadmin,$dbpassword) or die ("数据库无法连接!");
	mysql_select_db($dbname,$conn);

	// 账号相关

	// 检查用户是否是管理员
	function checkUser($name,$password){
		if($name==NULL&&$password==NULL){
			return false;
		}
		$sql_select="
			select name,password from tb_hrAdmin
			where name='$name' and password='$password';
		";
		$result=mysql_query($sql_select);
		if($result!=NULL){
			return true;
		}else {
			return false;
		}
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

?>