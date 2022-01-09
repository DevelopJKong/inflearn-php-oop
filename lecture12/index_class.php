<?php

/**
 * Classes / Objects Functions
 */

class A
{
    public $message = 'Hello, world';

    public function foo()
    {
        return $this->message;
    }
}

class B extends A
{

}

class_alias('A', 'MyClass');

/**
 * Exists
 */
var_dump( class_exists('MyClass'));
var_dump(property_exists('MyClass', 'message'));
//=> 왜 정확하게 확인할수없는지 모르겠다 이제는 왜? 밑 색은 도달 할수 없다는것 처럼 나오는지 모르겠다

/**
 * Get
 */
$a = new MyClass();
$b = new B();
//var_dump(get_class($a));
//var_dump(get_class_vars('MyClass'));
//var_dump(get_class_methods('MyClass'));
//
//var_dump(get_declared_classes());
//
//var_dump(get_object_var($a));
//var_dump(get_parent_class(new B()));

/**
 * is
 */

var_dump(is_a($a,'MyClass'));
var_dump(is_subclass_of($b,'MyClass'));
//var_dump($a instanceof MyClass);
//var_dump($b instanceof MyClass);
