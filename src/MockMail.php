<?php

namespace MockMail;

require_once 'StreamWrapper.php';

class MockMail
{
    /**
     * @var array
     */
    private static $mails;

    /**
     * enable mocking mail
     */
    public static function enable()
    {
        stream_wrapper_unregister("file");
        stream_wrapper_register("file", StreamWrapper::class);
    }

    /**
     * disable mocking mail
     */
    public static function disable()
    {
        stream_wrapper_restore("file");
    }

    /**
     * clear mail buffer
     */
    public static function clear()
    {
        self::$mails = [];
    }

    /**
     * @param string $to
     * @param string $subject
     * @param string $message
     * @param string|null $additional_headers
     * @param string|null $additional_parameters
     */
    public static function mail($to, $subject, $message, $additional_headers = null, $additional_parameters = null)
    {
        self::$mails[] = new Mail($to, $subject, $message, $additional_headers, $additional_parameters);
    }

    /**
     * @return array
     */
    public static function getMails()
    {
        return self::$mails;
    }
}
