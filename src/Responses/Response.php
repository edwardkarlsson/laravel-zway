<?php

namespace ZWay\Responses;

interface Response
{
    public function __construct($response);
    public function getContent();
    public function handle();
}
