<?php

/**
 * Brower Cache
 */
//기술을 벗어나서 php에서는 어떻게 cache를 사용할까 라는것에 대해 배우는 시간이였습니다

//네이버 -> 리소스 요청 -> 브라우저 랜더링
//캐시를 사용하면 서버에 부하를 줄여줄수있다 주로 정적인 컨텐츠를 사용할때 캐시를 사용한다

//네이버 -> 캐시(미리 이미지,소스[로컬에 저장]) -> 있음(hit) -> 캐시를 사용
//네이버 -> 캐시(미리 이미지,소스[로컬에 저장]) -> 없음(miss) -> 서버에 다시 리소스를 요청

//변하면 캐시를 전달해주고 변하지 않으면 캐시를 전달하지 않음

$file =  __DIR__ .'index.php';

$lastModified = filetime($file);
$etag = md5_file($file); // md5에 대해서 정확하게 알아두어야 할거 같다

header('Last-Modified: '.gmdate('D,d M Y H:i:s',$lastModified).'GMT');
header('Etag: ' . $etag);

if(strtotime($_SERVER['HTTP_IF_MODIFIED_SNICE']) === $lastModified) {
    if($_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
        header('HTTP/1.1 304 Not Modified');
        exit;
    }
} else {
    include 'HelloWorld.php';
}






