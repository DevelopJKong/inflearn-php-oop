<?php
//php 기본적으로 다중 상속을 지원하지는 않는다
//이점을 보완하기 위해서 만들어진것이 trait이다

trait A
{
    private $message = 'Hello world';

    public function sayHello()
    {
        return $this->message;
    }

    abstract public function foo();
}

//trait를 여러개를 구현하면 충돌이 발생할수있다
trait AA
{
    public function foo()
    {
        return __TRAIT__;
    }
}
trait AAA
{
    use A,AA {
        A::sayHello insteadOf AA;
        A::sayHello as protected h; //별칭으로 사용할수있다
    }
}

class B
{
    use A;

    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
var_dump($b->sayHello());



//우선순위
class C
{
    private $message = 'Hello, world';

    public function sayHello()
    {
        return __TRAIT__;
    }
}

trait D
{
    public function sayHello()
    {
        return __TRAIT__;
    }
}

class E extends C
{
    use D;

    public function sayHello()
    {
        return __CLASS__;
    }
}


$e = new E();
var_dump($e -> sayHello());