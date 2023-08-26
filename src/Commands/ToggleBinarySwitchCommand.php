<?php

namespace ZWay\Commands;

class ToggleBinarySwitchCommand extends BaseCommand
{
    protected string $endpoint = '/ZAutomation/api/v1/devices';

    public function __construct($id)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command';

        parent::__construct();
    }

    public function on(): ToggleBinarySwitchCommand
    {
        $this->endpoint = $this->endpoint . '/on';

        return $this;
    }

    public function off(): ToggleBinarySwitchCommand
    {
        $this->endpoint = $this->endpoint . '/off';

        return $this;
    }
}
