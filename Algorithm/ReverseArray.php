<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/11
 * Time: 21:08
 */

/**
 * 非关联数据，不借助PHP内置函数，不生成新数组。逆序数组
 *
 * @param array $arr
 * @return mixed
 */
function arrayReverse(array $arr)
{
    $length = count($arr);
    $halfLength = floor($length / 2);

    for ($i = 0; $i < $halfLength; $i++) {
        list($arr[$i], $arr[$length - $i - 1]) = [$arr[$length - $i - 1], $arr[$i]];
    }

    return $arr;
}