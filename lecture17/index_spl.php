<?php

/**
 * Data Structures
 */
//Standard PHP Library SPL
//중요도로 따지자면 reflection 보다도 높다 라고 보면 된다
//... reflection은 정확히 뭐였지 기억이 안난다..

//Case 1. Stack

$st = new SplStack();
$st->push('Hello,world');
$st->push('Bye');

//var_dump($st->pop());

//Case 2. Queue

$qu = new SplQueue();

$qu->enqueue('Hello, world');
$qu->enqueue('Bye');

//var_dump($qu->dequeue());

//웬만하면 사용할때 자료구조의 사용성에 맞게 사용하는것이 좋다 그럼 어떨때? stack을 사용하고
//정확하게 어떨때 queue를 사용하는거지?

//Case 3. Fixed Array

$array = new SplFixedArray(5); //php에서 array는 java에서 array와는 다르게 가변적이다 하지만 fixed array는 또 다르다

foreach (range(0,4) as $number) {
    $array[$number] = $number;
}

// 참고
// 조금 다른점은 flag를 설정해줄수있다! *flag를 설정하면 어떻게되는데?
$array2 = new ArrayObject(['message' => 'Hello, world'],ArrayObject::ARRAY_AS_PROPS); //arrayObject는 array를 object화 시켰다고 생각하면 될거 같다

var_dump($array2->message); //이렇게 사용하면 프로퍼티 형태로 사용이 가능해진다



//var_dump($array); fixed array의 정확한 쓰임새는 알아두어야 할거 같다

// Case 4. Object Storage
$storage = new SplObjectStorage();

$o1 = new stdClass(); //stdClass는 뭐지?
$o2 = new stdClass();

$storage->attach($o1, 'Hello, world');
$storage->attach($o2, 'Bye');
//제거를 할때는 detach를 사용하면 된다


//var_dump($storage[$o1]); //근데 뭐 이렇게 나오는건 알겠는데 언제 이렇게 사용하는거지? 왜 사용하는거지?
//var_dump($storage[$o2]);
//var_dump($storage->contains($o1));
