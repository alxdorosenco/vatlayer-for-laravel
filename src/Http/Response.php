<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

class Response
{
    /**
     * @var mixed
     */
    private $headers;

    /**
     * @var mixed
     */
    private $body;

    /**
     * @var mixed
     */
    private $error;

    /**
     * @param mixed $headers
     * @param mixed $body
     */
    public function __construct(mixed $headers, mixed $body, mixed $error)
    {
        $this->headers = $headers;
        $this->body = $body;
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getHeaders(): mixed
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getError(): mixed
    {
        return $this->error;
    }
}
