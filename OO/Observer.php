<?php

class Subject implements SplSubject
{
    /**
     * @var SplObjectStorage
     */
    protected $observers;

    /**
     * Subject constructor.
     */
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * 通知
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * 业务逻辑处理
     */
    public function businessLogic()
    {
        echo 'some business logic' . PHP_EOL;

        $this->notify();
    }
}

class observer1 implements SplObserver
{
    /**
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject)
    {
        echo __CLASS__ . ' receive :' .  get_class($subject) . ' have done some business logic' . PHP_EOL;
    }
}

class observer2 implements SplObserver
{
    /**
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject)
    {
        echo __CLASS__ . ' receive :' .  get_class($subject) . ' have done some business logic' . PHP_EOL;
    }
}

$subject = new Subject();
$subject->attach(new observer1());
$subject->attach(new observer2());

$subject->businessLogic();