<?php
/**
 * Class Abstraction
 */

 //추상클래스를 사용할때는 최상위 클래스에서 단독적으로 객체를 만들어서 사용할수 없을때
 //다시 클래스를 만들고 싶을 때 사용한다 /* 정확하게 알아두기 */
 abstract class A
 {
     protected $message = 'Hello, world';

     public function sayHello()
     {
         return $this->message;
     }
     abstract protected function foo();
 }

 class B extends A
 {
    public function foo()
    {
        return __CLASS__;
    }
 }
 $b = new B();
 var_dump($b->foo());

 //interface와 같은 느낌으로 사용할수 있다 하지만 차이점이 있다