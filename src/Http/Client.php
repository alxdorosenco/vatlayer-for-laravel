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
    public function __construct(string $type)
    {
        $this->url .= $type;
        $this->url .= '?access_key='.config('vatlayer.access_key');
    }

    /**
     * @return Response
     */
    public function makeCurlRequest(string $fullUrl): Response
    {
        $curlHandle = curl_init($fullUrl);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

        $body = curl_exec($curlHandle);
        $headers = curl_getinfo($curlHandle);
        $error = curl_error($curlHandle);

        if($error === ""){
            $bodyArray = json_decode($body, true);
            $error = $bodyArray['error'] ?? "";
        }

        curl_close($curlHandle);

        return new Response($headers, $body, $error);
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $response = $this->makeCurlRequest($this->url.'&'.http_build_query($this->data));

        if(!empty($response->getError()['code'])){
            $error = new Error($response->getError()['info'], $response->getError()['code']);
            $error->throwExceptionByType($response->getError()['type']);
        }

        return $response->getBody();
    }
}
