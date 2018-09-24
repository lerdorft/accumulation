<?php
/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/24
 * Time: 10:38
 */

class Node
{
    /**
     * @var null
     */
    public $key = null;

    /**
     * @var null
     */
    public $left = null;

    /**
     * @var null
     */
    public $right = null;

    /**
     * Node constructor.
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }
}

class BinaryTree
{
    /**
     * @var Node
     */
    private $root;

    /**
     * @var array
     */
    private $numbers;

    /**
     * BinaryTree constructor.
     *
     * @param $numbers
     */
    public function __construct(array $numbers = [])
    {
        $this->numbers = $numbers;
    }

    /**
     * @return Node
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * 插入结点
     *
     * @param Node $node
     * @param Node $newNode
     */
    protected function insertNode(Node &$node, Node $newNode)
    {
        if ($node->key > $newNode->key) {
            if (is_null($node->left)) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        } else {
            if (is_null($node->right)) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }

    /**
     * 生成二叉树
     */
    public function generate()
    {
        foreach ($this->numbers as $v) {
            $node = new Node($v);

            if (is_null($this->root)) {
                $this->root = $node;
            } else {
                $this->insertNode($this->root, $node);
            }
        }
    }

    /**
     * 前序遍历
     *
     * @param $node
     */
    public function preSearch($node = null)
    {
        if ($node == null) {
            $node = $this->root;
        }

        echo $node->key, '<br>';

        if (!is_null($node->left)) {
            $this->preSearch($node->left);
        }

        if (!is_null($node->right)) {
            $this->preSearch($node->right);
        }
    }

    /**
     * 利用栈结构前序遍历二叉树
     */
    public function preSearchByStack()
    {
        //使用SPL（PHP标准类库）内置栈结构
        $stack = new \SplStack();

        $stack->push($this->root);
        while (!$stack->isEmpty()) {
            $node = $stack->pop();

            //输出节点数据
            echo $node->key . '<br>';

            if (!is_null($node->right)) {
                $stack->push($node->right);
            }

            if (!is_null($node->left)) {
                $stack->push($node->left);
            }
        }
    }

    /**
     * 中序遍历
     *
     * @param Node $node
     */
    public function midSearch(Node $node = null)
    {
        if ($node == null) {
            $node = $this->root;
        }

        if (!is_null($node->left)) {
            $this->midSearch($node->left);
        }

        echo $node->key . '<br>';

        if (!is_null($node->right)) {
            $this->midSearch($node->right);
        }
    }

    /**
     * 利用栈结构中序遍历二叉树
     */
    public function midSearchByStack()
    {
        $stack = new \SplStack();

        $node = $this->root;
        while (!is_null($node) || !$stack->isEmpty()) {
            while (!is_null($node)) {
                $stack->push($node);
                $node = $node->left;
            }

            $node = $stack->pop();

            echo $node->key . '<br>';

            $node = $node->right;
        }
    }

    /**
     * 后续遍历二叉树（迭代方式）
     *
     * @param Node|null $node
     */
    public function afterSearch(Node $node = null)
    {
        if (is_null($node)) {
            $node = $this->root;
        }

        if ($node->left != null) {
            $this->afterSearch($node->left);
        }

        if ($node->right != null) {
            $this->afterSearch($node->right);
        }

        echo $node->key, '<br>';
    }

    /**
     * 利用栈结构后序遍历二叉树。逻辑有点绕，没理解。
     */
    public function afterSearchByStack()
    {
        $stack = new \SplStack();

        $node = $this->root;

        //保存上一次访问的结点引用
        $lastVisited = NULL;

        $stack->push($node);
        while (!$stack->isEmpty()) {
            $node = $stack->top(); //获取栈顶元素但不弹出
            if (
                ($node->left == NULL && $node->right == NULL) ||
                ($node->right == NULL && $lastVisited == $node->left) ||
                ($lastVisited == $node->right)) {
                echo $node->key . '<br>';
                $lastVisited = $node;
                $stack->pop();
            } else {
                if ($node->right) {
                    $stack->push($node->right);
                }

                if($node->left){
                    $stack->push($node->left);
                }
            }
        }
    }

    /**
     * 利用栈结构后续遍历二叉树2
     */
    public function afterSearchByStack2()
    {
        //使用SPL（PHP标准类库）内置栈结构
        $stack = new \SplStack();

        $stack->push($this->root);
        $arr = [];
        while (!$stack->isEmpty()) {
            $node = $stack->pop();

            //输出节点数据
            $arr[] = $node->key;

            if (!is_null($node->left)) {
                $stack->push($node->left);
            }

            if (!is_null($node->right)) {
                $stack->push($node->right);
            }
        }

        $arr = array_reverse($arr);
        foreach ($arr as $v) {
            echo $v, '<br>';
        }
    }

    /**
     * 队列结构，实现广度优先遍历
     */
    public function levelSearch()
    {
        $queue = new \SplQueue();

        $queue->enqueue($this->root);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();

            echo $node->key, '<br>';

            if ($node->left != null) {
                $queue->enqueue($node->left);
            }

            if ($node->right != null) {
                $queue->enqueue($node->right);
            }
        }
    }

    /**
     * 递归方式获取二叉树高度
     *
     * @param $node
     * @return int|mixed
     */
    public function getDepth($node)
    {
        if ($node != null) {
            return max($this->getDepth($node->left), $this->getDepth($node->right)) + 1;
        }

        return 0;
    }

    /**
     * 非递归方式获取二叉树高度
     *
     * @return int
     */
    public function getDepth2()
    {
        if ($this->root == NULL) {
            return 0;
        }

        $count =0;
        $nextCount = 1;
        $depth = 0;

        $queue = new \SplQueue();
        $queue->enqueue($this->root);

        while (!$queue->isEmpty()) {
            $count++;

            $node = $queue->dequeue();

            if ($node->left) {
                $queue->enqueue($node->left);
            }

            if ($node->right) {
                $queue->enqueue($node->right);
            }

            //每一层遍历完成后，层高+1
            if ($count == $nextCount) {
                $count = 0;
                $nextCount = $queue->count();
                $depth++;
            }
        }

        return $depth;
    }
}

$numbers = [8, 3, 10, 1, 4, 14, 6, 7, 13];
$binaryTree = new BinaryTree($numbers);
$binaryTree->generate();
echo '<pre>';
echo $binaryTree->getDepth2();
echo '<pre>';