<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/7/18
 * Time: 11:43
 */

/**
 * 冒泡排序
 *
 * https://mp.weixin.qq.com/s/wO11PDZSM5pQ0DfbQjKRQA
 *
 * @param array $numbers
 * @return array
 */
function bubble(Array $numbers)
{
    $count = count($numbers);

    for ($i = 0; $i < $count - 1; $i++) {
        $isSort = true;

        for ($j = 0; $j < $count - $i - 1; $j++) {
            if ($numbers[$j] > $numbers[$j + 1]) {
                list($numbers[$j], $numbers[$j + 1]) = [$numbers[$j + 1], $numbers[$j]];
                $isSort = false;
            }
        }

        if ($isSort) {
            break;
        }
    }

    return $numbers;
}


/**
 * 优化后冒泡排序
 *
 * 数组有序区域部分不需要重新扫描判断，获取最后一次掉换位置。下次循环扫描，只扫描该位置之前区域
 * https://mp.weixin.qq.com/s/wO11PDZSM5pQ0DfbQjKRQA
 *
 * @param array $numbers
 * @return array
 */
function optimizedBubble(Array $numbers)
{
    $count = count($numbers);

    //内循环边界
    $sortBoarder = $count - 1;

    //记录最后一次交换的位置
    $exchangeIndex = 0;

    for ($i = 0; $i < $count - 1; $i++) {
        $isSort = true;

        for ($j = 0; $j < $sortBoarder; $j++) {
            if ($numbers[$j] > $numbers[$j + 1]) {
                list($numbers[$j], $numbers[$j + 1]) = [$numbers[$j + 1], $numbers[$j]];
                $isSort = false;
                $exchangeIndex = $j;
            }
        }

        if ($isSort) {
            break;
        }

        $sortBoarder = $exchangeIndex;
    }

    return $numbers;
}

$unSortNumbers = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1];

$unSortNumbers = optimizedBubble($unSortNumbers);

print_r($unSortNumbers);