<?php
$articles = array();
$file = './articles.json';
if (file_exists($file)) {
    $tmp = file_get_contents($file);
    if (!empty($tmp)) {
        $articles = json_decode($tmp, true);
    }
}

$d = array(); //d 是 data的意思，后续会用到
$d['articles'] = $articles;
require_once __DIR__ . '/index.html';
