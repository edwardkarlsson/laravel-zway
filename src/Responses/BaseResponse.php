<?php

namespace ZWay\Responses;

abstract class BaseResponse implements Response
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getContent()
    {
        return $this->response;
    }

    /**
     * @return Response
     */
    public function handle()
    {
        return $this;
    }
}
