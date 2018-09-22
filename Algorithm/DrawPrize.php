<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/22
 * Time: 11:38
 */

/**
 * 转盘抽奖模拟
 *
 * 如果需要设置奖品数据量，可用redis记录每种奖品数量。奖品数量大于0，并且随机数命中本奖品范围内时，获得该奖品。
 *
 * @return string
 */
function prize()
{
    $randNum = mt_rand(1, 100);

    if ($randNum <= 10) {
        $rt = '一等奖';
    } else if ($randNum >= 11 && $randNum <= 30) {
        $rt = '二等奖';
    } else if ($randNum >= 31 && $randNum <= 60) {
        $rt = '三等奖';
    } else {
        $rt = '谢谢惠顾';
    }

    return $rt;
}

$arr = [];
for ($i = 0; $i < 1000; $i++) {
    $arr[] = prize();
}

echo '<pre>';
print_r(array_count_values($arr));
echo '<pre>';