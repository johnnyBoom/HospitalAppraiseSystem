<?php
/**
 * Created by PhpStorm.
 * User: JohnnyB
 * Date: 2017/12/2 0002
 * Time: 上午 9:49
 */
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}
function redirectLocation($url){
    echo "<script>window.location.href='{$url}'</script>";
}