<?php

class HashNode
{
    /**
     * @var
     */
    public $key;

    /**
     * @var
     */
    public $value;

    /**
     * @var null
     */
    public $nextNode;

    /**
     * HashNode constructor.
     *
     * @param $key
     * @param $value
     * @param null $nextNode
     */
    public function __construct($key, $value, $nextNode = null)
    {
        $this->key = $key;
        $this->value = $value;
        $this->nextNode = $nextNode;
    }
}

/**
 * Class HashTable
 *
 * 拉链法解决hash冲突
 */


class HashTable
{
    /**
     * @var SplFixedArray
     */
    private $arr;

    /**
     * @var int
     */
    private $size = 10;

    /**
     * HashTable constructor.
     */
    public function __construct()
    {
        //SplFixedArray创建的数组比一般的Array()效率更高，因为更接近C的数组。创建时需要指定尺寸
        $this->arr = new SplFixedArray($this->size);
    }

    /**
     * Description: 简单hash算法。输入key，输出hash后的整数
     * @param $key
     * @return int
     */
    private function simpleHash($key)
    {
        $len = strlen($key);
        //key中每个字符所对应的ASCII的值
        $asciiTotal = 0;
        for($i=0; $i<$len; $i++){
            $asciiTotal += ord($key[$i]);
        }
        return $asciiTotal % $this->size;
    }

    /**
     * Description: 赋值
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        $hash = $this->simpleHash($key);

        if (isset($this->arr[$hash])) {
            $this->arr[$hash] = new HashNode($key, $value, $this->arr[$hash]);
        } else {
            $this->arr[$hash] = new HashNode($key, $value);
        }

        return true;
    }

    /**
     * Description: 取值
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $hash = $this->simpleHash($key);

        $current = $this->arr[$hash];
        while (!empty($current)) {
            if ($current->key == $key) {
                return $current->value;
            }

            $current = $current->nextNode;
        }

        return null;
    }

    /**
     * @return SplFixedArray
     */
    public function getList()
    {
        return $this->arr;
    }

    /**
     * @param $size
     */
    public function editSize($size)
    {
        $this->size = $size;
        $this->arr->setSize($size);
    }
}

echo '<pre>';
//测试1
$arr = new HashTable();

$arr->editSize(15);
for($i = 0; $i < 15; $i++){
    $arr->set('key' . $i, 'value' . $i);
}

print_r($arr->getList());
print_r($arr->get('key4'));

echo '<pre>';