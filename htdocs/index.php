<?php
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=reader;charset=utf8';
$user = 'root';
$password = '1';
$db = new PDO($dsn, $user, $password);

$sql = 'SELECT `id`, `author`, `title`, `content` FROM `articles` LIMIT 10';

$stmt = $db->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$articles = $stmt->fetchAll();

$d = array();
$d['articles'] = $articles;
require_once __DIR__ . '/index.html';
