<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/20
 * Time: 16:19
 */


/**
 * 归并排序
 *
 * @param array $arr
 * @return array
 */
function mergeSort(array $arr)
{
    $length = count($arr);

    if ($length <= 1) {
        return $arr;
    }

    $half = ceil($length / 2); // $length >> 1 + 1;

    $arr2d = array_chunk($arr, $half);

    $left = mergeSort($arr2d[0]);
    $right = mergeSort($arr2d[1]);

    $rt = [];
    while (count($left) && count($right)) {
        if ($left[0] < $right[0]) {
            $rt[] = array_shift($left);
        } else {
            $rt[] = array_shift($right);
        }
    }

    return array_merge($rt, $left, $right);
}


$arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];
print_r(mergeSort($arr));