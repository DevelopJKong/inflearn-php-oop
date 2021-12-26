<?php

/**
 * Exception
 */


 try { // try에서는 예외가 생길 법한 코드를 넣습니다
    throw new Exception('Hello, world');
 } catch(Exception $e) {
    var_dump($e -> getMessage());
 } finally {
    //자원을 해제할때 사용합니다
    var_dump('Finally');
 }

 set_error_handler(function ($errno,$errstr){
    throw new ErroException($errstr,$errno);
 });

 //왜? exception은 파라미터를 이렇게 받아줘야 하지? fn? fn은 뭐지?
 set_exception_handler(fn (Exception $e) => var_dump($e-> getMessage()));

 /**
  * Error
  */

  //페이탈 에러는 흠.. 어떤 거지?
  try {
      new MyClass();
  } catch (Error $e){
    var_dump($e -> getMessage());
  }