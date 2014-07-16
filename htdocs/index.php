<?php
$conf = parse_ini_file(__DIR__ . '/../conf/db.ini');
$dsn = 'mysql:host=' . $conf['host'] . ';port=' . $conf['port'] . ';dbname=' . $conf['dbname'] . ';charset=' . $conf['charset'];
$db = new PDO($dsn, $conf['username'], $conf['password']);

$sql = 'SELECT `id`, `author`, `title`, `content` FROM `articles` LIMIT 10';

$stmt = $db->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$articles = $stmt->fetchAll();

$d = array();
$d['articles'] = $articles;
require_once __DIR__ . '/../res/layout/index.html';
