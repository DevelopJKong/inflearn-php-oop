<?php

/**
 * Classes Autoloading (PSR-4)
 */

//이렇게 번거롭게 가지고 와야하는데 이러한 것을 쉽게 해주는것이 autoloading이다 라고 생각하면 좋을거 같다
//include './Classes/MyClass.php';

use Classes\MyClass;

spl_autoload_register(function($classname){
    include $classname.'.php';
});

new MyClass();

//var_dump(spl_autoload_functions());

foreach(spl_autoload_functions() as $function) {
    spl_autoload_unregister($function);
}


