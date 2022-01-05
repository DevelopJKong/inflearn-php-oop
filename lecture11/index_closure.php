<?php

/**
 * Closure
 */
//$foo =  fn() => 'Hello world';
//var_dump($foo);

function foo()
{
    return 'Hello, world';
}

// $foo = fn () => 'Hello,world';
var_dump('foo');

/**
 * From Callable
 */

var_dump(Closure::fromCallable('foo'));

class A
{
    private $message = 'Hello, world';
}

$foo = fn () => $this->message;
var_dump($foo->call(new A()));

$a = new A();

// Function call
//$foo->var_dump($foo->call($a));

$foo2 = $foo->bindTo($a,$a);
var_dump($foo2());

function foo2(\Closure $callback)
{
   var_dump($callback());
}
foo2(fn () => 'Hello, world');
