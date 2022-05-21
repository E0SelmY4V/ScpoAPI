<?php

// 跳转到正确的ownapi.php
require 'jumpv.php';
if (isset($_GET[JUMPV])) diejump($_GET[JUMPV]);

// 引入AID
require 'aid.php';

// 获取$uri和$get
if (($pos = strpos($uri = $_SERVER['QUERY_STRING'], '&')) !== false) {
	$get = substr($uri, $pos);
	$uri = substr($uri, 0, $pos);
	$get[0] = '?';
} else $get = '';

// 判断是否合法
$arr = explode('/', $uri);
if ($arr[0] == 'api') diejump("{$arr[1]}$get");
if (end($arr) === '') array_pop($arr);
if (is_goodAID($arr) === false) {
	header('HTTP/1.1 404 Not Found');
	header('Status: 404 Not Found');
	die();
}

// 合成url
$dmn = $_SERVER['HTTP_HOST'];
$dmn = substr($dmn, strpos($dmn, '.'));
$arr = explode('/', $uri, 2);
header("Location: http://{$arr[0]}$dmn/{$arr[1]}$get");
