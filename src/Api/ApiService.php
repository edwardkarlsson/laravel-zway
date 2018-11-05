<?php

namespace ZWay\Api;

class ApiService
{
    private $host;
    private $protocol;
    private $port;

    public function __construct()
    {
        $this->host = config('zway.host');
        $this->port = config('zway.port');
        $this->protocol = config('zway.protocol');
    }
    /**
     * @param $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @param $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
    }

    public function get(string $endpoint)
    {
        $url = $this->getUrl($endpoint);

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_USERPWD,  config('zway.user') . ':' . config('zway.password'));
        curl_setopt($c, CURLOPT_HEADER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($c);

        return json_decode($response);
    }

    /**
     * @param string $endpoint
     *
     * @return string
     */
    private function getUrl(string $endpoint): string
    {
        return $this->protocol . '://' . $this->host . ':' . $this->port . $endpoint;
    }
}
