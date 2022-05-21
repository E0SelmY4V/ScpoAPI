<?php

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
    //  '&' => 'Pixiv CN',
    //  'hosts.json' => '获取PCN hosts'
    // ),
    'api' => array(
        '&' => 'ScpoAPI',
        'fmt?intro' => '获取API介绍示例',
        'fmt' => 'API介绍示例'
    )
);

/**
 * 检查AID是否正确
 * @param array $arr 处理过的AID数组
 * @return false|string 若正确返回名称，否则返回false
 */
function is_goodAID($arr)
{
    $now = API_LIST;
    foreach ($arr as $val)
        if (isset($now[$val])) $now = $now[$val];
        else return false;
    return is_string($now) ? $now : false;
}
