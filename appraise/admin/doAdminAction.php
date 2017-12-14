<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/7 0007
 * Time: 下午 8:21
 */
require_once "../include.php";
$act = $_REQUEST['act'];
if ($act == "logout"){
    logout();
}