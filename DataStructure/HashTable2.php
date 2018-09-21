<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/21
 * Time: 15:44
 */

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
     * HashNode constructor.
     *
     * @param $key
     * @param $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}


/**
 * Class HashTable
 *
 * 开地址法（线性探测方式）解决哈希冲突，实现哈希表。
 * 注意要求装载因子大于0.5。即哈希表地址容量至少为装入数据数量2倍。
 */
class HashTable
{
    /**
     * @var int
     */
    private $size = 10;

    /**
     * @var SplFixedArray
     */
    private $arr;

    /**
     * HashTable constructor.
     */
    public function __construct()
    {
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
        for($i = 0; $i < $len; $i++){
            $asciiTotal += ord($key[$i]);
        }
        return $asciiTotal % $this->size;
    }

    /**
     * set
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        $tmp = $hash = $this->simpleHash($key);

        do {
            if (!isset($this->arr[$hash])) {
                $this->arr[$hash] = new HashNode($key, $value);
                return true;
            }

            $hash++;
            $hash = $hash % $this->size;

        } while ($hash != $tmp);

        return false;
    }

    /**
     * get
     *
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        $tmp = $hash = $this->simpleHash($key);

        do {
            $current = $this->arr[$hash];
            if (isset($current) && $current->key == $key) {
                return $current->value;
            }

            $hash++;

            $hash = $hash % $this->size;

        } while ($hash != $tmp);

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

//开地址法解决冲突，要求装载因子大于0.5。
$arr->editSize(30);
for ($i = 0; $i < 15; $i++) {
    $arr->set('key' . $i, 'value' . $i);
}

print_r($arr->getList());
print_r($arr->get('key7'));

echo '<pre>';