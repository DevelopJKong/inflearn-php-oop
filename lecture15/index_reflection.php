<?php

class A
{
    private string $message = 'Hello world';

    public function __construct(string $message)
    {
        $this->message = $message;
    }

}

class B extends A
{

}

/**
 * ReflectionClass
 */
//여전히 어떤때에 사용한건지 제대로 모르겠다
//의존성 주입때? 사용을 주로 한다

$refClassA = new ReflectionClass('\A');
//var_dump($refClass->getConstructor());
var_dump($refClassA->getProperties(ReflectionProperty::IS_PRIVATE));

$refClassB = new ReflectionClass('\B');
var_dump($refClassB->isSubclassOf('\A'));


/**
 * ReflectionProperty
 */

$messageProperty = $refClassA->getProperty('message');
//var_dump($messageProperty->getValue());
//var_dump($messageProperty->getType()); // 아무것도 안나옴
//var_dump($messageProperty->isPrivate()); // reflection은 독립적인것이 아닌 연결적인것이다
var_dump($messageProperty->getType()->getName());







