<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/23
 * Time: 11:32
 */

/**
 * kSum问题。
 *
 * 2sum。一般2种思路，1，数组先做排序，之后从数组两端向中间移动，判断两数之和和目标值的大小。
 * 2，将数组放置与hash表结构中，key为数组值，value为数组值出现次数。然后再遍历数组，获取每个值是否有对应的 target - number[i]。
 * kSum问题解决思路最后均可转变为2sum问题。
 *
 * @param array $number
 * @param $target
 * @return array
 */
function twoSum(array $number, $target)
{
    sort($number);

    $length = count($number);

    $i = 0;
    $j = $length - 1;

    $rt = [];
    while ($i < $j) {
        $sum = $number[$i] + $number[$j];

        if ($sum == $target) {
            $rt[] = [$number[$i], $number[$j]];
            $i++;
            $j--;
        } else if ($sum > $target) {
            $j--;
        } else {
            $i++;
        }
    }

    return $rt;
}

$number = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1];

echo '<pre>';
print_r(twoSum($number, 13));
echo '<pre>';