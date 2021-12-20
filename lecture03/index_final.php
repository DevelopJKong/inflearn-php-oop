<?php

/**
 * Final
 */
class A //클래스에 final 키워드를 넣으면 상속을 할수 없습니다
{
    public $message; //필드(프로퍼티)에는 final 키워드를 줄수없습니다

    public function foo() // final 키워드를 넣으면 override 재정의를 할수없습니다
    {

    }
}

class B extends A 
{
    public function foo()// 에러 발생
    {

    }
}