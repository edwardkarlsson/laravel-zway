<?php

namespace ZWay\Resources;

class DeviceResource extends BaseResource
{
    protected $endpoint = '/ZAutomation/api/v1/devices';

    public function __construct($id)
    {
        $this->endpoint = $this->endpoint . '/' . $id;

        parent::__construct();
    }
}
