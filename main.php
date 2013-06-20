<?php
	$database='localhost';
	$dbadmin='root';
	$dbpassword='wangxiao';
	$dbname='wandou-hr';
    $conn=@mysql_connect($database,$dbadmin,$dbpassword) or die ("数据库无法连接!");
	mysql_select_db($dbname,$conn);

	function addPorker($hearts,$spades,$diamonds,$clubs,$method){
		$status=0;
		$sql="
			insert into tb_porker (hearts,spades,diamonds,clubs,method,status) 
			 value ('$hearts','$spades','$diamonds','$clubs','$method','$status');
		";
		mysql_query($sql) or die("添加失败");		
	}
	
	function delPorker($id){
			$sql_del="
			 delete from tb_porker where id='$id';
			";
			mysql_query($sql_del) or die("删除失败");
			return true;
	}
	
	function listOne($id=NULL){
	 if($id==NULL){	
		$sql="
			select * from tb_porker
			where status=(
				select min(status) from tb_porker
			)
		";
		$result=mysql_query($sql);
		$onePorker = mysql_fetch_array($result);        
    	$onePorker['status']++;
    	$id=$onePorker['id'];
    	$status=$onePorker['status'];    	
		$sql="
			update tb_porker set status='$status' 
		    where id='$id';
		";
		mysql_query($sql) or die("无法设置status");
	 }else{
	 	$sql="
			select * from tb_porker
			where id=$id;
		";
		$result=mysql_query($sql);
		$onePorker = mysql_fetch_array($result);  
	 }
		return $onePorker;
	}
		
	function listPorker(){
		$sql="
			select * from tb_porker;
		";
		$result=mysql_query($sql);
		for ($i=0;$row = mysql_fetch_array($result);$i++){
    	     $allPorker[$i]['id']=$row['id'];  	
    	     $allPorker[$i]['hearts']=$row['hearts'];  	
    	     $allPorker[$i]['spades']=$row['spades'];  	
    	     $allPorker[$i]['diamonds']=$row['diamonds'];  	    	     
    	     $allPorker[$i]['clubs']=$row['clubs'];
    	     $allPorker[$i]['method']=$row['method'];
    	     $allPorker[$i]['status']=$row['status'];        
    	    }	
    	return $allPorker;
	}
	
	function addUser($user,$password,$name,$sex,$most=0){
		$password=md5($password);
		$sql="
		 insert into tb_user(user,password,name,sex,most) 
		 value ('$user','$password','$name','$sex','$most'); 
		";
		mysql_query($sql) or die("无法添加新用户");
	}
/**
 * 检查用户
 * @param $user
 * @param $password
 */
  function checkUser($user,$password){
  	if($user==NULL&$password==NULL){return false;}
     $sql_select="
         select user,password from tb_user
         where user='$user' and password='$password';     
     ";
      $result=mysql_query($sql_select);
      if($result!=NULL){
      	   return true;
      }else {
      		return false;
      }
  }
/**
 *  检查并授予用户管理权限
 * @param unknown_type $user
 * @param unknown_type $password
 */
  function login($user,$password){
    if(checkUser($user,$password)){
      setcookie('user',$user,time()+3600);
	  setcookie('password',$password,time()+3600);
      return true; 
    }else{
      return false;
    }
  }
  
  function showMost(){
  	$sql="
       select name,most from tb_user order by most desc
  	";
  	$result=mysql_query($sql);
	for ($i=0;$row = mysql_fetch_array($result);$i++){
		$mostPeople[$i]['name']=$row['name'];
		$mostPeople[$i]['most']=$row['most'];
	}
	return $mostPeople;
  }
  
  function mostAddOne($id){
  	$sql="
  		select most from tb_user where id='$id';
  	";
  	$result=mysql_query($sql);
  	$result=mysql_fetch_array($result);
  	$most=$result['most'];
  	$most++;
  	$sql="
  		update tb_user set most='$most' 
		where id='$id';
  	";
  	mysql_query($sql) or die("无法改变most");
  }
  
  function getUserId($user){
  	$sql="
  		select id from tb_user where user='$user';
  	";
  	$result=mysql_query($sql);
  	$result=mysql_fetch_array($result);
  	return $result['id'];
  }
?>