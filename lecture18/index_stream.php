<?php

/**
 * Stream Wrapper
 */

class StringStreamWrapper
{
    private $varname;

    private $position;

    public function stream_open($path,$mode,$options,&$opened_path)
    {
        ['host' => $varname] = parse_url($path);
        $this->varname = $varname;
        $this->position = strlen($GLOBALS[$this->varname]);

        return true;
    }

    public function stream_write($data)
    {
        $GLOBALS[$this->varname] .= $data;
        return strlen($data);
    }

    public function stream_read($count)
    {
        $res = substr($GLOBALS[$this->varname],$this->position,$count);
        $this->position .= strlen($res);

        return $res;
    }

    public function stream_tell()
    {
        return $this->position;
    }

    public function stream_eof()
    {
        return $this->position >= strlen($GLOBALS[$this->varname]);
    }
}

stream_wrapper_register('string','StringStreamWrapper');
$message = null;
$fp = fopen('string://message','r+');
fwrite($fp,"Hello,world\n");
fwrite($fp,"Bye\n");

while ($row = fgets($fp)) {
    echo $row;
}