<?php

$frmt_arr = array(
	'code' => array('@' => '@', '介绍状态代码', 0),
	'data' => array(
		'addr' => array(
			array('@' => '@', '是否接入ScpoPHP', false),
			array('@' => '@', '可用地址列表', 'http://localhost/format-demo/'),
			array('@' => '@', '可用地址列表', 'http://nai.de.su/'),
			array('@' => '@', 1 => 'https://shao.xian.cao/2/3/4/1-glgl/'),
			array('@' => '@', 1 => 'ftp://just.a.joke/')
		),
		'desc' => array('@' => '@', 'API描述', '这是个API介绍json的示例。'),
		'mtci' => array('@' => '@', '请求方法', 'GET'),
		'type' => array('@' => '@', '返回格式', 'application/json'),
		'frmt' => array(
			'key1' => array(
				'@' => array('@' => '@', '字段介绍标识', '@'),
				array('@' => '@', '字段详细描述', '这是个简单数据'),
				array('@' => '@', '字段内容示例', 'demo data')
			),
			'key2' => array('@' => '@', '示例字段2', array(
				'@' => '@', '这是个数组',
				array('demo arr element 0', 'demo arr element 1')
			)),
			'hide' => array('@' => '@', '无描述字段', array(
				'@' => '@', 1 => 'no-desc data'
			)),
			'sdk1' => array('@' => '@', '相同描述字段', array(
				'@' => '@', '我们描述相同', 'same-desc key 1'
			)),
			'sdk2' => array('@' => '@', '相同描述字段', array(
				'@' => '@', '我们描述相同', 'same-desc key 2'
			)),
			'objs' => array('@' => '@', '示例对象', array(
				'objkey' => array('@' => '@', '这是个对象里的简单数据', 'demo data in obj')
			)),
			'arrs' => array('@' => '@', '示例数组', array(
				array('@' => '@', '这是个数组里的简单数据', 'demo data in arr'), array(
					'@' => '@', '这是个数组里的对象',
					array('a' => 'demo obj-a in arr', 'b' => 'demo obj-b in arr')
				)
			))
		)
	)
);

header('Content-type: application/json');

die(json_encode(
	substr_compare($uri, 'intro?intro', -11, 11) === 0
		? array(
			'code' => 0,
			'data' => array(
				'addr' => array(true, "http://{$_SERVER['HTTP_HOST']}/fmt?intro"),
				'desc' => '此API可以获取一个示例的ScpoAPI介绍json。' .
					'<br />本API获取的示例的效果<a href="./intro?api-fmt">在此查看</a>',
				'mtci' => 'GET',
				'type' => 'application/json',
				'frmt' => array(
					'code' => array('@' => '@', '状态代码', 0),
					'info' => array('@' => '@', '状态信息', 'success'),
					'time' => array('@' => '@', '请求时间', '1687-04-19 10:05:49'),
					'data' => $frmt_arr
				)
			)
		)
		: ($s = function (&$a) use (&$s) {
			if (key_exists('@', $a) && $a['@'] === '@') foreach (array(0, 1) as $i) $r[$i] = isset($a[$i]) ? $a[$i] : '';
			else foreach ($a as $k => $v) if (is_array($v)) foreach ($s($v) as $i => $o) $r[$i][$k] = $o;
			return $r;
		})($frmt_arr)[1]
));
