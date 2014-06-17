<?php
$input = $_GET;
$d = array();
if (!isset($input['id']) || empty($input['id'])) {
    $d['notice'] = array(
        'msg' => '出错了：缺少参数',
    );
    require __DIR__ . '/notice.html';
    exit;
}

$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=reader;charset=utf8';
$user = 'root';
$password = '1';
$db = new PDO($dsn, $user, $password);

$sql = 'SELECT `author`, `title`, `content` FROM `articles` WHERE id=' . $input['id'] . ' LIMIT 1';

$stmt = $db->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$r = $stmt->fetchAll();

if (empty($r)) {
    $d['notice'] = array(
        'msg' => '出错了：查无此文',
    );
    require __DIR__ . '/notice.html';
    exit;
}

$d = array();
$d['article'] = $r[0];
require_once __DIR__ . '/get_article.html';
