<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/13
 * Time: 20:49
 */

/**
 * @param array $numbers
 * @return array
 */
function insert(array $numbers)
{
    $length = count($numbers);

    for ($i = 1; $i < $length; $i++) {

        $j = $i;
        while (isset($numbers[$j - 1]) && $numbers[$j - 1] > $numbers[$j]) {
            list($numbers[$j], $numbers[$j - 1]) = [$numbers[$j - 1], $numbers[$j]];
            $j--;
        }
    }

    return $numbers;
}

$unSortNumbers = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1];
print_r(insert($unSortNumbers));