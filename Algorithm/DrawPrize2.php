<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/22
 * Time: 15:32
 */

/**
 * 抽奖活动模拟
 *
 * @param array $arr
 * @return string
 */
function drawPrize(array $arr)
{
    $prize = '谢谢惠顾';

    $percentSum = array_sum($arr);

    foreach ($arr as $k => $v) {
        $rand = mt_rand(1, $percentSum);

        if ($rand <= $v) {
            $prize = $k;
            break;
        } else {
            //注意理解此处逻辑，(90/100) * (70/90) * (40/70)
            $percentSum -= $v;
        }
    }

    return $prize;
}


//奖品及奖品数量（概率，百分比）
$prize = [
    '一等奖' => 10,
    '二等奖' => 20,
    '三等奖' => 30,
    '谢谢惠顾' => 40,
];

$arr = [];
for ($i = 0; $i < 1000; $i++) {
    $arr[] = drawPrize($prize);
}

echo '<pre>';
print_r(array_count_values($arr));
echo '<pre>';