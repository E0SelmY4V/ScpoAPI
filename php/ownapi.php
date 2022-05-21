<?php

// 跳转到真正的ownapi.php
require 'jumpv.php';
if (isset($_GET[JUMPV])) die(header('Location: ./ownapi.php?api=' . $_GET[JUMPV]));

// 要使用的API
if (empty($_GET['api'])) die();
if (($pos = strpos($api = $_GET['api'], '?')) !== false) $api = substr($api, 0, $pos);
switch ($api) {
	case "fmt":
		include '../api/fmt.php';
}
