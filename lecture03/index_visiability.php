<?php

/**
 * Visibility
 * 
 * 가시성이라고 표현을 하는데 php에서는 가시성인가?
 * 자바에서의 접근제한자라고 생각하면 좋을까?
 * 
 */
class A
{
    public $public= 'public';
    protected $protected = 'protected';
    private $private = 'private';
}
$a = new A();
var_dump($a -> private);

/**
 * protected와 private의 차이점이 중요한데
 * protected는 상속받은 내부에서는 사용할수있다
 */


class B extends A
{
    private $message = 'Hello, world';
    
    private function __construct()
    {
        var_dump($this->message);
    }

    public static function getInstance()
    {
        return self::$instance ?: self::$instance = new self(); // => 싱글톤 방식입니다 하나의 객체만 생성을 하는것이 싱글톤 방식입니다
        //return new self(); //self는 어디서 가지고 온거지? // 싱글톤 확인해보기
        
    }

    public function foo()
    {
        return $this -> protected;
    }
}


$b = new B();
//$bb = new B();
var_dump($b -> foo());




