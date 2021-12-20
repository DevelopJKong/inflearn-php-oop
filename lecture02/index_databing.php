<?php

/**
 *  Static Binding
 *  Static은 웬만하면 늦는다
 *  self는 자기자신을 호출한다 라고 일단은 기억을 해두자
 *  실무에서 헷갈리는 경우는 테스트 케이스를 작성해서 알아보도록 하자
 */
class A
{
    public static function foo()
    //public function foo()
    {
        static::who(); //static으로 하면 B가 self로 하면 A가 호출된다
    }

    //public static function who()
    public function who()
    {
        var_dump(__CLASS__);
    }
}

class B extends A
{
    //public static function test()
    public function test()
    {
        //A::foo(); => 웬만하면 사용하지 않는다 
        //parent::foo();
        self::foo();
    }

    //public static function who()
    public function who()
    {
        var_dump(__CLASS__);
    }
}

$b = new B();
$b = test();