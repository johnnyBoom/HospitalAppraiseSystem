<?php
/**
 * Created by PhpStorm.
 * User: JohnnyB
 * Date: 2017/12/2 0002
 * Time: 上午 9:47
 */
/**
 * 连接数据库
 * @return mysqli
 */
function connect(){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);

    if (!$link) {
        die('数据库连接失败 (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    }
    $link->query("SET NAMES utf8");
    return $link;
}

/**
 * 插入
 * @param  string $table
 * @param array $array
 * @param $link
 * @return int
 */
function insert($link,$table,$array){
    $keys=join(",",array_keys($array));
    $values="'".join("','",array_values($array))."'";
    $sql="insert {$table}($keys) values({$values})";
    mysqli_query($link,$sql);
    return mysqli_insert_id($link);
}

/**
 * 更改
 * @param $table
 * @param $array
 * @param null $where
 * @param $link
 * @param null $str
 * @return bool|int
 */
function update($link,$table,$array,$where=null,$str = null){
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result= mysqli_query($link,$sql);
    //var_dump($result);
    //var_dump(mysqli_affected_rows());exit;
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }
}

/**
 * 删除
 * @param $table
 * @param $link
 * @param null $where
 * @return int
 */
function delete($table,$link,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}

/**
 * 得到指定的一条记录
 * @param $link
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchOne($link,$sql){
    $result=mysqli_query($link,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }
    $row =mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($link);
    return $row;
}

/**得到结果集中所有记录
 * @param $link
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchAll($link,$sql,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param $link
 * @param $sql
 * @return int
 */
function getResultNum($link,$sql){
    $result=mysqli_query($link,$sql);
    return mysqli_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @param $link
 * @return int|string
 */
function getInsertId($link){
    return mysqli_insert_id($link);
}
