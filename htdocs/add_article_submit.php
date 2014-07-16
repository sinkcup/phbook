<?php
$input = $_POST;
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=reader;charset=utf8';
$user = 'root';
$password = '1';
$db = new PDO($dsn, $user, $password); //连接数据库

$sql = 'INSERT INTO `articles` (`author`, `title`, `content`) VALUES (' . '\'' . $input['author'] . '\',\'' . $input['title'] . '\',\'' . $input['content'] . '\');';

$stmt = $db->query($sql); //执行SQL
$id = $db->lastInsertId(); //获得自增id

if (!empty($id)) {
    $notice = '保存成功';
} else {
    $notice = '出错了';
}
$d = array();
$d['notice'] = array(
    'msg' => $notice,
);
require_once __DIR__ . '/notice.html';
