<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

class Client
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string
     */
    private $url = 'http://apilayer.net/api/';

    /**
     * @param string $type
     */
    public function __construct(string $type){
        $this->url .= $type;

        $this->data['access_key'] = config('vatlayer.access_key');
    }

    /**
     * @return Response
     */
    private function makeCurlRequest(string $fullUrl): Response
    {
        $curlHandle = curl_init($fullUrl);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

        $body = json_decode(curl_exec($curlHandle), true, 512, JSON_THROW_ON_ERROR);
        $headers = curl_getinfo($curlHandle);
        $error = curl_error($curlHandle);

        curl_close($curlHandle);

        return new Response($headers, $body, $error);
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data += $data;

        return $this;
    }

    /**
     * @throws \JsonException
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * @throws \JsonException
     */
    public function makeRequest()
    {
        return $this->makeCurlRequest($this->url.'&'.http_build_query($this->data))->getBody();
    }
}
