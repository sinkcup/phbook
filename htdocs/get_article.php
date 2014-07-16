<?php
$input = $_GET;
$d = array();
if (!isset($input['id']) || empty($input['id'])) {
    $d['notice'] = array(
        'msg' => '出错了：缺少参数',
    );
    require __DIR__ . '/../res/layout/notice.html';
    exit;
}

$conf = parse_ini_file(__DIR__ . '/../conf/db.ini');
$dsn = 'mysql:host=' . $conf['host'] . ';port=' . $conf['port'] . ';dbname=' . $conf['dbname'] . ';charset=' . $conf['charset'];
$db = new PDO($dsn, $conf['username'], $conf['password']);

$sql = 'SELECT `author`, `title`, `content` FROM `articles` WHERE id=' . $input['id'] . ' LIMIT 1';

$stmt = $db->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$r = $stmt->fetchAll();

if (empty($r)) {
    $d['notice'] = array(
        'msg' => '出错了：查无此文',
    );
    require __DIR__ . '/../res/layout/notice.html';
    exit;
}

$d = array();
$d['article'] = $r[0];
require_once __DIR__ . '/../res/layout/get_article.html';
