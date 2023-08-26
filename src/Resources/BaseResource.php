<?php

namespace ZWay\Resources;

use ZWay\Api\ApiService;
use ZWay\Responses\Response;
use ZWay\ResponseTransformer;

abstract class BaseResource
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
        $this->transformerType = str_replace('Resource', 'Response', get_class($this));
    }

    public function send(): Response
    {
        $response = $this->api->get($this->endpoint);

        return $this->transformer->setResponse($response)->transform($this->transformerType);
    }
}
