<?php

/**
 * SplFileObject
 */

$file = new SplFileObject(dirname(__DIR__, 3) . '/README.md');// 왜 안나오는거지? 어떻게 하면 READED.md를 가져올수있지?
//var_dump($file->fread($file->getSize()));

/**
 * SplFileInfo
 */
$fileInfo = $file->getFileInfo();
//var_dump($fileInfo->getBasename());
//var_dump($fileInfo->isDir());
