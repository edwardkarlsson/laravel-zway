<?php

namespace ZWay\Responses;

abstract class BaseResponse implements Response
{
    protected Response $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getContent(): Response
    {
        return $this->response;
    }

    public function handle(): Response
    {
        return $this;
    }
}
