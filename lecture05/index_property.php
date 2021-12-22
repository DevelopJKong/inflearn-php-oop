<?php
/**
 * Magic Methods:: Property
 */

class A
{
    private $message;

    public function __isset($name) {
        return isset($this->$name);
    }
    
    public function __unset($name) {
        unset($this->$name);
    }

    public function __set($name,$value) {
        //바로 저기 위에 있는 프로퍼티에 할당이 되는것이 아니라
        //__set을 거치고 할당이 되는식이다
        $this-> $name = $value;
    }
    public function __get($name) {
        //할당이 된것을 받아올때 사용한다
        return $this->$name;
    }
    //이렇게 받아오지 않아도 위 처럼 받아올수도 있다
    //public function setMessage();
    //public function getMessage();

}

$a = new A();

isset($a); // $a 로 하면 오지 않지만 프로퍼티를 대상으로 하면 각각의 함수에 가는것을 볼수있다
//unset();