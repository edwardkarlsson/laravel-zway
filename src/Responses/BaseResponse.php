<?php

namespace ZWay\Responses;

abstract class BaseResponse implements Response
{
    protected array $responseArray;

    public function __construct($responseArray)
    {
        $this->responseArray = $responseArray;
    }

    public function getContent(): array
    {
        return $this->responseArray;
    }

    public function handle(): Response
    {
        return $this;
    }
}
