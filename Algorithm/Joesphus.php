<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/13
 * Time: 15:46
 */

/**
 * 约瑟夫问题（有时也称为约瑟夫斯置换），是一个出现在计算机科学和数学中的问题。在计算机编程的算法中，类似问题又称为约瑟夫环。
 * 人们站在一个等待被处决的圈子里。 计数从圆圈中的指定点开始，并沿指定方向围绕圆圈进行。 在跳过指定数量的人之后，执行下一个人。 对剩下的人重复该过程，从下一个人开始，朝同一方向跳过相同数量的人，直到只剩下一个人，并被释放。
 * 问题即，给定人数、起点、方向和要跳过的数字，选择初始圆圈中的位置以避免被处决。 --维基百科
 *
 * 其他常见场景，如猴子选大王，经常套用。
 *
 * http://huanyouchen.github.io/2018/05/13/What-is-the-best-solution-for-Josephus-problem/
 * https://www.nowcoder.com/questionTerminal/11b018d042444d4d9ca4914c7b84a968
 * http://tingyun.site/2018/04/26/%E7%BA%A6%E7%91%9F%E5%A4%AB%E7%8E%AF%E9%97%AE%E9%A2%98%E8%AF%A6%E8%A7%A3/
 */

/**
 * 模拟规则执行，比较容易理解。时间复杂度n*m。
 *
 * @param int $n
 * @param int $m
 * @return mixed
 */
function josephus($n, $m)
{
    $arr = range(1, $n);

    $i = 1;
    while (count($arr) > 1) {
        $head = array_shift($arr);

        if ($i % $m != 0) {
            array_push($arr, $head);
        }

        $i++;
    }

    return $arr[0];
}

/**
 * 递归处理，注意该方法是以下标0开始的前提下，满足 x' = (x + m) % n。故最后结果，相比以1开始计数的结果，小1。
 *
 * @param int $n
 * @param int $m
 * @return int
 */
function josephus2($n, $m)
{
    if ($n == 1) {
        $p = 0;
    } else {
        $p = (josephus2($n - 1, $m) + $m) % $n;
    }

    return $p;
}

/**
 * 需要推导n和n-1答案关系，不易理解。递推方式。时间复杂度n。
 *
 * @param int $n
 * @param int $m
 * @return int
 */
function josephus3($n, $m)
{
    $p = 0;

    for ($i = 2; $i <= $n; $i++) {
        $p = ($p + $m) % $i;
    }

    return $p + 1;
}

echo josephus3(10, 7);