<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cmn-Hans" lang="cmn-Hans">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>在线阅读网</title>
    </head>
    <body>
        <h1>在线阅读网</h1>
        <div><a href="./create_article.html">写文章</a></div>
        <?php
        $file = './articles.json';
        if (file_exists($file)) {
            $tmp = file_get_contents($file);
            if (!empty($tmp)) {
                echo '<ul>';
                $data = json_decode($tmp, true);
                foreach($data as $k=>$v) {
                    $id = $k + 1;
                    echo '<li><a href="./show_article.php?id=' . $id . '">' . $v['title'] . '</a>';
                    echo '<p>' . mb_substr($v['content'], 0, 100, 'UTF-8') . '</p></li>';
                }
                echo '</ul>';
            }
        }
        ?>
    </body>
</html>
