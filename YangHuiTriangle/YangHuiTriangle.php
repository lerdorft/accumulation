<?php

#	1
#	1 1
#	1 2 1
#	1 3 3 1
#	1 4 6 4 1
#	1 5 10 10 5 1
#	1 6 15 20 15 6 1
#	1 7 21 35 35 21 7 1
#   1 8 28 56 70 56 28 8 1

# 杨辉三角形，又称贾宪三角形、帕斯卡三角形、海亚姆三角形、巴斯卡三角形，是二项式系数在的一种写法，形似三角形。
# 在中国首现于南宋杨辉的《详解九章算术》得名，书中杨辉说明是引自贾宪的《释锁算术》，故又名贾宪三角形。

do {
	echo 'Please enter a row number(integer):';	
	$row = trim(fgets(STDIN));
} while (!preg_match('/^[1-9]\d*$/', $row));

$arr = [];
for ($i = 1; $i <= $row; $i++) {
	for ($j = 1; $j <= $i; $j++) {
		if ($j == 1 || $i == $j) {
			$arr[$i][$j] = 1;
		} else {
			$arr[$i][$j] = $arr[$i - 1][$j - 1] + $arr[$i - 1][$j];
		}		
		echo $arr[$i][$j], ' ';
	}
	echo PHP_EOL;
}

exit;