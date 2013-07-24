<?php
    session_start();

    // 连接memcache
    // $memcache = new Memcached();
    // $memcache->addServer('localhost', 11211) or die ("memcached无法连接");

    function connectDatabase(){
        // 数据库基本信息

        $database='localhost';
        $dbadmin='root';
        $dbpassword='wangxiao';
        $dbname='wandouHr';
        $conn=@mysql_connect($database,$dbadmin,$dbpassword) or die ("数据库无法连接!");
        mysql_query("set names utf8");
        mysql_select_db($dbname,$conn);
        return $conn;
    }

    // 账号相关
    // 检查用户是否是管理员
    function checkUser($name,$password){
        $conn = connectDatabase();
        $name = mysql_real_escape_string($name);
        $password = mysql_real_escape_string($password);
        if(!isset($name) && !isset($password)){
            return false;
        }
        $sql_select="
            select password from tb_hrAdmin where name='$name';
        ";
        $result=mysql_query($sql_select);
        while($row = mysql_fetch_array($result))
        {
            return true;
        }
        mysql_close($conn);
        return false;
    }

    // 检查并授予用户管理权限
    function login($name,$password){
        $name = mysql_real_escape_string($name);
        $password = mysql_real_escape_string($password);
        if(checkUser($name,$password)){
            $_SESSION['isLogin'] = true;
            return true;
        }else{
            return false;
        }
    }

    //职位数据操作

    //取出所有职位类别
    function listJobCategory(){
        // // global $memcache;
        // // $cacheResult = $memcache->get('wandouhr-listJobCategory');
        // if ($cacheResult) {
        //     return $cacheResult;
        // }else{
            $conn = connectDatabase();
            $sql="
                select * from tb_jobCategory;
            ";
            $result=mysql_query($sql);
            for ($i=0;$row = mysql_fetch_array($result);$i++){
                $allJobCategory[$i]['id']=$row['id'];
                $allJobCategory[$i]['category']=$row['category'];
            }
            // $memcache->set('wandouhr-listJobCategory', $allJobCategory, 3600); 
            mysql_close($conn);
            return $allJobCategory;
        // }
    }

    //取出某个类别下的职位信息
    function listJobById($categoryId){
        // global $memcache;
        // $categoryId = mysql_real_escape_string($categoryId);
        // $cacheResult = $memcache->get('wandouhr-listJobById'.$categoryId);
        // if ( $cacheResult ) {
        //     return $cacheResult;
        // }else{
            $conn = connectDatabase();
            $sql="
                select * from tb_job where category='$categoryId';
            ";
            $result=mysql_query($sql);
            for ($i=0;$row = mysql_fetch_array($result);$i++){
                $allJob[$i]['id']=$row['id'];
                $allJob[$i]['title']=$row['title'];
                $allJob[$i]['category']=$row['category'];
                $allJob[$i]['des']=$row['des'];
                $allJob[$i]['responsibilities']=$row['responsibilities'];
                $allJob[$i]['requirements']=$row['requirements'];           
            }
            // $memcache->set('wandouhr-listJobById'.$categoryId, $allJob , 3600);        
            mysql_close($conn);    
            return $allJob;
        // }
    }

    //取出职位信息
    function getJob($id){
        // global $memcache;
        // $id = mysql_real_escape_string($id);
        // $cacheResult = $memcache->get('wandouhr-getJob'.$id);
        // if ( $cacheResult ) {
        //     return $cacheResult;
        // }else{
            $conn = connectDatabase();
            $sql="
                select * from tb_job where id='$id';
            ";
            $result=mysql_query($sql);
            $row = mysql_fetch_array($result);          
            // $memcache->set('wandouhr-getJob'.$id, $row , 3600); 
            mysql_close($conn);
            return $row;
        // }
    }

?>