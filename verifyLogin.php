<?php
header("Content-Type: text/html; charset=utf-8");
//开启Session
session_start();
$name = $pwd = $rem = '';
if (!(empty($_POST))){
    $name = $_POST['username'];
    $pwd = $_POST['password'];
           
    //首先判断验证码是否正确   
    //图片中的验证码
    $pin_input = $_SESSION['pin'];
    //输入的验证码
    $pin_right = $_POST['pin'];
    //去掉空格并把字母转为小写
    $pin_input = strtolower(str_replace(" ","",$pin_input));
    $pin_right = strtolower(str_replace(" ","",$pin_right));
    if ($pin_input != $pin_right) {
        echo '验证码错误！';
        exit();
    }
    
    
    if(!empty($_POST['rememberpwd'])){
        $rem = $_POST['rememberpwd'];
        if ($rem == 'remember'){
			saveUserToFile($name, $pwd);
        }
    }    
    if (!($name)){
        echo '用户名为空！';
        exit();
    }
    if (!($pwd)){
        echo '密码为空！';
        exit();
    }
	
    $host =  'localhost'; 	//指定MySQL服务器
    $username = 'root';	//指定用户名
    $password = ''; 	//指定登录密码
    $dbname = 'test'; 	//指定数据库名称
    $link = mysqli_connect($host,$username,$password,$dbname) or die("连接失败: " . mysqli_connect_errno()); //连接数据库
    mysqli_set_charset($link, 'utf-8');
    if($link)
    {
        $sql = "SELECT uname,password FROM user where uname=? and password=?";
        //预处理SQl语句
        $stmt = mysqli_prepare($link, $sql);
        //参数绑定
        mysqli_stmt_bind_param($stmt, 'ss', $name, $pwd);
        mysqli_stmt_execute($stmt);        
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_bind_result($stmt,$uname,$upwd);
		
		if (!(mysqli_stmt_fetch($stmt))){
            echo '该用户名不存在或密码错误！';
            exit();
        }else{
			header("refresh:2;url=inputMoney.php");
			print("登录成功，请稍等...");
			
		}
	}
	
	
}


?>