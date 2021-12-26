<?php

/**
 * Genenrator
 */

 //그래서 왜 generator는 사용하는건데 방법이 3가지로 이렇게 사용한다는 것은
 //이해가 되겠지만.. 왜? 어디서 사용하는거지?




 //break point 처럼 외부에 값을 던져줄수있는 것이다

 function gen() {
     yield 1;
     yield 2;
     yield 3;
 }

 $gen = goo();

//  var_dump($gen->current());
//  $gen->next();
//  var_dump($gen->current());

// generator 같은경우네는 foreach 문으로 돌릴수있다

foreach ($gen as $numbers) {
    var_dump($number);
}

function gen2() {
    yield 1;
    yield from gen();
    yield 2;
}

foreach (gen2() as $number) {
    var_dump($number);
}

function gen3() {
    yield 'message' => 'Hello, world';
}

foreach (gen3() as $key => $value) {
    var_dump($key,$value);
}

// 4번 째 방법은 잘 사용하지 않는다
function gen4() {
    $data = yield;
    yield $data;
}

$gen4 = gen4();


var_dump($gen4->current());

var_dump($gen4->send('Hello, world'));
var_dump($gen4->current());


/**
 * Generator를 사용하는 이유는 메모리 사용에 있어서 우위를 점하기 위해서 이다
 */

 function __range($start, $end, $step = 1) {
     for($i = 0; $i <= $end; $i += $step) {
        yield 1;
     }
 }


 $s = microtime(true);

 //foreach(__range(0,100000) as $numbers) {}
 foreach(range(0,100000) as $number) {}

 var_dump(micotime(true) - $s, memory_get_peak_usage());

