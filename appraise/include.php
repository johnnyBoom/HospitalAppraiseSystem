<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/3 0003
 * Time: 下午 6:26
 */
//session_start();
header("content-type:text/html;charset=utf-8");
define("ROOT",dirname(__FILE__));
set_include_path(ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs");
session_start();
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'mysql.func.php';
require_once 'page.func.php';
require_once 'string.func.php';
require_once 'upload.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
$link = connect();