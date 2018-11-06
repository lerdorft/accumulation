<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/26
 * Time: 16:55
 */

/**
 * 快速排序，占用额外空间
 *
 * https://itimetraveler.github.io/2017/07/18/%E5%85%AB%E5%A4%A7%E6%8E%92%E5%BA%8F%E7%AE%97%E6%B3%95%E6%80%BB%E7%BB%93%E4%B8%8Ejava%E5%AE%9E%E7%8E%B0/
 *
 * @param array $arr
 * @return array
 */
function quickSort(array $arr)
{
    $length = count($arr);

    if ($length <= 1) {
        return $arr;
    }

    $left = $right = [];

    for ($i = 1; $i < $length; $i++) {
        if ($arr[$i] < $arr[0]) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    return array_merge(quickSort($left), [$arr[0]], quickSort($right));
}


/**
 * 快速排序，不需要占用额外空间
 *
 * @param array $arr
 * @param $start
 * @param $end
 */
function quickSort2(array &$arr, $start, $end)
{
    if ($start >= $end) {
        return ;
    }

    $i = $start;
    $j = $end;

    $pivot = $arr[$start];
    while ($i < $j) {
        while ($i < $j && $arr[$j] >= $pivot) {
            $j--;
        }

        while ($i < $j && $arr[$i] <= $pivot) {
            $i++;
        }

        list($arr[$i], $arr[$j]) = [$arr[$j], $arr[$i]];
    }

    list($arr[$start], $arr[$j]) = [$arr[$j], $arr[$start]];

    quickSort2($arr, $start, $j - 1);
    quickSort2($arr, $j + 1, $end);
}


$arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];

echo '<pre>';
//print_r(quickSort($arr));
quickSort2($arr, 0, count($arr) - 1);
print_r($arr);
echo '<pre>';