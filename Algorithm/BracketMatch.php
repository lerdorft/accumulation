<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/11/15
 * Time: 16:57
 */


/**
 * 判断字符串括号是否成对匹配出现
 * 字符串中包含'(',')','[',']','{','}'字符，判断是否成对出现
 * https://www.cnblogs.com/gaopeng527/p/4508254.html
 *
 * @param $str
 * @return bool
 */
function isMatch($str)
{
    //分割字符为数组
    $arr = str_split($str);

    //接触栈先进后出特性
    $stack = new SplStack();
    $stack->push($arr[0]);

    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        if ($stack->isEmpty()) {
            $stack->push($arr[$i]);
        } else {
            $top = $stack->top();

            if (
                $top == '(' && $arr[$i] == ')' ||
                $top == '[' && $arr[$i] == ']' ||
                $top == '{' && $arr[$i] == '}'
            ) {
                $stack->pop();
            }  else {
                $stack->push($arr[$i]);
            }
        }
    }

    return $stack->count() == 0;
}

$str = '{(({}([]))[][])}';
var_dump(isMatch($str));