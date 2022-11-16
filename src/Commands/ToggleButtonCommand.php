<?php

namespace ZWay\Commands;

class ToggleButtonCommand extends BaseCommand
{
    protected string $endpoint = '/ZAutomation/api/v1/devices';

    public function __construct($id)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command';

        parent::__construct();
    }

    public function on(): ToggleButtonCommand
    {
        $this->endpoint = $this->endpoint . '/on';

        return $this;
    }

    public function off(): ToggleButtonCommand
    {
        $this->endpoint = $this->endpoint . '/off';

        return $this;
    }
}
