<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/28
 * Time: 14:08
 */

/**
 * 只是利用了堆的数据结构，不算正经堆排序，并且需要额外空间。这里直接使用了SPL（PHP标准库）最小堆。
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

/**
 * 堆排序（正经堆排序思路实现）
 *
 * @param $arr
 * @return mixed
 */
function heapSort2($arr)
{
    $length = count($arr);
    $mid = intval($length / 2);
    for ($i = $mid; $i >= 0; $i--) {
        heapify($arr, $i, $length);
    }

    $heapEnd = $length - 1;
    for ($i = $heapEnd; $i >= 0; $i--) {
        list($arr[0], $arr[$heapEnd]) = [$arr[$heapEnd], $arr[0]];
        heapify($arr, 0, $heapEnd);
        $heapEnd--;
    }

    return $arr;
}

/**
 * 堆化
 *
 * @param array $arr
 * @param $i
 * @param $length
 */
function heapify(array &$arr, $i, $length)
{
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;

    if ($left < $length && $arr[$largest] < $arr[$left]) {
        $largest = $left;
    }

    if ($right < $length && $arr[$largest] < $arr[$right]) {
        $largest = $right;
    }

    if ($largest != $i) {
        list($arr[$i], $arr[$largest]) = [$arr[$largest], $arr[$i]];
        heapify($arr, $largest, $length);
    }
}

$arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];
echo '<pre>';
print_r(heapSort2($arr));
echo '<pre>';