<?php
$articles = [];
$file = './articles.json';
if (file_exists($file)) {
    $tmp = file_get_contents($file);
    if (!empty($tmp)) {
        $articles = json_decode($tmp, true);
    }
}

$d = []; //d 表示 data，后面会用到
$d['articles'] = $articles;
require_once __DIR__ . '/index.html';
