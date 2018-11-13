<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/11/13
 * Time: 14:56
 */

/**
 * 数组中元素先升序后降序，求最大数组中最大值。限制最优效率，时间复杂度O(logn)。todo
 *
 * @param $arr
 * @return mixed
 */
function getMax($arr)
{
    $length = count($arr);

    $low = 0;
    $high = $length - 1;

    while ($low < $high) {
        $mid = intval(($low + $high) / 2);

        if ($arr[$mid] > $arr[$mid - 1] && $arr[$mid] > $arr[$mid + 1]) {
            return $arr[$mid];
        }

        if ($arr[$mid] > $arr[$mid - 1] && $arr[$mid] < $arr[$mid + 1]) {
            $low = $mid + 1;
        }

        if ($arr[$mid] < $arr[$mid - 1] && $arr[$mid] > $arr[$mid + 1]) {
            $high = $mid - 1;
        }
    }

    return max($arr[$low], $arr[$high]);
}

$arr = [1, 3, 5, 8, 13, 17, 19, 20, 18, 13, 5, 4];
echo getMax($arr);