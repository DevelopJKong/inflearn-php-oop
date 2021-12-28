<?php

/**
 * Reference
 */
$message = 'Hello, world';
$sayHello =& $message; // 이런건 또 처음 보네 ㄷㄷ

$sayHello = 'Who are you?';
var_dump($message); // -> Who are you? 이것을 참조라고 한다

/**
 * Functions and Methods
 */

 function foo() {
     global $message;
     $message =& $GLOBALS['message'];
     $message = 'Bye';
 }

 foo();
 var_dump($message);

 function foo2(&$message) {
     $message = 'Hello, world';
 }

 foo2($message); // 참조형태에서는 변수형태로만 줄수있고 문자열 같은 값으로는 줄수없다
 var_dump($message);

 class MyClass {
     public $message = 'Hello, world';

     public function &getMessage() {
         return $this->message;
     }
 }
 $myclass = new MyClass();

 $sayHello =& $myclass->getMessage();

 var_dump($myclass->message);


 /**
  * Unset
  */

  $sayHello =& $message;
  unset($sayHello);
  
  var_dump($message);