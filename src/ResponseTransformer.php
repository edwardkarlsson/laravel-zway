<?php

namespace ZWay;

use ZWay\Responses\BaseResponse;

class ResponseTransformer
{
    protected array $response;

    public function setResponse(array $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @param $responseType
     *
     * @return Responses\Response
     */
    public function transform($responseType)
    {
        /** @var BaseResponse $responseClass */
        $responseClass = new $responseType($this->response);

        return $responseClass->handle();
    }
}
