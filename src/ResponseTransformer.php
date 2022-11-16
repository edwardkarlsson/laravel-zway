<?php

namespace ZWay;

use ZWay\Responses\BaseResponse;
use ZWay\Responses\Response;

class ResponseTransformer
{
    protected Response $response;

    public function setResponse(Response $response)
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
