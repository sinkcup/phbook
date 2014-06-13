<?php
$input = $_POST;
$file = './articles.json';
$data = array();
if (file_exists($file)) {
    $tmp = file_get_contents($file); //读取文件，变成字符串
    if (!empty($tmp)) {
        $data = json_decode($tmp, true); //json解码成array
    }
}
$data[] = $input;
file_put_contents($file, json_encode($data)); //把字符串保存到文件

$d = array(); //d 是 data的意思，后续会用到
$d['notice'] = array(
    'msg' => '保存成功',
);
require_once __DIR__ . '/notice.html';
