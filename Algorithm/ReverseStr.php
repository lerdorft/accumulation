<?php

/**
 * 反转字符串
 *
 * @param string $str
 * @return string
 */
function reverseStr(string $str) : string
{
	$len = mb_strlen($str);

	$newStr = '';
	while ($len) {
		$newStr .= $str[$len - 1];
		$len--;
	}

	return $newStr;
}

$str = 'hello world';
echo reverseStr($str);