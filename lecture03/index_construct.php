<?php

/**
 * Constructor, Destructor
 */

 class A
 {
     public function __construct()
     {
        var_dump(__METHOD__);
     }

     public function __destruct()
     {
         var_dump(__METHOD__);
     }
 }

 $a = new A();
 //unset();
 var_dump('Hello, world');
 //생성자는 객체가 생성될때 호출되고 소멸자는 객체가 소멸될때 호출된다


/**
 * Constructor Parameters
 */

 class B
 {
     public $message;
     
     public function __construct($message)
     {
         $this-> message = $message; //여기서는 $ 를 안써주는것이 맞나? 왜 안쓰지?
     }
 }
 $b = new B('Hello, world');

/**
 * Inherit
 */
//만약에 C에 생성자가 없다면 부모의 생성자를 가지고 와서 호출이 된다
//현재는 C에는 아무것도 없는데 A에서 생성자가 있기 때문에 A의 생성자가 호출이 된다
 class C extends A
 {
    //조금 엄격한 언어들 같은 경우에는 자식 클래스의 생성자와 소멸자가 있더라도
    //부모 클래스의 생성자를 호출하도록 되어 있다
    //php는 유연하기 때문에 자식에서도 가능하게 해주지만 그래도 웬만하면 
    //부모에 있는것을 사용하도록 해야한다
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }
 }
 $c = new C();