<?php

namespace MockMail;

class StreamWrapper
{
    /**
     * @var string
     */
    private $content;

    private static $patterns = array(
        '/(?<!::|->|\w_)\\\?mail\s*\(/i'                => '\MockMail\MockMail::mail(',
    );

    private function register()
    {
        stream_wrapper_unregister("file");
        stream_wrapper_register("file", __CLASS__);
    }

    /**
     * @param string $path
     * @return bool
     */
    public function stream_open($path)
    {
        stream_wrapper_restore("file");
        $content = file_get_contents($path);
        $this->content = preg_replace(array_keys(self::$patterns), array_values(self::$patterns), $content);
        $this->content = str_replace("mail", "MockMail\\MockMail::mail", $content);
        $this->register();
        return true;
    }

    /**
     * @param int $count
     * @return bool|string
     */
    public function stream_read($count)
    {
        $ret = substr($this->content, $this->position, $count);
        $this->position += strlen($ret);
        return $ret;
    }

    /**
     * @return array
     */
    public function stream_stat()
    {
        return [];
    }

    /**
     * @return bool
     */
    public function stream_eof()
    {
        return $this->position >= strlen($this->content);
    }

    /**
     * @return array
     */
    public function url_stat()
    {
        return [];
    }
}
