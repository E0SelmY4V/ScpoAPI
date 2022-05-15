<?php

/**检查AID是否正确 */
function is_goodAID($arr)
{
	$now = API_LIST;
	foreach ($arr as $val)
		if (isset($now[$val])) $now = $now[$val];
		else return false;
	return is_string($now) ? $now : false;
}

/**API列表 */
const API_LIST = array(
	'sc' => array(
		'&' => '|简·陋|系列程序',
		'list' => '获取|简·陋|系列程序列表',
		'chaip' => array(
			'&' => '查ip工具',
			'self' => '获取本机IP信息',
			'check' => '查看钩子情况'
		)
	),
	// 'pcn' => array(
	// 	'&' => 'Pixiv CN',
	// 	'hosts.json' => '获取PCN hosts'
	// ),
	'api' => array(
		'&' => 'ScpoAPI',
		'fmt?intro' => '获取API介绍示例',
		'fmt' => 'API介绍示例'
	)
);

// 如果是AJAX请求
if (!$_SERVER['QUERY_STRING'])
	include 'ajax.php';

// 访问的如果不是外部API
if (substr_compare($uri = $_SERVER['QUERY_STRING'], 'fmt', 0, 3) === 0)
	include 'fmtapi.php';

// 获取$uri和$get
$arr = explode('&', $uri, 2);
$uri = $arr[0];
$get = isset($arr[1]) ? '?' . $arr[1] : '';

// 判断是否合法
$arr = explode('/', $uri);
if (end($arr) === '') array_pop($arr);
if (!is_goodAID($arr)) {
	header('HTTP/1.1 404 Not Found');
	header('Status: 404 Not Found');
	die();
}

// 合成url
$dmn = $_SERVER['HTTP_HOST'];
$dmn = substr($dmn, strpos($dmn, '.'));
$arr = explode('/', $uri, 2);
header("Location: http://{$arr[0]}$dmn/{$arr[1]}$get");
