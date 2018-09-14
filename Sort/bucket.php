<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/14
 * Time: 10:59
 */

/**
 * 桶排序实现
 *
 * @param array $arr
 * @return array
 */
function bucketSort(array $arr)
{
    $min = min($arr);
    $max = max($arr);

    //构造桶
    $bucket = array_fill($min, $max - $min + 1, 0);

    //入桶
    foreach ($arr as $v) {
        $bucket[$v]++;
    }

    //出桶
    $sortArr = [];
    foreach ($bucket as $k => $v) {
        for ($i = 1; $i <= $v; $i++) {
            $sortArr[] = $k;
        }
    }

    return $sortArr;
}

$arr = [99, 1, 2, 5, 9, 8, 13, 24];

print_r(bucketSort($arr));

