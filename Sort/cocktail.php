<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/8/9
 * Time: 15:36
 */

/**
 * 鸡尾酒排序，冒泡排序变种
 * https://mp.weixin.qq.com/s/CoVZrvis6BnxBQgQrdc5kA
 *
 * @param array $numbers
 * @return array
 */
function cocktail(array $numbers)
{
    $length = count($numbers);

    $exchangeIndex0 = $exchangeIndex1 = 0;
    $rightBoarder = $length - 1;
    $leftBoarder = 0;

    for ($i = 0; $i < $length / 2; $i++) {

        $isSort0 = true;
        for ($j = $i; $j < $rightBoarder; $j++) {
            if ($numbers[$j] > $numbers[$j + 1]) {
                list($numbers[$j], $numbers[$j + 1]) = [$numbers[$j + 1], $numbers[$j]];
                $isSort0 = false;
                $exchangeIndex0 = $j;
            }
        }

        if ($isSort0) {
            break;
        }
        $rightBoarder = $exchangeIndex0;

        $isSort1 = true;
        for ($k = $length - $i - 1; $k > $leftBoarder; $k--) {
            if ($numbers[$k - 1] > $numbers[$k]) {
                list($numbers[$k], $numbers[$k - 1]) = [$numbers[$k - 1], $numbers[$k]];
                $isSort1 = false;
                $exchangeIndex1 = $k;
            }
        }

        if ($isSort1) {
            break;
        }

        $leftBoarder = $exchangeIndex1;
    }

    return $numbers;
}

$numbers = [10, 8, 9, 7, 1, 2, 3, 4 ];

print_r(cocktail($numbers));exit;