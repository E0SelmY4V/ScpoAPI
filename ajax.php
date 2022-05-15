<?php

header('Content-type: application/json');

if (empty($_POST['operation'])) die();
switch ($_POST['operation']) {
	case 'get_api_list':
		die(json_encode(API_LIST));
	case 'verify_aid':
		die('"' . is_goodAID(explode('-', $_POST['aid'])) . '"');
}
