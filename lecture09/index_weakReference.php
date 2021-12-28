<?php
/**
 * WeakReference
 */

//  $messages = [
    //      'sayHello' => 'Hello, world'
    //  ];
    //  var_dump((object) $message); // 형변환 배열을 객체로 형변환할때 주로 사용한다

    $class = new stdClass();
    $weakRef = WeakReference::create($class);
    var_dump($weakRef->get());

    unset($class);

    var_dump($weakRef->get());