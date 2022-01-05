<?php

/**
 *  Compare
 */

$class1 = new stdClass();
$class2 = new stdClass();

var_dump($class1 == $class2); //이것은 그냥 단순하게 비교만 하는것이다
var_dump($class1 === $class2); //이것은 주소값을 비교하는것이다

//비교는 때문에 어쩌면 간단하다 라고 생각하면 된다

/**
 * Copy
 */
// $class3 = $class1 = <Object Id> 를 넣을수있다고 말할수있다
// $class3 = $class1;
//$class3->sayHello = 'Hello, world';
//var_dump($class1->sayHello);


//$class3 =& $class1;
//$class3->sayHello = 'Hello, world';
//var_dump($class1->sayHello);

$class3 = clone $class1;
var_dump($class3 === $class1);

$array1 = new ArrayObject([1, 2, new ArrayObject([3, 4])]);
$array2 = clone $array1;

var_dump($array1[2] === $array2[2]);


/**
 *  Shallow Copy vs Deep Copy
 */

// Case 1

class MyArrayObject implements ArrayAccess, IteratorAggregate
{
    private $container = [];

    public function __construct($array)
    {
        $this->container = $array;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->container);
    }


    public function offsetSet($offset, $value)
    {
        $this->container[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->container[$offset] : null;
    }

    public
    function __clone()
    {
        array_walk($this->container, fn(&$value) => is_object($value) ? $value = clone $value : null);
    }

}

$myArrayObject1 = new MyArrayObject([1, 2, new ArrayObject([3, 4])]);
$myArrayObject2 = clone $myArrayObject1;

foreach($myArrayObject1 as $key => $value) {
    var_dump($key,$value);
}


var_dump($myArrayObject1[2] === $myArrayObject2[2]);

// Case 2. Serialize
$myArrayObject2 = unserialize(serialize($myArrayObject1));
var_dump($myArrayObject1[2] === $myArrayObject2[2]);
