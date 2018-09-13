<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/13
 * Time: 17:43
 */


/**
 * 二维数组，按键值排序
 *
 * @param array $arr
 * @param $key
 * @param int $order
 * @return array|bool
 */
function arraySort(array $arr, $key, $order = 0)
{
    $tmp = [];

    foreach ($arr as $k => $v) {
        if (!isset($v[$key])) {
            return false;
        }

        $tmp[$k] = $v[$key];
    }

    $order == 0 ? asort($tmp) : arsort($tmp);

    $sortArr = [];

    foreach ($tmp as $k => $v) {
        $sortArr[$k] = $arr[$k];
    }

    return $sortArr;
}

//测试
$person = [
    ['id' => 2, 'name' => 'zhangsan', 'age' => 23],
    ['id' => 5, 'name' => 'lisi',' age' => 28],
    ['id' => 3, 'name' => 'apple', 'age' => 17]
];

print_r(arraySort($person, 'age', 1));
