<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-Hans" lang="zh-Hans">
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
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title><?=$article['title']?></title>
    </head>
    <body>
        <h1><?=$article['title']?></h1>
        <div>作者：<?=$article['author']?></div>
        <div><?=nl2br($article['content'])?>
        </div>
    </body>
</html>
