<?php
/**
 * Interface
 */
interface A
{
    //protected 와 private 둘다 사용할수 없다 그리고 
    //무조건 다음 interface를 받는 객체에서 구현을 해주어 야한다
    public function foo();
}

//interface 끼리 확장을 하고 싶을때는 extends 키워드를 붙어서 사용해주면 된다
interface AA extends A
{
    public function sayHello();
}

class B implements AA
{
    public function foo()
    {
        return __CLASS__;
    }
    public function sayHello()
    {
        return 'Hello'; //왜 echo 라고 키워드를 사용하면 에러가 나는거지?
    }
}

$b = new B();
var_dump(foo($b));