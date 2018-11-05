<?php

namespace ZWay\Commands;

use function PHPSTORM_META\type;

class ToggleButtonCommand extends BaseCommand
{
    protected $endpoint = '/ZAutomation/api/v1/devices';

    public function __construct($id)
    {
        $this->endpoint = $this->endpoint . '/' . $id . '/command';

        parent::__construct();
    }

    public function on()
    {
        $this->endpoint = $this->endpoint . '/on';

        return $this;
    }

    public function off()
    {
        $this->endpoint = $this->endpoint . '/off';

        return $this;
    }
}
