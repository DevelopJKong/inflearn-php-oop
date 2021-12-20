<?php
/**
 *  Static 
 */
//클래스로 접근하는것을 권장한다
class A
{
    public static $message = 'Hello world';

    public static function foo()
    {
        //정적 메소드에서는 this를 사용할수없습니다
        return self::$message;
    }
}

var_dump(A::$message);

//가변클래스로 객체로 접근하는것은 권장하진 않는다  
$classname = 'A';

$a = new $classname();
var_dump($a->foo());