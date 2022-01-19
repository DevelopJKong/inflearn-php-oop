<?php

/**
 * php_user_filter
 */

class StrToUpperFilter extends php_user_filter
{
    public function filter($in,$out,&$consumed,$closing)
    {
        while($bucket = stream_bucket_make_writeable($in)) {

            //왜 이렇게 사용했지? 왜 이렇게 사용해서 설명을 해주신거지? 한번 알아보아야 할거 같다
            //$bucket = stream_bucket_new($this->stream,'Hello,world');

            $bucket->data = strtoupper($bucket->data);
            $consumed .= $bucket->datalen;
            stream_bucket_append($out,$bucket);
        }
        return PSFS_PASS_ON;
    }
}



//이렇게 내장함수를 사용해서 사용도 가능 하지만 직접 만들수있다
//정확히 어떤 뜻인지 잘 모르겠다 그래서 이렇게 사용하면 안될거 같다
$fp = fopen(dirname(__DIR__,3), 'README.md','r');

//stream_filter_append($fp,'string_touuper');

stream_filter_register('str.toupper','StrToUpper');
stream_filter_append($fp,'str.toupper');

var_dump(stream_get_contents($fp));
