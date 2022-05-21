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
if (is_goodAID($arr) === false) include '../../php/error/404.php';

// 合成url
$dmn = $_SERVER['HTTP_HOST'];
$dmn = substr($dmn, strpos($dmn, '.') + 1);
$arr = explode('/', str_ireplace(':', '/', $uri), 2);
$hdr = $arr[0][0] == '@' ? '' : $arr[0] . '.';
header("Location: http://$hdr$dmn/{$arr[1]}$get");
