<?php

/**跳转时携带的信息的键名 */
const JUMPV = 'the_data_user_need_to_take_when_they_are_jumping_to_own_api';

/**
 * 尝试跳转到正确的ownapi.php
 * @param string $info 跳转时携带的信息
 */
function diejump($info)
{
	die(header('Location: ../../php/ownapi.php?&' . JUMPV . '=' . urlencode($info)));
}
