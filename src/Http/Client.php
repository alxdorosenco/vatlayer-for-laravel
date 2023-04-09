<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

class Client
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $url = 'http://apilayer.net/api/';

    /**
     * @param string $type
     * @param array $data
     */
    public function __construct(string $type, array $data){
        $this->url .= $type;

        $data['access_key'] = config('vatlayer.access_key');
        $this->data = $data;
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

    public function get()
    {
        return $this->makeRequest();
    }

    public function makeRequest()
    {
        $response = $this->makeCurlRequest($this->url.'&'.http_build_query($this->data));

        return $response->getBody();
    }
}
