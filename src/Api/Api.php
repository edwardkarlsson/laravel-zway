<?php

namespace ZWay\Api;

interface Api
{
    public function call(string $endpoint, array $payload);
}
