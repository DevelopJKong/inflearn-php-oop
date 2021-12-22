<?php

/**
 * Magin Method: Serialize
 */

class A 
{
    private $message = 'Hello, world';

    public function __sleep()
    {
        return ['message'];
    }
    public function __wakeup()
    {
        var_dump(__METHOD__);
    }
}

$a = new A();

// $serialize = serialize();
// var_dump($serialize);
// var_dump(unserialize($serialize));


//요즘 방식은 이렇게 사용한다 매직메소드를 사용하는 방법은 옛날 방법이다
//사용 용도는 객체를 직렬화를 해서 데이터베이스에 넣어준다던지하는 식으로 사용한다
class B implements Serializable
{
    private $message = 'Hello, world';

    public function serialize()
    {
        return serialize($this -> message);
    }
    public function unserialize()
    {
        $this-> message = unserialize($serialize);
    }
}

$b = new B();
$serialize = serialize($b);
var_dump($serialize);

var_dump(unserialize($serialize));

