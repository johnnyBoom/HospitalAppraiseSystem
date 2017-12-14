<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/3 0003
 * Time: 下午 9:33
 */

require_once '../include.php';
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=strtolower($_POST['verify']);
$verify1=strtolower($_SESSION['verify']);
if($verify==$verify1){

    $sql="select * from appraise.appraise_users where number='{$username}' and password='{$password}'";
    $row=checkUser($link,$sql);
    if($row){
        $level = $row['level'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        $_SESSION['number']=$row['number'];
        $_SESSION['level'] = $level;
        switch ($level) {
            case "G":
                echo 1;//管理员
                break;
            case "L":
                echo 2;//领导
                break;
            case "P":
                echo 3;//普通用户
                break;
            default:
                echo 0;//意外错误用户
        }
    }else{
        echo 4;//密码错误
    }
}else{
   echo 5;//验证码错误
}