<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/21
 * Time: 14:02
 */

/**
 * 不使用array_diff，实现大数组求差集。
 *
 * PHP数组的键是由hashtable实现，所以查询数据中键存不存在效率会很高，时间负责度为O(1)。而对比键值（in_array()），
 * 则需要遍历数组中的键值逐个比较，时间复杂度为O(n)。
 *
 * 测试：PHP5.6，每个数组5000个元素，bigArrayDiff消耗时间大概为array_diff的1/5。
 *
 * @param array $arr1
 * @param array $arr2
 * @return array
 */
function bigArrayDiff(array $arr1, array $arr2)
{
    $arr2 = array_flip($arr2);
    foreach ($arr1 as $k => $v) {
        //in_array
        if (isset($arr2[$v])) {
            unset($arr1[$k]);
        }
    }

    return array_values($arr1);
}

$arr1 = range(1, 5000);
$arr2 = range(2500, 7499);

echo '<pre>';
$time = -microtime(true);
bigArrayDiff($arr1, $arr2);
$time += microtime(true);
echo round($time * 1000, 2);
