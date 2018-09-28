<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/28
 * Time: 14:08
 */

/**
 * 堆排序。这里直接使用了SPL（PHP标准库）最小堆。
 *
 * @param $arr
 * @return array
 */
function heapSort($arr)
{
    $minHeap = new SplMinHeap();

    foreach ($arr as $v) {
        $minHeap->insert($v);
    }

    $rt = [];
    while (!$minHeap->isEmpty()) {
        $rt[] = $minHeap->extract();
    }

    return $rt;
}

$arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];
echo '<pre>';
print_r(heapSort($arr));
echo '<pre>';