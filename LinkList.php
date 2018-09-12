<?php

/**
 * Created by PhpStorm.
 * User: chensh
 * Date: 2018/9/12
 * Time: 19:36
 */
class Node
{
    /**
     * @var int 节点id
     */
    public $id;

    /**
     * @var string 节点名称
     */
    public $name;

    /**
     * @var mixed 下一节点
     */
    public $next;

    /**
     * Node constructor.
     *
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->next = null;
    }
}

class SingleLinkList
{
    /**
     * @var Node 链表头节点
     */
    private $header;

    /**
     * SingleLinkList constructor.
     *
     * @param null $id
     * @param null $name
     */
    public function __construct($id = null, $name = null)
    {
        $this->header = new Node($id, $name);
    }

    /**
     * 获取链表长度
     *
     * @return int
     */
    public function getLinkLength()
    {
        $i = 0;
        $current = $this->header;
        while ( $current->next != null ) {
            $i ++;
            $current = $current->next;
        }
        return $i;
    }

    /**
     * 添加节点数据
     *
     * @param $node
     */
    public function addLink(Node $node)
    {
        $current = $this->header;

        while ( $current->next != null ) {
            if ($current->next->id > $node->id) {
                break;
            }
            $current = $current->next;
        }

        $node->next = $current->next;
        $current->next = $node;
    }

    /**
     * 删除链表节点
     *
     * @param $id
     */
    public function delLink($id)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != null) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }

        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo '未找到id=' . $id . '的节点！<br>';
        }
    }

    /**
     * 判断连表是否为空
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->header == null;
    }

    /**
     * 清空链表
     */
    public function clear()
    {
        $this->header = null;
    }

    /**
     * 获取链表
     */
    public function getLinkList()
    {
        $current = $this->header;
        if ($current->next == null) {
            echo ("链表为空!");
            return;
        }

        while ($current->next != null) {
            echo 'id:' . $current->next->id . '   name:' . $current->next->name . "<br>";
            if ($current->next->next == null) {
                break;
            }
            $current = $current->next;
        }
    }

    /**
     * 获取节点名字
     *
     * @param $id
     * @return string|void
     */
    public function getLinkNameById($id)
    {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空!";
            return;
        }

        while ($current->next != null) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }
        return $current->name;
    }

    /**
     * 更新节点名称
     *
     * @param $id
     * @param $name
     */
    public function updateLink($id, $name)
    {
        $current = $this->header;
        if ($current->next == null) {
            echo '链表为空!';
            return;
        }

        while ( $current->next != null ) {
            if ($current->id == $id) {
                break;
            }
            $current = $current->next;
        }
        return $current->name = $name;
    }
}

$lists = new SingleLinkList ();
$lists->addLink(new Node(5, 'eeeeee' ));
$lists->addLink(new Node(1, 'aaaaaa' ));
$lists->addLink(new Node(6, 'ffffff' ));
$lists->addLink(new Node(4, 'dddddd' ));
$lists->addLink(new Node(3, 'cccccc' ));
$lists->addLink(new Node(2, 'bbbbbb' ));
$lists->getLinkList ();

echo '<br>-----------删除节点--------------<br>';
$lists->delLink ( 5 );
$lists->getLinkList ();

echo '<br>-----------更新节点名称--------------<br>';
$lists->updateLink ( 3, "222222" );
$lists->getLinkList ();

echo '<br>-----------获取节点名称--------------<br>';
echo $lists->getLinkNameById ( 5 );

echo '<br>-----------获取链表长度--------------<br>';
echo $lists->getLinkLength ();
