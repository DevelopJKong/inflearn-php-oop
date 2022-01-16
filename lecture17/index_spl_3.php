<?php

/**
 * ArrayIterator
 */

$array = new ArrayObject(['message' => 'Hello,word']);
$arrayIterator = $array->getIterator();

while ($arrayIterator->valid()) {
    //var_dump($arrayIterator->current());
    $arrayIterator->next();
}

/**
 * DirectoryIterator
 */

$dir = new DirectoryIterator(dirname(__DIR__));

while ($dir->valid()) {
    //var_dump($dir->current());
    $dir->next();
}


/**
 * RecursiveDirectoryIterator
 */

$it = new RecursiveDirectoryIterator(dirname(__DIR__));

function recursiveDirectories(RecursiveDirectoryIterator $it)
{
    while ($it->valid()) {
        var_dump($it->current());
        if ($it->hashChildren()) {
            recursiveDirectories($it->getChildren());
        }
        $it->next();
    }
}

recursiveDirectories($it);

