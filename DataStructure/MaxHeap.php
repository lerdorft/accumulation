<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/27
 * Time: 16:27
 */

/**
 * 数组结构实现最大堆
 *
 * Class MaxHeap
 */
class MaxHeap
{
    /**
     * @var array
     */
    public $heap;

    /**
     * @var int
     */
    public $count;

    /**
     * MaxHeap constructor.
     *
     * @param $size
     */
    public function __construct($size)
    {
        //初始化堆
        $this->heap = array_fill(0, $size, 0);
        $this->count = 0;
    }

    /**
     * @param array $arr
     */
    public function create(array $arr = [])
    {
        array_map(function($item){
            $this->insert($item);
        }, $arr);
    }

    /**
     * @param $data
     */
    public function insert($data)
    {
        //插入数据操作
        if ($this->count == 0) {
            //插入第一条数据
            $this->heap[0] = $data;
            $this->count = 1;
        } else {
            //新插入的数据放到堆的最后面
            $this->heap[$this->count++] = $data;
            //上浮到合适位置
            $this->siftUp();
        }
    }

    /**
     * @return string
     */
    public function display()
    {
        return implode('<br>', array_slice($this->heap, 0));
    }

    /**
     * 元素上浮，保证最大堆的属性
     */
    public function siftUp()
    {
        //待上浮元素的临时位置
        $tempPos = $this->count - 1;

        //根据[完全二叉树]性质找到父节点的位置，父节点位置要区分下标是从0开始还是从1开始。
        $parentPos = intval(($tempPos - 1) / 2);

        while ($tempPos > 0 && $this->heap[$parentPos] < $this->heap[$tempPos]) {
            //当不是根节点并且父节点的值小于临时节点的值，就交换两个节点的值
            $this->swap($parentPos, $tempPos);

            //重置上浮元素的位置
            $tempPos = $parentPos;
            //重置父节点的位置
            $parentPos = intval(($tempPos - 1) / 2);
        }
    }

    /**
     * 交换
     *
     * @param $a
     * @param $b
     */
    public function swap($a, $b)
    {
        list($this->heap[$a], $this->heap[$b]) = [$this->heap[$b], $this->heap[$a]];

        //$temp = $this->heap[$a];
        //$this->heap[$a] = $this->heap[$b];
        //$this->heap[$b] = $temp;
    }

    /**
     * 提取最大值
     *
     * @return mixed
     */
    public function extractMax()
    {
        //最大值就是大跟堆的第一个值
        $max = $this->heap[0];

        //把堆的最后一个元素作为临时的根节点
        $this->heap[0] = $this->heap[$this->count - 1];

        //把最后一个节点重置为0
        $this->heap[--$this->count] = 0;

        //下沉根节点到合适的位置
        $this->siftDown(0);

        return $max;
    }

    /**
     * 下沉
     *
     * @param $k
     */
    public function siftDown($k)
    {
        //最大值的位置
        $largest = $k;

        //左孩子的位置
        $left = 2 * $k + 1;
        //右孩子的位置
        $right = 2 * $k + 2;

        if ($left < $this->count && $this->heap[$largest] < $this->heap[$left]) {
            //如果左孩子大于最大值，重置最大值的位置为左孩子
            $largest = $left;
        }

        if ($right < $this->count && $this->heap[$largest] < $this->heap[$right]) {
            //如果右孩子大于最大值，重置最大值的位置为左孩子
            $largest = $right;
        }

        //如果最大值的位置发生改变
        if ($largest != $k) {
            //交换位置
            $this->swap($largest, $k);

            //继续下沉直到初始位置不发生改变
            $this->siftDown($largest);
        }
    }
}

$maxHeap = new MaxHeap(10);

$arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];
$maxHeap->create($arr);
$maxHeap->extractMax();
echo $maxHeap->display();