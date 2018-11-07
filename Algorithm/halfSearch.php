<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/11/7
 * Time: 15:05
 */

/**
 * 二分（折半）查找
 *
 * https://www.cnblogs.com/bumiantu/archive/2012/06/03/2533230.html
 * https://www.kancloud.cn/daiji/phpsf/481129
 *
 * @param $arr
 * @param $target
 * @return int
 */
function halfSearch($arr, $target)
{
    $length = count($arr);

    $low = 0;
    $high = $length - 1;

    while ($low <= $high) {
        $mid = intval(($low + $high) / 2);

        if ($arr[$mid] > $target) {
            $high = $mid - 1;
        } else if ($arr[$mid] < $target) {
            $low = $mid + 1;
        } else {
            return $mid;
        }
    }
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

echo halfSearch($arr, 6);