<?php

namespace MockMail;

class Mail
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $additional_headers;

    /**
     * @var string
     */
    private $additional_parameters;

    /**
     * Mail constructor.
     * @param string $to
     * @param string $subject
     * @param string $message
     * @param string $additional_headers
     * @param string $additional_parameters
     */
    public function __construct($to, $subject, $message, $additional_headers, $additional_parameters)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->additional_headers = $additional_headers;
        $this->additional_parameters = $additional_parameters;
    }
}
