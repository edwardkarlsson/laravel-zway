<?php

namespace ZWay\Commands;

use ZWay\Api\ApiService;
use ZWay\Responses\Response;
use ZWay\Responses\StatusResponse;
use ZWay\ResponseTransformer;

abstract class BaseCommand
{
    private ApiService $api;

    protected string $endpoint;
    protected array $hidden = ['api'];
    protected ResponseTransformer $transformer;
    protected string $transformerType;

    public function __construct()
    {
        $this->api = new ApiService();
        $this->transformer = new ResponseTransformer();
        $this->transformerType = str_replace('Command', 'Response', get_class($this));
    }

    public function send(): Response
    {
        $responseArray = $this->api->get($this->endpoint);

        return $this->transformer->setResponse($responseArray)->transform($this->transformerType);
    }
}
