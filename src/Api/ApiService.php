<?php

namespace ZWay\Api;

class ApiService
{
    private string $host;
    private string $protocol;
    private int $port;

    public function __construct()
    {
        $this->host = config('zway.host');
        $this->port = config('zway.port');
        $this->protocol = config('zway.protocol');
    }

    public function setHost(string $host): ApiService
    {
        $this->host = $host;

        return $this;
    }

    public function setPort(int $port): ApiService
    {
        $this->port = $port;

        return $this;
    }

    public function setProtocol(string $protocol): ApiService
    {
        $this->protocol = $protocol;

        return $this;
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

    private function getUrl(string $endpoint): string
    {
        return $this->protocol . '://' . $this->host . ':' . $this->port . $endpoint;
    }
}
