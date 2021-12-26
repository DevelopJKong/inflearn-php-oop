<?php

/**
 * Iterator Interface Implements
 */

 class NumberIterator implements Iterator {
     private $i;

     public function __constract($start, $end,$step = 1) {
         $this->start = $start;
         $this->end = $end;
         $this->step = $step;
     }

     public function rewind() {
         $this->i = 0;
     }

     public function valid() {
         return $this->i <= $this->end; // 이렇게 사용이.. 가능한가?
     }
    
     public function current() {
         return $this->i;

     }
     public function key() {
         return $this->i;
     }
     public function next() {
         $this->i += $this->step;
     }
 }

 foreach (new NumberIterator(0,1000000) as $number) {
     var_dump($number);
 }