<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/11/6
 * Time: 11:23
 */

/**
 * 选择排序，时间复杂度O(n2)。不稳定
 *
 * @param array $arr
 * @return array
 */
function selectSort(array $arr)
{
    $length = count($arr);

    for ($i = 0; $i < $length - 1; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < $length; $j++) {
            if ($arr[$min] > $arr[$j]) {
                $min = $j;
            }
        }

        list($arr[$min], $arr[$i]) = [$arr[$i], $arr[$min]];
    }

    return $arr;
}

$arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];

echo '<Pre>';
print_r(selectSort($arr));
echo '<Pre>';