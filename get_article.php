<?php
$input = $_GET;
$id = $input['id'];
$file = './articles.json';
if (file_exists($file)) {
    $tmp = file_get_contents($file);
    if (!empty($tmp)) {
        $articles = json_decode($tmp, true);
        $article = $articles[$id-1];
    }
}

$d = array();
$d['article'] = $article;
require_once __DIR__ . '/get_article.html';
