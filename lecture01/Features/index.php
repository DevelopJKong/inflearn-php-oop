<?php

/**
 *  Properties and Methods
 */
class A
{
    public $message = 'Hello, world';

    public function foo() 
    {
        return $this->message;
    }
}

$a = new A();
var_dump($a->foo());


/**
 * Inherit
 */
class B extends A{

}

$b = new B();
var_dump($b->foo());


/**
 * in Functions
 */
/*****************중요 제대로 알아둘 필요가 있다 */
function foo(A $a){
    return $a -> foo();
}

var_dump(foo($b));

/**
 * Context
 */

class C extends A 
{
    public function foo()
    {
        return new self(); // 자기 자신을 말합니다 //C
        //return new static(); // 정적 바인딩이라고 말합니다 늦게 인식한다고 가볍게 생각하면 좋을거 같다 //D
        //return new parent(); // 부모의 클래스를 말합니다 //A
    }     
}


class D extends C 
{
}


$b = new D();
var_dump($d->foo());


/**
 * Constants
 */

class E
{
    const MESSAGE = 'hello, world';

    public function getConstants()
    {
        // :: 스코프 해결 연산자 라고 한다
        return self::MESSAGE;
    }
    public function getClassName()
    {
        return __CLASS__;
    }
}

$e = new E();
//var_dump($e->getConstants());
var_dump(E::MESSAGE);
var_dump($e->getClassName());


/**
 * instanceof
 */
$d = new D();
var_dump($d instanceof C);


 ?>