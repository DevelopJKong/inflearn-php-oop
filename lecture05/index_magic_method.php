<?php
//magic method 에서 가장 중요한것은 생성자와 소멸자이다
/**
 * Magic Methods: Methods
 */
class A
{
    // __call 이라는 매직 메소드는 정의 되지 않은  메소드를 호출할때 대신 호출 된다
    public function __call($name,$args) {
        
        //var_dump(__METHOD__);
        var_dump($name,$args);

    }
    // 1
    //만약에 여기서 foo() 가 주석이 되어 있으면 foo() 가 호출되는것이 아니라 __call이 호출이 된다
    // public function foo() {
    //     var_dump(__METHOD__);
    // }

    // 2
    //없는 함수를 만들고 호출할때 사용한다 
    public static function __callStatic($name,$args) {
        var_dump($name,$args);
    }

    public function __invoke( ... $args) {
        var_dump($args);
    }
}

$a = new A();
$a('Hello,world','Who are you?');


//$a -> foo();
//$a -> foo('Hello,world');
//A::foo(); // => 정확하게 :: 는 무슨 뜻인지 알아두기