<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

class Client
{
    /**
     * @var array
     */
    private array $data;

    /**
     * @var string
     */
    private string $url = 'http://apilayer.net/api/';

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

    /**
     * @return mixed
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\BothCountryCodeAndIpSuppliedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\CouldNotResolveIpException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\HttpsAccessRestrictedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InactiveUserException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidAccessKeyException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidAmountException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidApiFunctionException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidCountryCodeException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidIpAddressException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidTypeException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\MissingAccessKeyException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\NoCountryCodeOrIpSuppliedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\NoVatNumberSuppliedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\NotFoundException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\UsageLimitReachedException
     * @throws \JsonException
     */
    public function get()
    {
        return $this->makeRequest();
    }

    /**
     * @return mixed
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\BothCountryCodeAndIpSuppliedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\CouldNotResolveIpException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\HttpsAccessRestrictedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InactiveUserException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidAccessKeyException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidAmountException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidApiFunctionException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidCountryCodeException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidIpAddressException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\InvalidTypeException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\MissingAccessKeyException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\NoCountryCodeOrIpSuppliedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\NoVatNumberSuppliedException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\NotFoundException
     * @throws \AlxDorosenco\VatlayerForLaravel\Exceptions\UsageLimitReachedException
     * @throws \JsonException
     */
    public function makeRequest(): mixed
    {
        $response = $this->makeCurlRequest($this->url.'&'.http_build_query($this->data));

        if(!empty($response->getError())){
            $error = new Error($response->getError()['message'], $response->getError()['code']);
            $error->throwExceptionByType($response->getError()['type']);
        }

        return $response->getBody();
    }
}
