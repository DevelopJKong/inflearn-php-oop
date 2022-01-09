<?php

$root = dirname(__DIR__);

/**
 * Directory
 */

$dir = dir($root.'\php_oop\lecture14');
var_dump($dir);
while ($dirname = $dir->read()) {
    var_dump($dirname);
}

//정확히 어떨때 사용되는지 잘 모르겠다..

//$dir-> rewind();
//while ($dirname = $dir->read()) {
//    var_dump($dirname);
//}

$dir->close();

$dir->handle = opendir($root. '/lang');

while ($dirname = $dir->read()) {
    var_dump($dirname);
}

$dir->close();
