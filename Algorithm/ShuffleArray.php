<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/11/17
 * Time: 11:13
 */

/**
 * 打乱数组顺序思路，如果数组元素数量海量，处理效果不好
 *
 * @param $arr
 * @return mixed
 */
function myShuffle($arr)
{
    $length = count($arr);

    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $length - 1);

        if ($i != $rand) {
            list($arr[$i], $arr[$rand]) = [$arr[$rand], $arr[$i]];
        }
    }

    return $arr;
}

$arr = range(1, 1000);
echo '<Pre>';
print_r(myShuffle($arr));
echo '<pre>';