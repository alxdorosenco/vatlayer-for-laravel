<?php

namespace AlxDorosenco\VatlayerForLaravel\Factory\Rates;

use AlxDorosenco\VatlayerForLaravel\Factory\AEndpoint;

class Rate extends AEndpoint
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var int
     */
    private $clientIp;

    /**
     * @param string $code
     * @return $this
     */
    public function setCountryCode(string $code)
    {
        $this->countryCode = $code;

        return $this;
    }

    /**
     * @param string $ipAddress
     * @return $this
     */
    public function setIpAddress(string $ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @param int $clientIp
     * @return $this
     */
    public function setClientIp(int $clientIp)
    {
        $this->clientIp = $clientIp;

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        !$this->countryCode ?: $data['country_code'] = $this->countryCode;
        !$this->ipAddress ?: $data['ip_address'] = $this->ipAddress;
        !$this->ipAddress ?: $data['client_ip'] = $this->clientIp;

        return $data;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'rate';
    }
}
