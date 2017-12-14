<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/3 0003
 * Time: 下午 10:47
 */
/**
 * 检查管理员是否存在
 * @param $link
 * @param $sql
 * @return array|null
 */
function checkUser($link,$sql){
    return fetchOne($link,$sql);
}

/**
 * 检查是否登录
 */
function checkLogined(){
    if ((!isset($_SESSION['id']) || $_SESSION['id']=="")){
        redirectLocation("./login.html");
    }
}

/**
 * 注销用户
 */
function logout(){
    $_SESSION = array();
    session_destroy();
    header("location:../login.html");
}