<?php

// 防止无意义ajax
if (empty($_POST['operation'])) die();

// 引入AID
require 'aid.php';

// 改输出类型
header('Content-type: application/json');

switch ($_POST['operation']) {
	case 'get_api_list': // 获取API列表
		die(json_encode(API_LIST));
	case 'verify_aid': // 判断AID是否正确
		die('"' . is_goodAID(explode('-', $_POST['aid'])) . '"');
}
